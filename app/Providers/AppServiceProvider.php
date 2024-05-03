<?php

namespace App\Providers;

use App\Events\PostCommented;
use App\Events\PostLiked;
use App\Listeners\SendCommentNotification;
use App\Listeners\SendLikeNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            PostLiked::class,
            SendLikeNotification::class
        );
        
        Event::listen(
            PostCommented::class,
            SendCommentNotification::class
        );        
        
    }
}
