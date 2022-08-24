<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Checklist;
use App\Models\UploadFiles;
use Illuminate\Http\Request;
use App\Models\ChecklistItems;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::with('projects')
                            ->orderBy('created_at', 'desc')
                            ->where('status', 1)
                            ->get();

        // dd($clients);

        return view("comercial.allclientes",['clients' => $clients]);
    }

    public function createClient($contact_id = null, $checkContact = null)
    {

        if($checkContact){

            $checklists = $this->checkListCheck($contact_id);
            $docsCheck = $this->checkDocs($contact_id);

            if($checklists['Error'] == true){
                Alert('Erro','Existe checkLists Obrigatório não marcado', 'error');
                return redirect()->route('comercial.painel');
            }

            if($docsCheck === false){
                Alert('Erro','Existe documentos obrigatório não feito upload, por favor corrija e clique novamente', 'error');
                return redirect()->route('comercial.painel');
            }

        }


        if(!empty($contact_id)){

            $contact = Contact::where('id', $contact_id)->first();

            // dd($contact);

            return view('comercial.newClient',[
                "contact" => $contact
            ]);

        }
        return view('comercial.newClient');
    }

    private function checkListCheck($idContact)
    {
        //no caso é 1 porque foi adicionado manualmente.
        $checklistItemsCount = ChecklistItems::where('checklistGroup_id', 1)->count();

        $checks = Checklist::where('contact_id', $idContact)->where('checklistGroup_id', 1)->get()->toArray();
        try {
            $unCheck = [];
            for($i = 0; $i < $checklistItemsCount; $i++){

                if($checks[$i]['status'] !== 1){
                    $unCheck += [ "check$i" => false];
                }
            }

            if(empty($unCheck)){
                $unCheck += [ "Error" => false];
            return $unCheck;
            }

            $unCheck += [ "Error" => true];
            return $unCheck;

        } catch (\Throwable $th) {
            $unCheck += [ "Error" => true];
            return $unCheck;
        }
    }
    private function checkDocs($idContact)
    {
        $docCnh = DB::table('upload_file_contacts')->where('contact_id', $idContact)->where('type', 'cnh')->count();
        $cnh = ($docCnh > 0) ? false : true;

        $docContaGeradora = DB::table('upload_file_contacts')->where('contact_id', $idContact)->where('type', 'contageradora')->count();
        $contaGeradora = ($docContaGeradora > 0) ? false : true;

        if(($cnh === false) && ($contaGeradora === false)){

            return true;

        }

        return false;

    }

    public function store(Request $request)
    {
        // dd($request->all());
        // type 	name 	cpf 	rg 	cep 	rua 	numero 	bairro 	cidade 	cellphone 	email 	origin 	responsibleOffice 	contact_id

        try {
            $client = new Client();
            $client->type = $request['type'];
            $client->name = $request['name'];
            $client->cpf = $request['cpf'];
            $client->rg = $request['rg'];
            $client->cellphone = $request['cellphone'];
            $client->cep = $request['cep'];
            $client->rua = $request['rua'];
            $client->numero = $request['numero'];
            $client->bairro = $request['bairro'];
            $client->cidade = $request['cidade'];
            $client->email = $request['email'];
            $client->origin = $request['estado'];
            $client->contact_id = $request['contact_id'];
            $client->save();

            if(isset($request['cnh-cliente'])){

                for($i = 0; $i < count($request->allFiles()['cnh-cliente']); $i++){
                    $file = $request->allFiles()['cnh-cliente'][$i];

                    $uploadFiles = new UploadFiles();
                    $uploadFiles->client_id = $client->id;
                    $uploadFiles->type = "cnh-cliente";
                    $uploadFiles->path = $file->store('clientsFiles/'.$client->id.'/cnh-cliente');
                    $uploadFiles->save();
                    unset($uploadFiles);
                }
            }

            if(isset($request['compResidencia'])){

                for($i = 0; $i < count($request->allFiles()['compResidencia']); $i++){
                    $file = $request->allFiles()['compResidencia'][$i];

                    $uploadFiles = new UploadFiles();
                    $uploadFiles->client_id = $client->id;
                    $uploadFiles->type = "comprovante-residencia";
                    $uploadFiles->path = $file->store('clientsFiles/'.$client->id.'/comprovante-Residencia');
                    $uploadFiles->save();
                    unset($uploadFiles);
                }
            }

            Alert('Sucesso','Cadastrado Cliente com sucesso, Agora preencha a etapa do projeto', 'success');
            return redirect()->route('comercial.project.new',['client_id'=> $client->id]);

        } catch (\Throwable $th) {
            // Alert('Erro','Erro ao cadastrar!', 'error');
            // return redirect()->route('comercial.painel');
            dd($th);
        }



    }

    public function show($id)
    {
        $client = Client::where('id', $id)->with('projects')->first();

        $uploadFiles = UploadFiles::where('client_id', $client->id)->get();

        $contact_client = Contact::where('id', $client->contact_id)->with('budgetsSents')->first();

        // dd($uploadFiles);

        return view("comercial.showClient",[
            'client'            => $client,
            'contact_client'    => $contact_client,
            'uploadFiles'       => $uploadFiles
        ]);
    }

    public function destroy($id)
    {
        try {
            // $tag = User::destroy($id);
            //atualiza o status do usuario para não perder os dados ligado ao memso.
            $user = Client::where('id', $id)->update(['status' => 0]);

            Alert('Sucesso','Cliente deletado com sucesso!', 'success');
            return redirect()->back();

        } catch (\Throwable $th) {
            Alert('Erro','Erro ao deletar o cliente! ' . $th , 'error');
            return redirect()->back();
        }

    }
}
