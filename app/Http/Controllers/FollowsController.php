<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function follow(Request $request, $id)
    {
        // Check if the user is already following the target user
        $isFollowing = Follow::where('user_id', auth()->user()->id)
            ->where('following_id', $id)
            ->exists();

        // If the user is not already following, create a new follow record
        if (!$isFollowing) {
            $follow = Follow::create([
                'user_id' => auth()->user()->id,
                'following_id' => $id
            ]);
            return redirect()->back();
        }

    }

    public function unfollow(Request $request, $id)
    {
        // Find and delete the follow record if it exists
        $follow = Follow::where('user_id', auth()->user()->id)
            ->where('following_id', $id)
            ->delete();
        
        return redirect()->back();
    }

    public function block(Request $request, $id){
        $block = \App\Models\Block::create(['blocker_id' => auth()->user()->id, 'blocking_id' => $id]);
        return redirect()->back();
    }
}
