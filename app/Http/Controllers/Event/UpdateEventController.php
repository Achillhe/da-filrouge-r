<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Interfaces\IEventService;
use Illuminate\Http\Request;

class UpdateEventController extends Controller
{

    private $eventInterface;

    public function __construct(IEventService $eventInterface)
    {
        $this->eventInterface = $eventInterface;
    }
    public function __invoke(Request $request, $id)
    {
        $data = $request->all();
        $event = $this->eventInterface->updateEvent($data, $id);

        return response()->json(['data' => $event]);
    }
}

?>