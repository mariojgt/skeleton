<?php

namespace Mariojgt\Skeleton\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mariojgt\Skeleton\Mail\UserVerifyEmail;
use Mariojgt\Skeleton\Events\UserVerifyEvent;

class SendUserVerifyListener
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
     * Send the user a link so we can verify the email
     *
     * @param  UserVerifyEvent  $event
     * @return void
     */
    public function handle(UserVerifyEvent $event)
    {
        Mail::to($event->user)->send(new UserVerifyEmail($event->user));
    }
}
