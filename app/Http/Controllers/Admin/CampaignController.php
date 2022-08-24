<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        // dd($campaigns);
        return view('admin.Allcampaign', [
            'campaigns' => $campaigns
        ]);
    }

    public function create()
    {
        return view('admin.newcampaign');
    }

    public function store(Request $request)
    {
        try {

            $camp = new Campaign();
            $camp->status = $request['status'];
            $camp->text = $request['text'];
            $camp->save();

            Alert('Sucesso','Criado com sucesso', 'success');
            return redirect()->route('admin.campaign.index');

        } catch (\Exception $e){

            Alert('Erro','erro ao tentar salvar os dados no banco.', 'error');
            return redirect()->route('admin.campaign.index');

        }

    }

    public function destroy($id)
    {
        // dd($id);

        try {
            $tag = Campaign::destroy($id);

            Alert('Sucesso','Deletado com sucesso', 'success');
            return redirect()->route('admin.campaign.index');

        } catch (\Throwable $th) {
            Alert('Erro','Erro ao deletar do banco de dados', 'error');
            return redirect()->route('admin.campaign.index');
        }
    }

    public function edit($campaign_id)
    {

        $campaign = Campaign::where('id', $campaign_id)->first();

        // dd($campaign);

        return view('admin.editCampaign',['campaign' => $campaign]);
    }
    public function update(Request $request)
    {
        try {

            $affected = Campaign::where('id', $request['id'])
                            ->update([
                                'text' => $request['text'],
                                'status' => $request['status'],
                            ]);

            Alert('Sucesso','Editado com sucesso!', 'success');
            return redirect()->route('admin.campaign.index');


        } catch (\Throwable $th) {
            //throw $th;
            Alert('Erro','Erro ao editar! - '.$th, 'error');
            return redirect()->route('admin.campaign.index');

        }
    }
}
