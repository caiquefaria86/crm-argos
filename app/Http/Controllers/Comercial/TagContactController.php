<?php

namespace App\Http\Controllers\Comercial;

use App\Models\Tag;
use App\Models\tagContacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tag_id = $request->valor;
        $contact_id = $request->contact_id;

        // busca a etiqueta no banco de etiquetas predefinidads
        $tag = Tag::find($tag_id);

        $tagExists = tagContacts::where('text', $tag->text)
                                    ->where('contact_id', $contact_id)
                                    ->count();

        if($tagExists > 0){

            return response()->json([
                'success' => false,
                'message' => 'já existe uma etiqueta com o mesmo nome adicionada'
            ]);
        }

        try {
            $newTag = new tagContacts();
            $newTag->text = $tag->text;
            $newTag->color = $tag->color;
            $newTag->contact_id = $contact_id;
            $newTag->save();

            return response()->json([
                'success' => true,
                'tag' => $newTag
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => 'Erro ao adicionar a etiqueta'
            ]);

        }

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
    public function destroy(Request $request)
    {
        $tagId = $request->tagId;

        try {
            $tag = tagContacts::destroy($tagId);

            return response()->json([
                'success' => true,
                'tagId' => $tagId
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'feedback' => 'Ocorreu um erro ao deletar esta etiqueta'
            ]);
        }


    }
}
