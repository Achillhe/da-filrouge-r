<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Interfaces\IEventService;

class DeleteEventController extends Controller
{
    private $eventInterface;

    public function __construct(IEventService $eventInterface)
    {
        $this->eventInterface = $eventInterface;
    }

    public function __invoke($id)
    {
        $this->eventInterface->deleteEvent($id);

        return response()->json(['message' => 'Event deleted']);
    }
}
