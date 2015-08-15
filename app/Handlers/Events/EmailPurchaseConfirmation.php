<?php

namespace App\Handlers\Events;

use App\Events\UserWasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailPurchaseConfirmation
{
    /**
     * Create the event handler.
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
     * @param  UserWasRegistered  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {
        //
    }
}
