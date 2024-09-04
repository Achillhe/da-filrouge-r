<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Interfaces\IEventService;
use Illuminate\Http\Request;

class CreateEventController extends Controller
{
    private $eventInterface;

    public function __construct(IEventService $eventInterface)
    {
        $this->eventInterface = $eventInterface;
    }

    public function __invoke(Request $request)
    {
        $data = $request->all();
        $events = $this->eventInterface->createEvent($data);

        return response()->json(['data' => $events], 201);
    }

}

?>