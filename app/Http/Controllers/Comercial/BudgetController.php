<?php

namespace App\Http\Controllers\Comercial;

use App\Models\Budget;
use App\Models\Contact;
use App\Models\BudgetSent;
use App\Models\BudgetFiles;
use Illuminate\Http\Request;
use App\Models\BudgetSentFiles;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BudgetController extends Controller
{
    public function store(Request $request)
    {
        try {

            // $request =  $request->all();

            // contactId: "10"
            // description: "ddddddddddddd"
            // mediakwh: null
            // mediavalor: null
            // "options_outlined": "conta-energia"
            // tipoTelhado: "Colonial"
            // uploadArquivos: Array(3) [ {}, {}, {} ]

            $budget = New Budget();
            $budget->contact_id = $request['contactId'];
            $budget->roof_type  = $request['tipoTelhado'];
            $budget->budget_type = $request['options_outlined'];
            $budget->description = $request['description'];
            $budget->media_kwh     = $request['mediakwh'];
            $budget->media_valor   = $request['mediavalor'];
            $budget->save();


            if(isset($request['uploadArquivos'])){

                for($i = 0; $i < count($request->allFiles()['uploadArquivos']); $i++){
                    $file = $request->allFiles()['uploadArquivos'][$i];

                    $budgetFiles = new BudgetFiles();
                    $budgetFiles->budget_id = $budget->id;
                    $budgetFiles->path = $file->store('contactsFiles/'.$budget->contact_id.'/contaEnergia/'.$budget->id);
                    $budgetFiles->save();
                    unset($budgetFiles);

                }
            }

            // SQLSTATE[HY000]: General error: 1364 Field 'conta_energia' doesn't have a default value (SQL: insert into `budgets` (`contact_id`, `roof_type`, `budget_type`, `description`, `media_kwh`, `media_valor`, `updated_at`, `created_at`) values (2, Metalico, media-valor, adasdasd123, ?, 123, 2022-06-20 21:00:14, 2022-06-20 21:00:14))

            $contact = Contact::find($budget->contact_id);
            $contact->list = 'requestBudget';

            $contact->save();


            return response()->json([
                'success' => true,
                'request' => $request
                // 'orcamento'    => $request->all()
            ]);

        } catch (\response $r) {
            return response()->json([
                'success' => false,

                'message' => 'Erro ao solicitar o orcamento'
            ]);
        }
    }

    public function budgetSent(Request $request)
    {
        // $request->file('apresentation_file')->store('teste');
        // dd($request->allFiles());

        if(!isset($request->allFiles()['apresentation_file'])){
            Alert('Erro','Precisa enviar a proposta para a próxima etapa. Erro 102', 'error');
            return redirect()->route('comercial.painel');
        }

        $budgetSent = new BudgetSent();
        $budgetSent->date_apresentation = $request->date_budget_sent;
        $budgetSent->type_apresentation = $request->apresentation_type;
        $budgetSent->contactId = $request->contactId;
        $budgetSent->save();


        for($i = 0; $i < count($request->allFiles()['apresentation_file']); $i++){
            $file = $request->allFiles()['apresentation_file'][$i];

            $budgetSentFiles = new BudgetSentFiles();
            $budgetSentFiles->budget_sent = $budgetSent->id;
            $budgetSentFiles->path = $file->store('contactsFiles/'.$budgetSent->contactId.'/budgetsSentsFiles/'.$budgetSent->id);
            $budgetSentFiles->save();
            unset($budgetSentFiles);
        }

        $hoje = date('Y-m-d');
        $finalDate = date('Y-m-d', strtotime('+3 days', strtotime($hoje)));


        $contactAffeted = DB::table('contacts')
              ->where('id', $request->contactId)
              ->update([
                    'list' => 'budgetSent',
                    'date_recontact' => $finalDate
                ]);

        $budgetAffeted = DB::table('budgets')
              ->where('contact_id', $request->contactId)
              ->update([
                  'status' => false
              ]);

            Alert('Sucesso','Proposta enviada com sucesso!', 'success');
            return redirect()->route('comercial.painel');

    }
}
