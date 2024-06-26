<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', '!=', auth()->user()->id)->paginate(10);
        return view("posts.all_posts", compact('posts'));
    }

    public function newView()
    {
        return view('user.newPost');
    }
    public function newAction(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'image|max:2048',
        ]);
        $post = Post::create(['content' => $request->content, 'user_id' => auth()->user()->id]);
        if ($post && $request->hasFile('image')) {
            $request->validate(['image' => ['image']]);
            $imagePath = $request->file('image')->store('public/images');
            $result = $post->image()->create(['path' => $imagePath]);
            if ($result) {
                return redirect()->route('posts.new.view');
            }
        }
    }
    public function postDelete($id)
    {
        $post = Post::find($id);
        // things
        $likes = $post->likes;
        $comments = $post->likes;
        $notifications = Notification::where('user_id', auth()->user()->id)->where('post_id', $post->id)->get();
        // delete em
        Storage::delete($post->image->path);
        $post->image->delete();
        foreach ($likes as $like) {
            $like->delete();
        }
        foreach ($comments as $comment) {
            $comment->delete();
        }
        foreach ($notifications as $notification) {
            $notification->delete();
        }

        if ($post->delete()) {
            return redirect()->route('user.profile.view');
        }
    }
}
