<?php

namespace App\Http\Controllers;

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
        if ($notification->read) {
            $notification->read = false;
            $notification->save();
        } else {
            $notification->read = true;
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
