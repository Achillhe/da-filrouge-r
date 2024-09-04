<?php

namespace App\Services;

use App\Interfaces\IEventService;
use App\Models\Event;
use App\Repositories\EventRepository;

class EventService implements IEventService
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents()
    {
        return $this->eventRepository->all();
    }

    public function getEventById($id)
    {
        return $this->eventRepository->find($id);
    }

    public function createEvent(array $data)
    {
        return $this->eventRepository->create($data);
    }

    public function updateEvent(array $data, $id)
    {
        return $this->eventRepository->update($data, $id);
    }

    public function deleteEvent($id)
    {
        return $this->eventRepository->delete($id);
    }
}

?>