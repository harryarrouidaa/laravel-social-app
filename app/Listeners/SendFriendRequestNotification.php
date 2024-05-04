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
        if (
            Notification::where("sender_id", $event->sender_id)
                ->where('user_id', $event->user_id)
                ->where('type', 'request')
                ->exists()
        ) {
            return;
        } else {
            Notification::create([
                'sender_id' => $event->sender_id,
                'user_id' => $event->user_id,
                'type' => 'request',
                'content' => $event->content
            ]);
        }
    }
}
