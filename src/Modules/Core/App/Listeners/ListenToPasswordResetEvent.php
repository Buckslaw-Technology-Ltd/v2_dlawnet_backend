<?php

namespace Modules\Core\App\Listeners;

use Illuminate\Support\Facades\Mail;
use Modules\Core\App\Events\PasswordResetEvent;

class ListenToPasswordResetEvent
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
     * @param PasswordResetEvent $event
     * @return void
     */
    public function handle(PasswordResetEvent $event)
    {
        $email = $event->email;
        $code = $event->code;
        $data = [
            'email' => $email,
            'code' => $code
        ];
        Mail::send('core::emails.password-reset', $data, function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset password code');
        });
    }
}
