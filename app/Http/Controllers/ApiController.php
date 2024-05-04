<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Profile;
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
            $friends = Friend::where('user_id', $id)->with('user')->get();

            return response()->json(['friends' => $friends, 'user' => $user]);
        }
    }




    public function getProfilePath($id)
    {
        $user = User::find($id);
        $profilePath = $user->profile->path;
        return response()->json("http://localhost:8000/$profilePath");
    }
}
