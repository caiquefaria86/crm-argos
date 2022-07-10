<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Beneficiary;
use App\Models\UploadFiles;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projectNew($client_id)
    {
        $client = Client::find($client_id);

        $uploadFiles = UploadFiles::where('client_id', $client_id)->get();
        // dd($uploadFiles);

        return view('comercial.newProject',[
            'client'        => $client,
            'uploadFiles'   => $uploadFiles
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
            $project->tamanhoInversor   = $request['tamanhoSistema'];
            $project->valor_material    = $request['valor_material'];
            $project->valor_instalacao  = $request['valor_instalacao'];
            $project->valor_total       = $request['valor_total'];
            $project->tipo_pagamento    = $request['tipo_pagamento'];
            $project->entrada           = $entrada;
            $project->qtd_parcelas      = $request['qtd_parcelas'];
            $project->descriptionFormPayments = $request['descriptionFormPayments'];
            $project->status            = "Não concluido";
            $project->client_id         = $request['client_id'];
            $project->save();

            if(isset($request['propostafinal'])){

                for($i = 0; $i < count($request->allFiles()['propostafinal']); $i++){
                    $file = $request->allFiles()['propostafinal'][$i];

                    $uploadFiles = new UploadFiles();
                    $uploadFiles->client_id = $project->client_id;
                    $uploadFiles->type = "propostafinal";
                    $uploadFiles->path = $file->store('clientsFiles/'.$project->client_id.'/project-'.$project->id.'/propostaFinal');
                    $uploadFiles->save();
                    unset($uploadFiles);
                }
            }

            if(isset($request['contaUnidGeradora'])){

                for($i = 0; $i < count($request->allFiles()['contaUnidGeradora']); $i++){
                    $file = $request->allFiles()['contaUnidGeradora'][$i];

                    $uploadFiles = new UploadFiles();
                    $uploadFiles->client_id =  $project->client_id;
                    $uploadFiles->type = "contaUnidGeradora";
                    $uploadFiles->path = $file->store('clientsFiles/'. $project->client_id.'/project-'.$project->id.'/contaUnidGeradora');
                    $uploadFiles->save();
                    unset($uploadFiles);
                }
            }
            $n_qtd_value = intval($request['n-qtd-value']);


            if($request['beneficiarias'] == "sim"){
                for($x = 1; $x <= $n_qtd_value; $x++){

                    if(isset($request['beficiaria-file-'.$x])){

                        $file = $request->file('beficiaria-file-'.$x);

                        $uploadBenef = new Beneficiary();
                        $uploadBenef->client_id =  $project->client_id;
                        $uploadBenef->project_id =  $project->id;
                        $uploadBenef->name = $request['beneficiaria-nome-'.$x];
                        $uploadBenef->path = $file->store('clientsFiles/'. $project->client_id.'/project-'.$project->id.'/beneficiaria-'.$request['beneficiaria-nome-'.$x]);
                        $uploadBenef->save();
                        unset($uploadBenef);
                    }
                }
            }


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
