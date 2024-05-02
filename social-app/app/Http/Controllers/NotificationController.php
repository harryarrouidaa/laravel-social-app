<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function all()
    {
        $notifications = auth()->user()->notifications;
        return view('user.notifications', compact('notifications'));
    }
}
