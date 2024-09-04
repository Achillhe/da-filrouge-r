<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Interfaces\IEventService;

class GetOneEventController extends Controller
{
    private $eventInterface;

    public function __construct(IEventService $eventInterface)
    {
        $this->eventInterface = $eventInterface;
    }

    public function __invoke($id)
    {
        $event = $this->eventInterface->getEventById($id);
        return response()->json(['data' => $event]);
    }
}