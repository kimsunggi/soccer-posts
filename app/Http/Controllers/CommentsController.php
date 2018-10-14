<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Comment;

class CommentsController extends Controller
{
    
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required|max:191',
        ]);
        
        $user_id = \Auth::id();
        
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->article_id = $id;
        $comment->user_id = $user_id;
        $comment->save();
        
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $comment = \App\Comment::find($id);

        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }

        return redirect()->back();
    }
}
