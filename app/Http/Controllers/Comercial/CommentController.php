<?php

namespace App\Http\Controllers\Comercial;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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

        $userId = $request->userId;

        $user = User::find($userId)->first();
        $commentFinal = montarLink($request->comment);

        try {

            $comment = new Comment();
            $comment->message = $commentFinal;
            $comment->contactId = $request->contactId;
            $comment->userId = Auth::user()->id;
            $comment->save();

            // $comment->created_at = date_format($comment->created_at, 'd/m/Y  H:i');

            return response()->json([
                'success' => true,
                'comment' => $comment,
                'user' => $user
            ]);

        } catch (\Throwable $th) {

            return response()->json([
                'success' => false
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
        $commentId = $request->commentId;

        try {
            $comment = Comment::destroy($commentId);

            return response()->json([
                'success' => true,
                'commentId' => $commentId
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'feedback' => 'Ocorreu um erro ao deletar este comentario'
            ]);
        }



    }
}
