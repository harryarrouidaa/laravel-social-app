<?php

namespace App\Listeners;

use App\Events\postLiked;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLikeNotification
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
    public function handle(PostLiked $event): void
    {
        // \Log::info("PostLiked event triggered!");
        // \Log::info("Sender ID: " . $event->sender_id);
        // \Log::info("Content: " . $event->content);
        // \Log::info("User ID: " . $event->user_id);

        if (
            Notification::where("sender_id", $event->sender_id)
                ->where('user_id', $event->user_id)
                ->where('type', 'like')
                ->where('post_id', $event->post_id)
                ->exists()
        ) {
            $notification = Notification::where("sender_id", $event->sender_id)
                ->where('user_id', $event->user_id)
                ->where('type', 'like')
                ->where('post_id', $event->post_id)
                ->first(); // Use first() instead of get()

            $notification->delete();
        } else {
            Notification::create([
                'sender_id' => $event->sender_id,
                'user_id' => $event->user_id,
                'type' => 'like',
                'post_id' => $event->post_id,
                'content' => $event->content
            ]);
        }
    }
}

