<?php

namespace App\Http\Controllers;

use App\Events\FriendRequestSent;
use App\Listeners\SendFriendRequestNotification;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function add(Request $request, $id)
    {
        $friend = Friend::create(['user_id' => auth()->user()->id, 'friend_id' => $id]);
        if ($friend) {
            $content = "sent you a friend request";
            $sender = auth()->user()->id;
            $user = $id;
            event(new FriendRequestSent($sender, $content, $user));
            return back();
        }
    }

    public function delete(Request $request, $id)
    {
        $friend = Friend::where('user_id', auth()->user()->id)->where('friend_id', $id)->first();
        if ($friend) {
            $friend->delete();
        }
        return back();
    }
}
