<?php

namespace App\Http\Controllers;

use App\Events\PostLiked;
use App\Models\Notification;
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
            ->where('post_id', '=', $id)
            ->delete();

        if ($unlike) {
            $post = Post::find($id);
            $sender = auth()->user();
            $user = $post->user;

            $notification = Notification::where('post_id', $post->id)->where('sender_id', $sender->id)->where('user_id', $user->id)->first();
            if ($notification->delete()) {
                return back();
            }
        }
    }
}
