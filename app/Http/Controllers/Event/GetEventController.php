<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Interfaces\IEventService;

class GetEventController extends Controller
{
    private $eventInterface;

    public function __construct(IEventService $eventInterface)
    {
        $this->eventInterface = $eventInterface;
    }

    public function __invoke()
    {
        $events = $this->eventInterface->getAllEvents();
        return response()->json(['data' => $events]);
    }
}
