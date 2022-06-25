<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());

        $tag = new Tag();
        $tag->category = $request->category;
        $tag->text = $request->text;
        $tag->color = $request->color;
        $tag->text_color = $request->text_color;
        $tag->save();

        Alert('Sucesso','Etiqueta Salva com Sucesso!', 'success');
        return redirect()->route('admin.tags.groups');


    }
    public function newTag()
    {
        return view("admin.newTag");
    }

    public function allTags()
    {

        $allTags = DB::table('tags')->get();

        return view('admin.TagsGroup',
            [
                'allTags' => $allTags
            ]
        );
    }
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.editTag',[
           'tag' => $tag
        ]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $tag = Tag::where('id', $request['tag_id'])
                        ->update([
                            'category' => $request['category'],
                            'text' => $request['text'],
                            'color' => $request['color'],
                            'text_color' => $request['text_color'],
                        ]);


        Alert('Sucesso','Etiqueta atualizada com Sucesso!', 'success');
        return redirect()->route('admin.tags.groups');
    }

    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->delete();


        Alert('Sucesso','Etiqueta Excluida com Sucesso!', 'success');
        return redirect()->route('admin.tags.groups');
    }
}
