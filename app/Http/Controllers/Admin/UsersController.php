<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
         $this->user = $user;
    }

    public function index()
    {
        $users = User::paginate(20);

        // dd($users);
        return view('admin.usuarios', [

            'users' => $users

        ]);
    }

    public function edit($id)
    {
        // dd($id);
        $data = User::find($id);
        // dd($dados);

        return view('admin.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $idUser = $data['id'];

        try{

            $user = User::find($idUser);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->sector = $data['sector'];
            $user->redirect_to_page = $data['redirect_to_page'];

            $user->save();

            Alert('Sucesso','Atualizado com sucesso', 'success');
            return redirect()->route('admin.usuarios');


        } catch (\Exception $e){
            Alert('Erro','erro ao tentar salvar os dados no banco.', 'error');
            return redirect()->route('admin.usuarios');
        }
    }

    public function editPermission($id)
    {
        $data = User::find($id);

        // dd($data);

        return view('admin.permissions',[
            "data" => $data
        ]);
    }

    public function updatePermission(Request $request)
    {
        //reseta as variaveis de setor pra não ficar vazias

        // dd($request->all());
        $admin = isset($request->admin) ? true : false;
        $commercial = isset($request->commercial) ? true : false;
        $suport = isset($request->suport) ? true : false;
        $engineering = isset($request->engineering) ? true : false;

        //caso seja administrador tem acesso a todas as telas
        if($admin == true):
            $commercial = true;
            $suport = true;
            $engineering = true;
        endif;

        // dd($admin,$commercial, $suport, $engineering);

        try{
            $user = User::find($request->id);
            $user->admin =      $admin;
            $user->commercial = $commercial;
            $user->suport =     $suport;
            $user->engineering= $engineering;

            $user->save();
            Alert('Sucesso','Atualizado com sucesso', 'success');
            return redirect()->route('admin.usuarios');
        } catch (\Exception $e){
            Alert('Erro','erro ao tentar salvar os dados no banco.', 'error');
            return redirect()->route('admin.usuarios');
        }
        //  redirect()->back()->alert('success', 'Atualizado com Sucesso!');
    }


}
