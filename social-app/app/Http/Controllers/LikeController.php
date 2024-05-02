<?php

namespace App\Http\Controllers;

use App\Events\PostLiked;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

// use App\Events\PostLiked;

class LikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $like = Like::create(['post_id' => $id, 'user_id' => auth()->user()->id]);
        if ($like) {
            $post = Post::find($id);
            $sender = auth()->user();
            $user = $post->user;
            $content = "liked your post";
            event(new PostLiked($sender->id, $content, $user->id, $post->id));
            return back();
        }
    }
    public function unlike(Request $request, $id)
    {
        $unlike = Like::where('user_id', '=', auth()->user()->id)
            ->where('post_id', '=', $id)->delete();
        if ($unlike) {
            $post = Post::find($id);
            $sender = auth()->user();
            $user = $post->user;
            $content = "$sender->username liked your post, $post->id";
            event(new PostLiked($sender->id, $content, $user->id, $post->id));
            return back();
        }
    }
}
