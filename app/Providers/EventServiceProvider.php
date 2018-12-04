<?php

namespace App\Providers;

use App\Events\BookCreatedEvent;
use App\Listeners\BookCreatedListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     * https://docs.google.com/document/d/1baRVZU_9FHia5jImMAjkDyKP-B4ZBh99vGDv7R9SCCU/edit
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BookCreatedEvent::class => [
            BookCreatedListener::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
