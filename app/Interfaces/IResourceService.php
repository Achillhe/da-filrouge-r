<?php

namespace App\Interfaces;

interface IResourceService
{
    public function getAllResources();
    public function getResourceById($id);
    public function createResource(array $data);
    public function updateResource(array $data, $id);
    public function deleteResource($id);
    public function getResourcesByUserId($userId);
}

?>