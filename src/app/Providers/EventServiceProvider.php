<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Core\App\Events\AccountActivatedEvent;
use Modules\Core\App\Events\InitiateAccountRegisterEvent;
use Modules\Core\App\Events\PasswordResetEvent;
use Modules\Core\App\Listeners\ListenToAccountActivatedEvent;
use Modules\Core\App\Listeners\ListenToAccountRegisterEvent;
use Modules\Core\App\Listeners\ListenToPasswordResetEvent;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        InitiateAccountRegisterEvent::class => [
            ListenToAccountRegisterEvent::class,
        ],
        AccountActivatedEvent::class => [
            ListenToAccountActivatedEvent::class,
        ],
        PasswordResetEvent::class => [
            ListenToPasswordResetEvent::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
