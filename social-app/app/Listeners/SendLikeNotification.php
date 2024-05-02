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

        Notification::create([
            "user_id" => $event->user_id,
            "sender_id" => $event->sender_id,
            "content" => $event->content,
        ]);
    }
}
