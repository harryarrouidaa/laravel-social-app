<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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
}
