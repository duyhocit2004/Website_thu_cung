<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Reddit\RedditExtendSocialite;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
          
        ],

        
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //  \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        //     'SocialiteProviders\\Reddit\\RedditExtendSocialite@handle',
        // ],
    
    
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
