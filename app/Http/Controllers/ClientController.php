<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function createClient($contact_id = null)
    {
        if(!empty($contact_id)){

            $contact = Contact::where('id', $contact_id)->first();

            // dd($contact);

            return view('comercial.newClient',[
                "contact" => $contact
            ]);

        }
        return view('comercial.newClient');
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
            $client->responsibleOffice = $request['responsibleOffice'];
            $client->contact_id = $request['contact_id'];
            $client->save();

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
        $client = Client::where('id', $id)->first();

        $contact_client = Contact::where('id', $client->contact_id)->with('budgetsSents')->first();

        // dd($contact_client);

        return view("comercial.showClient",[
            'client'            => $client,
            'contact_client'    => $contact_client
        ]);
    }
}
