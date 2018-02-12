<?php

namespace App\Listeners\User;

use Log;
use App\Events\UserAddEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddListener
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
     * @param  UserAddEvent  $event
     * @return void
     */
    public function handle(UserAddEvent $event)
    {
        Log::info('New User registred', $event->user->name);
    }
}
