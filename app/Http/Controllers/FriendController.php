<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function add(Request $request, $id)
    {
        $friend = Friend::create(['user_id' => auth()->user()->id, 'friend_id' => $id]);
        if ($friend) {
            return back();
        }
    }
}
