<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function all()
    {
        $notifications = auth()->user()->notifications;
        return view('user.notifications', compact('notifications'));
    }
    public function check($id)
    {
        $notification = Notification::find($id);
        if ($notification->type == 'request') {
            // to be fixed later
            $friendRequest = Friend::where('user_id', $notification->sender_id)->where('friend_id', auth()->user()->id)->first();
            $friendRequest->accepted = true;
            $make_version_to_other_user = Friend::create([
                'friend_id' => $notification->sender_id,
                'user_id' => auth()->user()->id,
                'accepted' => true,
            ]);
            $notification->read = true;
            $friendRequest->save();
            $notification->save();
        } else {
            if ($notification->read) {
                $notification->read = false;
            } else {
                $notification->read = true;
            }
            $notification->save();
        }
        return back();
    }

    public function delete()
    {
        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        return back();
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        // set the notification to checked
        $notification->read = true;
        $notification->save();

        $post = Post::find($notification->post_id);
        $comments = $post->comments;
        return view('user.notification_show', compact('post', 'comments'));
    }
}
