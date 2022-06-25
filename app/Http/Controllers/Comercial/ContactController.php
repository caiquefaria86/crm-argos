<?php

namespace App\Http\Controllers\Comercial;

use App\Models\Tag;
use App\Models\User;
use App\Models\Budget;
use \App\Models\Contact;
use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Models\ChecklistItems;
use App\Models\UploadFileContact;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CardTargetUser;

class ContactController extends Controller
{

    public function index()
    {
        $userId = Auth::user()->id;

        if(Auth::user()->admin){
           $contact = Contact::all();
        }else{
            $contact = Contact::where('user_id', $user_id)->get();
        }

        return view('comercial.dados',[
            'contacts' => $contact
        ]);
    }

    public function store(Request $request)
    {
        // $cadastro['success'] = true;
        // $cadastro['redirect'] = true;
        // echo json_encode($request);
        // return;
        $data = $request->all();

        $user_id = Auth::user()->id;

        try {

            $contact = new Contact();
            $contact->name = $data['name'];
            $contact->user_id = $user_id;
            $contact->responsibleOffice = "Rio Preto";
            $contact->city = $data['city'];
            $contact->cellphone = $data['cellphone'];
            $contact->email = $data['email'];
            $contact->origin = $data['origin'];
            $contact->responsible_id = $data['responsible_id'];

            $contact->save();

            $contact = DB::table('contacts')->latest()->first();

            //caso o responsável não seja o proprio usuario, marcar o usuario responsável.
            if($request->responsible_id != $user_id){
                $contactTarget = Contact::findOrFail($contact->id);
                $contactTarget->users()->attach($request->responsible_id);
            }

            return response()->json([
                'success' => true,
                'contact'    => $contact
            ]);

        } catch (\response $r) {

            return response()->json([
                'success' => false,
                'message' => 'Erro ao salvar este contato'
            ]);
        }

        return;
    }

    public function dataModal(Request $request)
    {

        $contactId = $request->items;

        $data = Contact::find($contactId);


        $tags = Tag::all();

        $budgetsContact = Budget::where('contact_id', $contactId);

        $allUsers = User::all();

        // é o 1 pois é o do comercial
        $checklistItems = ChecklistItems::where('checklistGroup_id', 1)
                                                ->with('checklist')
                                                ->get();

        $checklistContacts = Checklist::where('contact_id', $contactId)
                                        ->where('checklistGroup_id', 1)
                                        ->get();

        $uploadFiles = UploadFileContact::where('contact_id', $contactId)->get();

        // return response()->json([
        //     'success'   =>  true,
        //     'data'      =>  $data
        // ]);

        $authUser = Auth::user();

        $viewRender = view('comercial.contacts', [

            'data'           => $data,
            'budgetsContact' => $budgetsContact,
            'tags'           => $tags,
            'checklistItems' => $checklistItems,
            'allUsers'       => $allUsers,
            'authUser'       => $authUser,
            'checklistContacts'  => $checklistContacts,
            'uploadFiles'    => $uploadFiles

            ])->render();

        return response()->json(array(
            'success'           => true,
            'html'              => $viewRender,
            'budgetsContact'    => $budgetsContact,
            'checklistItems'    =>$checklistItems,
            'checklistContacts'  => $checklistContacts,
            'uploadFiles'       =>$uploadFiles
        ));
    }

    public function updateDateRecontact(Request $request)
    {
        $dateRecontact = $request->date_recontact;
        $contactId = $request->id_contact;
        $hoje = date('Y-m-d');

        if(strtotime($dateRecontact) < strtotime($hoje)){
            return response()->json([
                'success' => false,
                'message'=>'A data de recontactar, não pode ser um dia que já passou!'
            ]);
        }

        $contactAffeted = DB::table('contacts')
            ->where('id', $contactId)
            ->update([
                'date_recontact' => $dateRecontact
              ]);

            return response()->json([
                'success' => true,
                'message'=>'Data Alterada com Sucesso!'
            ]);

    }

    public function moveCard(Request $request)
    {
        $destination = $request->destination;

        if($destination == "budgetSent"){
            // atualiza a data de passar pro recontactar
            $hoje = date('Y-m-d');
            $finalDate = date('Y-m-d', strtotime('+3 days', strtotime($hoje)));

            $contactAffeted = DB::table('contacts')
            ->where('id', $request->contact_id)
            ->update([
                'list' => $destination,
                'date_recontact' => $finalDate
              ]);

            return response()->json([
                'success' => 'Movido com success'
            ]);

        }

        $contactAffeted = DB::table('contacts')
              ->where('id', $request->contact_id)
              ->update([
                  'list' => $destination
                ]);

        return response()->json([
            'success' => 'Movido com success'
        ]);
    }

    public function targetPeople(Request $request)
    {

        try{
            $request->userId;

            $contact = Contact::findOrFail($request->dataId);

            $contact->users()->attach($request->userId);

            $user = User::find($request->userId);

            $letters = getFirtWordName($user->name);

            //notificar usuario que foi marcado ATIVAR QUANDO TERMINADO
            $user->notify(new CardTargetUser($contact));

            return response()->json([
                'success' => true,
                'message' => 'Adicionado com sucesso',
                'userAdd' => $user,
                'letters' => $letters
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Erro ao incluir esta pessoa',
                'error'   => $th
            ]);

        }

    }

    public function updateName(Request $request)
    {

        try {

            $contact = Contact::where('id', $request->idContact)->update(['name' => $request->valordigitado]);

            return response()->json([
                'success' => true,
                'message' => 'Contato atualizado com sucesso! '
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar nome.',
                'error'   => $th
            ]);

        }
    }

    public function checklistStore(Request $request)
    {
        try {
            // id 	checklistItem_id 	checklistGroup_id 	contact_id 	status 	user_id

            $checklist = new Checklist();
            $checklist->checklistItem_id = $request->checklist_id_event;
            $checklist->checklistGroup_id = 1;
            $checklist->contact_id = $request->contact_id_event;
            $checklist->status = true;
            $checklist->user_id = $request->user_event;
            $checklist->date = $request->date_event;
            $checklist->save();

            return response()->json([
                'success' => true,
                'message' => 'CheckList Marcado com sucesso! ',
                'checklist'=> $checklist
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Erro ao marcar checkList ',
                'error'   => $th
            ]);

        }
    }

    public function uploadFilesContact(Request $request)
    {
        try {

            $tipo = $request['type'];

            for($i = 0; $i < count($request->allFiles()[$tipo]); $i++){
                $file = $request->allFiles()[$tipo][$i];

                $uploadFile = new UploadFileContact();
                $uploadFile->type = $request['type'];
                $uploadFile->contact_id = $request['contact_id'];
                $uploadFile->path = $file->store('contactsFiles/'.$uploadFile->contact_id.'/docs/');
                $uploadFile->save();
                // unset($uploadFile);

            }

            return response()->json([
                'success' => true,
                'request' => $request->all(),
                'uploadFiles' => $uploadFile,
                'message' => 'Salvo com sucesso!'
            ]);

        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'success' => false,
                'message' => $th
            ]);
        }
    }

}
