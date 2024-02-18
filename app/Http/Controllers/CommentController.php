<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Trayendo todo los comentarios
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Creando un nuevo comentario
        $request->validate([
            'msj' => ['required', 'max:255'],
            'user_id' => 'required',
            'chirp_id' => 'required'
        ]);
        Comment::create($request->all());
        return to_route('chirps.index')->with('status', __('Comment created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        // Obtengo el usuario que creo el comentario y el chirp al que pertenece
        $users = User::all();
        $chirps = Chirp::all();

        return view('comments.edit', compact('comment', 'users', 'chirps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Actualizando comentarios
        $comment = Comment::findOrFail($comment);
        $comment->update([
            $request->msj,
            $request->user_id,
            $request->chirp_id
        ]);

        return redirect('comments.index')->with('status', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // Elimando comentarios
        Comment::destroy($comment);

        return redirect('comments.index')->with('status', 'Comment deleted successfully!');
    }
}
