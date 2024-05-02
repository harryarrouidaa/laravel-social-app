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
            Notification::create([
                'sender_id' => $event->sender_id,
                'user_id' => $event->user_id,
                'type' => 'like',
                'post_id' => $event->post_id,
                'content' => $event->content
            ]);
        // }
    }
}

