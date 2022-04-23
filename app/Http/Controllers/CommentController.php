<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'body' => $request->body,
            'commentable_id' => $id,
            'commentable_type' => $request->type,
        ]);

        return back();
    }
    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        return back();
    }
    
}
