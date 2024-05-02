<?php

namespace App\Listeners;

use App\Events\PostCommented;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommentNotification
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
    public function handle(PostCommented $event): void
    {
        if (
            Notification::where("sender_id", $event->sender_id)
                ->where('user_id', $event->user_id)
                ->where('type', 'like')
                ->where('post_id', $event->post_id)
                ->exists()
        ) {
            $notification = Notification::where("sender_id", $event->sender_id)
                ->where('user_id', $event->user_id)
                ->where('type', 'comment')
                ->where('post_id', $event->post_id)
                ->first();
            $notification->delete();
        } else {
            Notification::create([
                'sender_id' => $event->sender_id,
                'user_id' => $event->user_id,
                'type' => 'comment',
                'post_id' => $event->post_id,
                'content' => $event->content
            ]);
        }
    }
}
