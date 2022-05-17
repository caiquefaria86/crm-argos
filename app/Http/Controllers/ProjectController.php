<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectNew($client_id)
    {
        $client = Client::where('id', $client_id)->first();

        return view('comercial.newProject',[
            'client'        => $client
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // condição ? codigoUm : codigoDois;
         $request['entrada'] == "false" ? $entrada = false : $entrada = true;

         try {

            $project = new Project();
            $project->data_fechamento   = $request['data_fechamento'];
            $project->type              = $request['type'];
            $project->tipoInversor      = $request['tipoInversor'];
            $project->qtd_inversores    = $request['qtd_inversores'];
            $project->tamanhoInversor   = $request['tamanhoInversor'];
            $project->valor_material    = $request['valor_material'];
            $project->valor_instalacao  = $request['valor_instalacao'];
            $project->valor_total       = $request['valor_total'];
            $project->tipo_pagamento    = $request['tipo_pagamento'];
            $project->entrada           = $entrada;
            $project->qtd_parcelas      = $request['qtd_parcelas'];
            $project->status            = "Não concluido";
            $project->client_id         = $request['client_id'];
            $project->save();

            $client = Client::where('id', $request['client_id'])->first();
            $contact = Contact::where('id', $client->contact_id)->update(['list' => 'salecompleted']);


            Alert('Sucesso','Projeto concluido com sucesso!', 'success');
            return redirect()->route('comercial.painel');

        } catch (\Throwable $th) {
            // Alert('Erro','Não foi posivel concluir o cadastro do projeto!', 'error');
            // return redirect()->route('comercial.painel');
            dd($th);
        }

    }
}
