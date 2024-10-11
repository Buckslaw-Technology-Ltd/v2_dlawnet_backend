<?php

namespace Modules\Core\App\Events;

use Illuminate\Queue\SerializesModels;

class InitiateAccountRegisterEvent
{
    use SerializesModels;

    public string $email;
    public string $first_name;
    public string $last_name;
    public string $code;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $code, $first_name, $last_name)
    {
        $this->email = $email;
        $this->code = $code;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
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
