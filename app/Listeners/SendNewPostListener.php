<?php

namespace App\Listeners;

use App\Events\NewPostEvent;
use App\Mail\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNewPostListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewPostEvent  $event
     * @return void
     */
    public function handle(NewPostEvent $event)
    {
        $users =  $event->post->category->postCategorySubscribers;
        foreach ($users as $user) {
        Mail::to($user->email)->send(new NewPost($event->post, $user));
        }
        Log::alert('hi', [$event->post ]);
    }
}
