<?php

namespace App\Http\Controllers\Comercial;

use App\Models\Budget;
use App\Models\Contact;
use App\Models\BudgetSent;
use Illuminate\Http\Request;
use App\Models\BudgetSentFiles;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BudgetController extends Controller
{
    public function store(Request $request)
    {
        try {

            $budget = New Budget();
            $budget->contact_id = $request->contact_id;
            $budget->roof_type  = $request->roof_type;
            $budget->budget_type = $request->budget_type;
            $budget->conta_energia = $request->conta_energia;
            $budget->media_kwh     = $request->media_kwh;
            $budget->media_valor   = $request->media_valor;
            $budget->save();

            $contact = Contact::find($budget->contact_id);
            $contact->list = 'requestBudget';

            $contact->save();


            return response()->json([
                'success' => true,
                'orcamento'    => $request->all()
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
            $budgetSentFiles->path = $file->store('budgetsSentFiles/'.$budgetSent->id);
            $budgetSentFiles->save();
            unset($budgetSentFiles);
        }

        $contactAffeted = DB::table('contacts')
              ->where('id', $request->contactId)
              ->update([
                  'list' => 'budgetSent'
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
