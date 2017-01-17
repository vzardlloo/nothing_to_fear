<?php

namespace App\Listeners;

use App\Events\=userActionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class userActionListener
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
     * @param  =userActionEvent  $event
     * @return void
     */
    public function handle(=userActionEvent $event)
    {
        //
    }
}
