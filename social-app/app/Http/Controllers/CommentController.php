<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments($id)
    {
        $comments = Comment::where('post_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $post_id = $id;
        $post = Post::find($post_id);
        return view('posts.comments', compact('comments', 'post_id', 'post'));
    }
    public function comment(Request $request, $post_id)
    {
        $comment = Comment::create(['user_id' => auth()->user()->id, 'post_id' => $post_id, 'content' => $request->content]);
        if ($comment) {
            return back();
        }
    }
}
