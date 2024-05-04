<?php

namespace App\Listeners;

use App\Events\FriendRequestSent;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFriendRequestNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FriendRequestSent $event): void
    {
        Notification::create([
            'sender_id' => $event->sender_id,
            'user_id' => $event->user_id,
            'type' => 'request',
            'content' => $event->content
        ]);
    }
}
