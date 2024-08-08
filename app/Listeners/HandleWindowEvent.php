<?php

namespace App\Listeners;

use App\Events\OpenAboutWindowEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Window;

class HandleWindowEvent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OpenAboutWindowEvent $event): void
    {
        Window::open('about')
            ->title('About')
            ->width(400)
            ->height(300)
            ->route('about');
    }
}
