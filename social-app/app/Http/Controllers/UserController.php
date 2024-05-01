<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
 public function communityView(Request $request)
{
    if ($request->has("query")) {
        $query = $request->query('query');
        $users = User::with(['posts' => function ($query) {
                $query->latest()->take(1);
            }])
            ->where('username', 'LIKE', "%$query%")
            ->where('id', '!=', auth()->user()->id)
            ->get();
        return view('user.community', compact('users'));
    } else {
        // Get all users except the authenticated user with their latest posts
        $users = User::with(['posts' => function ($query) {
                $query->latest()->take(1);
            }])
            ->where('id', '!=', auth()->user()->id)
            ->get();

        return view('user.community', compact('users'));
    }
}

    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->get();
        return view('user.show', compact('user', 'posts'));
    }
}
