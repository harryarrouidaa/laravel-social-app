<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getFriends($id)
    {
        $user = User::find($id);
        if ($user) {
            $friends = $user->friends;
            return response()->json($friends);
        }
    }
    public function getProfilePath($id)
    {
        $user = User::find($id);
        $profilePath = $user->profile->path;
        return response()->json("http://localhost:8000/$profilePath");
    }

}
