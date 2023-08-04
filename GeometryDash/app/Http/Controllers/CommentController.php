<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'comment_id' => 'required|exists:comments,id',
        ]);

        $reply = new CommentReply();
        $reply->user_id = auth()->id();
        $reply->comment_id = $request->comment_id;
        $reply->content = $request->content;
        $reply->save();

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }
}

