<?php

namespace Modules\Core\App\Listeners;

use Illuminate\Support\Facades\Mail;
use Modules\Core\App\Events\InitiateAccountRegisterEvent;

class ListenToAccountRegisterEvent
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
     * @param object $event
     * @return void
     */
    public function handle(InitiateAccountRegisterEvent $event)
    {
        $email = $event->email;
        $code = $event->code;
        $first_name = $event->first_name;
        $last_name = $event->last_name;
        $data = [
            'email' => $email,
            'code' => $code,
            'first_name' => $first_name,
            'last_name' => $last_name
        ];
        Mail::send('core::emails.verify', $data, function ($message) use ($email, $code, $first_name, $last_name) {
            $message->to($email);
            $message->subject('Verification code');
        });
    }
}
