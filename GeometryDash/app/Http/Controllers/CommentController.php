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
            'content' => 'required|max:500',
            'post_id' => 'required|exists:posts,id',
        ], [
            'content.required' => 'Comment content is required.',
            'content.max' => 'Max characters allowed for a comment is 500.',
            'post_id.required' => 'Post ID is required.',
            'post_id.exists' => 'The selected post does not exist.',
        ]);

        try {
            $comment = new Comment();
            $comment->user_id = auth()->id();
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->save();

            return redirect()->back()->with('success', 'Comment posted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Max characters allowed for a comment is 500!');
        }
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'content' => 'required|max:500',
            'comment_id' => 'required|exists:comments,id',
        ],[
            'content.required' => 'Reply content is required.',
            'content.max' => 'Max characters allowed for a reply is 500.',
            'comment_id.required' => 'Comment ID is required.',
            'comment_id.exists' => 'The selected comment does not exist.',
        ]);

        $reply = new CommentReply();
        $reply->user_id = auth()->id();
        $reply->comment_id = $request->comment_id;
        $reply->content = $request->content;
        $reply->save();

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }
}

