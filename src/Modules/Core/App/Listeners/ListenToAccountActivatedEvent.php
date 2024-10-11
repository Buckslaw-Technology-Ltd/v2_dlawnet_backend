<?php

namespace Modules\Core\App\Listeners;

use Illuminate\Support\Facades\Mail;
use Modules\Core\App\Events\AccountActivatedEvent;


class ListenToAccountActivatedEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param AccountActivatedEvent $event
     * @return void
     */
    public function handle(AccountActivatedEvent $event)
    {
        $email = $event->email;

        $data = [
            'email' => $email
        ];
        Mail::send('core::emails.welcome', $data, function ($message) use ($email) {
            $message->to($email);
            $message->subject('Welcome to DlawNet');
        });
    }
}
