<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        // $posts = Post::with('user')->orderBy("created_at", "desc")->paginate(10);
        return view("posts.all_posts");
    }
    public function newView()
    {
        return view('user.newPost');
    }
    public function newAction(Request $request)
    {
        $post = Post::create(['content' => $request->content, 'user_id' => auth()->user()->id]);
        if ($post) {
            return redirect()->route('posts.new');
        }
    }
}
