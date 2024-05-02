<?php

namespace App\Http\Controllers;

use App\Events\PostCommented;
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
            $post = Post::find($post_id);
            $sender = auth()->user();
            $user = $post->user;
            $content = "commented on your post";
            event(new PostCommented($sender->id, $content, $user->id, $post->id));
            return back();
        }
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if ($comment->delete()) {
            return back();
        }

    }
}
