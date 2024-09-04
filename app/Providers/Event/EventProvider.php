<?php

namespace App\Providers\Event;

use App\Interfaces\IEventService;
use App\Services\EventService;
use Illuminate\Support\ServiceProvider;

class EventProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IEventService::class, EventService::class);
    }
}

?>