<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function communityView()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $post = Post::orderBy('created_at','desc')->take(1)->get();
        $latestPost = $post[0];
        return view('user.community', compact('users', 'latestPost'));
    }
}
