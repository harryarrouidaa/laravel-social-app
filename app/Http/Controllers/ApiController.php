<?php

namespace App\Http\Controllers;

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
            $friends = $user->friends()
                ->join('users', 'users.id', '=', 'friends.friend_id')
                ->select('users.username', 'friends.user_id', 'friends.friend_id')
                ->where('friends.user_id', $id)
                ->get();

            $profiles = [];
            foreach ($friends as $friend) {
                $profile = Profile::where('user_id', $friend->friend_id)->first();
                $profiles[] = $profile;
            }

            return response()->json(['friends' => $friends, 'profiles' => $profiles, 'user' => $user]);
        }
    }


    public function getProfilePath($id)
    {
        $user = User::find($id);
        $profilePath = $user->profile->path;
        return response()->json("http://localhost:8000/$profilePath");
    }
}
