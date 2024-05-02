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
        $post = Post::find($id);
        if ($like) {
            $sender = auth()->user();
            $user = $post->user;
            $content = "$sender->username liked your post";
            event(new PostLiked($sender->id, $content, $user->id));
            return back();
        }
    }
    public function unlike(Request $request, $id)
    {
        $unlike = Like::where('user_id', '=', auth()->user()->id)
            ->where('post_id', '=', $id)->delete();
        if ($unlike) {
            return back();
        }
    }
}
