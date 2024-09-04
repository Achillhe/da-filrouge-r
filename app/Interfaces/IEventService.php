<?php

namespace App\Interfaces;

interface IEventService
{
    public function getAllEvents();
    public function getEventById($id);
    public function createEvent(array $data);
    public function updateEvent(array $data, $id);
    public function deleteEvent($id);
}

?>
