<?php

namespace App\Listeners;

use App\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCreatedListener implements ShouldQueue
{

    public $post;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email = $event->post->user->email;
        Mail::to($email)->send(new PostCreatedNotification($event->post));
    }
}
