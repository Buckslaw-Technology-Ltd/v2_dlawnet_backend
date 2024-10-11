<?php

namespace Modules\Core\App\Events;

use Illuminate\Queue\SerializesModels;

class AccountActivatedEvent
{
    use SerializesModels;

    public string $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
