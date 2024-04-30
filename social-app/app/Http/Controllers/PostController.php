<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Image;

class PostController extends Controller
{
    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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
            // $result = Image::create(['path' => $imagePath, 'post_id' => $post->id]);
            if ($result) {
                return redirect()->route('posts.new.view');
            }
        }
    }
    public function postDelete($id)
    {
        $post = Post::find($id);
        $post->image->delete();
        if ($post->delete()) {
            return redirect()->route('user.profile.view');
        }

    }
}
