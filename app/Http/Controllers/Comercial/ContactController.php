<?php

namespace App\Http\Controllers\Comercial;

use App\Models\Budget;
use \App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
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

        $budgetsContact = Budget::where('contact_id', $contactId);

        // return response()->json([
        //     'success'   =>  true,
        //     'data'      =>  $data
        // ]);

        $viewRender = view('comercial.contacts', [
            'data'=> $data,
            'budgetsContact' => $budgetsContact
            ])->render();

        return response()->json(array('success' => true, 'html'=> $viewRender, 'budgetsContact' => $budgetsContact));
    }

    public function moveCard(Request $request)
    {
        $destination = $request->destination;

        $contactAffeted = DB::table('contacts')
              ->where('id', $request->contact_id)
              ->update([
                  'list' => $destination
                ]);


        return response()->json([
            'success' => 'Movido com success'
        ]);
    }

}
