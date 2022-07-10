<?php

namespace App\Http\Controllers\Comercial;

use App\Models\User;
use App\Models\Budget;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Campaign;
use App\Models\BudgetSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::where('status', true)->get();
        $allUsers = User::all();
        $userId = Auth::user()->id;
        $authUser = Auth::user();
        $campanhas = Campaign::all();

        return view('comercial.painel',[
            'contacts' => $contacts,
            'allUsers' => $allUsers,
            'userId'   => $userId,
            'authUser' => $authUser,
            'campanhas'=> $campanhas
        ]);
    }

    public function addFilterSession(Request $request)
    {
        if(!empty($request->all())){

            $time = $request->selectTime;
            session()->put('selectTime', $time);
            // return redirect()->back();
        }
            return view('comercial.painel',[
                'minhaSessao' => 'sessão criada com sucesso'
            ]);

    }

    public function reloadContacts()
    {
        $contacts = $this->queryContactLists('contacts');

        $budgets = $this->queryContactLists('requestBudget');

        $budgetsSents = $this->queryContactLists('budgetSent');

        $recontact = $this->queryContactLists('recontact');

        $negotiations = $this->queryContactLists('negotiation');

        $closedwork = $this->queryContactLists('closedwork');

        $salecompleted = $this->queryContactLists('salecompleted');

        return response()->json([
            'success'       => true,
            'contacts'      => $contacts,
            'budgets'       => $budgets,
            'budgetSent'    => $budgetsSents,
            'recontact'     => $recontact,
            'negotiations'  => $negotiations,
            'closedwork'    => $closedwork,
            'salecompleted' => $salecompleted
        ]);
    }


    static function queryContactLists($list)
    {

        $contacts = Contact::Join('contact_user', function ($join) {

            $join->on('contact_user.contact_id', '=', 'contacts.id')
            ->where('contact_user.user_id', '=', Auth::user()->id)
            ->orwhere('contacts.user_id', '=', Auth::user()->id);
       })
       ->distinct()
       ->where('list', $list)
       ->where('status', true)
       ->select('contacts.id','contacts.name')
       ->with('tags','comments')
       ->get();

       return $contacts;
    }

    static function queryContactListsFilter($list)
    {
        $contacts = Contact::distinct()
       ->where('list', $list)
       ->where('status', true)
       ->select('contacts.id','contacts.name')
       ->with('tags','comments');

       return $contacts;
    }



    public function searchContacts(Request $request)
    {

        $contacts = Contact::Join('contact_user', function ($join) {

            $join->on('contact_user.contact_id', '=', 'contacts.id')
            ->where('contact_user.user_id', '=', Auth::user()->id)
            ->orwhere('contacts.user_id', '=', Auth::user()->id);
       })
       ->distinct()
       ->where('status', true)
       ->where('name', 'LIKE', "%{$request->contactSearch}%")
       ->select('contacts.id','contacts.name')
       ->with('tags','comments')
       ->get();

       return response()->json([
        'success'       => true,
        'contacts'      => $contacts
    ]);

    }

    public function reportIndex($mes = null, $ano = null)
    {
        if (!empty($mes)){

            $nameMonth = $this->returnMonth($mes);
        } else{
            $mes = date('m');
            $nameMonth = $this->returnMonth($mes);
        }
        if (empty($ano)) {
            $ano = date('Y');
        }

        $totalContacts = Contact::whereMonth('created_at', $mes)->whereYear('created_at', $ano)->count();

        $totalOrcSents = BudgetSent::whereMonth('date_apresentation', $mes)
                                    ->whereYear('date_apresentation', $ano)
                                    ->count();

        $totalNegociation = Contact::where('status', true)
                                    ->where('list', 'negotiation')
                                    ->count();

        $totalSaleCompleted = Contact::where('status', true)
                                    ->where('list', 'salecompleted')
                                    ->whereMonth('created_at', $mes)
                                    ->whereYear('created_at', $ano)
                                    ->count();

        $chartContactDiaries = $this->returnDataChartDiaries($mes, $ano);

        $totalSalesMouth = Project::whereMonth('data_fechamento', $mes)
                                        ->whereYear('data_fechamento', $ano)
                                        ->get();


        // totais de R$
        $totalValorSalesMouth = 0;
        $totalValorInstMouth = 0;
        $totalValorMaterMouth = 0;
        foreach ($totalSalesMouth as $key => $sale) {
            $totalValorSalesMouth = $totalValorSalesMouth + $sale->valor_total;
            $totalValorInstMouth = $totalValorInstMouth + $sale->valor_instalacao;
            $totalValorMaterMouth = $totalValorMaterMouth + $sale->valor_material;
        }

        // % de fechaento
        // var_dump($totalContacts);
        if($totalContacts !== 0){
            $porcSales = ((count($totalSalesMouth))*100)/$totalContacts;
        }else{
            $porcSales = 0;
        }

        $qtdProjectSales =count($totalSalesMouth);

        if($qtdProjectSales != 0){
            $ticketMedio = $totalValorSalesMouth / $qtdProjectSales ;
        }else{
            $ticketMedio = 0;
        }

        $lastClients = Client::orderBy('created_at', 'desc')->limit(5)->get();


        // dd($porcSales);

        return view('comercial.report',[
            'mes'                   => $nameMonth,
            'ano'                   => $ano,
            'totalContacts'         => $totalContacts,
            'totalOrcSents'         => $totalOrcSents,
            'totalNegociation'      => $totalNegociation,
            'totalSaleCompleted'    => $totalSaleCompleted,
            'chartContactDiaries'   => $chartContactDiaries,
            'totalSalesMouth'       => $totalValorSalesMouth,
            'totalValorInstMouth'   => $totalValorInstMouth,
            'totalValorMaterMouth'  => $totalValorMaterMouth,
            'porcSales'             => $porcSales,
            'qtdProjectSales'      => $qtdProjectSales,
            'ticketMedio'          => $ticketMedio,
            'lastClients'          => $lastClients
        ]);
    }

    private function returnDataChartDiaries($mes, $ano)
    {
        $dataChartContactsDiaries = [];

        for($i = 1; $i < 32; $i++){

            $dateSearch = $ano."/".$mes."/".$i;
            $totalDia = Contact::whereDate('created_at', $dateSearch)->count();

            $dataChartContactsDiaries[$i] = $totalDia;

        }
        return $dataChartContactsDiaries;
    }

    private function returnMonth($mesNumber)
    {
        switch ($mesNumber) {
            case '01':
                $name = "Janeiro";
                break;
            case '02':
                $name = "Fevereiro";
                break;
            case '03':
                $name = "Março";
                break;
            case '04':
                $name = "Abril";
                break;
            case '05':
                $name = "Maio";
                break;
            case '06':
                $name = "Junho";
                break;
            case '07':
                $name = "Julho";
                break;
            case '08':
                $name = "Agosto";
                break;
            case '09':
                $name = "Setembro";
                break;
            case '10':
                $name = "Outubro";
                break;
            case '11':
                $name = "Novembro";
                break;
            case '12':
                $name = "Dezembro";
                break;

            default:
                $name = "Mes invalido";
                break;
        }

        return $name;
    }

}
