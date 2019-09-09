<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modeles\Comment;
use App\Http\Requests\CommentRequest;

/**
 * Class CommentController
 */
class CommentController extends Controller
{
    /**
     * List all comments
     *
     * @return void
     */
    public function index()
    {
        $actives = Comment::where('active', 1)->orderBy('created_at', 'DESC')->get();

        return view('livredor.index',[
            'actives' => $actives,
        ]);
    }

    /**
     * Approved or disapproved a comment
     *
     * @param [type] $id
     * @return void
     */
    public function showComment($id)
    {
        $comment = Comment::find($id);
        $comment->active = !$comment->active;
        $comment->save();

        return back()->with('valide', 'Le statut du commentaire a été modifié');
    }

    /**
     * Form to create a new comment
     *
     * @return void
     */
    public function create()
    {

        $comments = Comment::orderBy('created_at', 'DESC')->paginate(10);

        return view('livredor.create', [
            'comments' => $comments,
        ]);
    }

    /**
     * Undocumented function
     *
     * @param CommentRequest $request
     * @return void
     */
    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $comment = new Comment;
        $comment->pseudo = $data['pseudo'];
        $comment->content = $data['content'];
        $comment->created_at=now();
        $comment->updated_at=now();
        $comment->save();

        return back()->with('message', 'Votre message a bien été enregistrer, il est en attente de validation :)');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $data = $request->validated();
        $comment = Comment::find($id);
        $comment->pseudo = $data['pseudo'];
        $comment->content = $data['content'];
        $comment->active = $data['active'];
        $comment->created_at=now();
        $comment->updated_at=now();
        $comment->save();

        return back();
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $service = Comment::find($id);
        $service->delete();
        return back()->with('supp', 'Le message a bien été supprimer');
    }
}


