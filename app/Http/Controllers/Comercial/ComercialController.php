<?php

namespace App\Http\Controllers\Comercial;

use App\Models\User;
use App\Models\Budget;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('status', true)->get();
        $allUsers = User::all();
        $userId = Auth::user()->id;

        return view('comercial.painel',[
            'contacts' => $contacts,
            'allUsers' => $allUsers,
            'userId'   => $userId,
        ]);
    }

    public function reloadContacts()
    {
        $idUser = Auth::user()->id;

        $contacts = Contact::where('user_id', $idUser)
                                ->where('status', true)
                                ->where('list', 'contacts')->get();


        $budgets = Contact::where('user_id', $idUser)
                                ->where('list', 'requestBudget')
                                ->where('status', true)
                                ->get();

        $budgetsSents = Contact::where('user_id', $idUser)
                                ->where('list', 'budgetSent')
                                ->where('status', true)
                                ->get();

        $recontact = Contact::where('user_id', $idUser)
                                ->where('list', 'recontact')
                                ->where('status', true)
                                ->get();




        return response()->json([
            'success'       => true,
            'contacts'      => $contacts,
            'budgets'       => $budgets,
            'budgetSent'    => $budgetsSents,
            'recontact'     => $recontact,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
