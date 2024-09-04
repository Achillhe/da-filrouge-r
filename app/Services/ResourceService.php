<?php

namespace App\Services;

use App\Interfaces\IResourceService;
use App\Repositories\ResourceRepository;
use App\Models\Resource;

class ResourceService implements IResourceService
{
    private $resourceRepository;

    public function __construct(ResourceRepository $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }

    public function getAllResources()
    {
        return $this->resourceRepository->all();
    }

    public function getResourceById($id)
    {
        return $this->resourceRepository->find($id);
    }

    public function createResource(array $data)
    {
        return $this->resourceRepository->create($data);
    }

    public function updateResource(array $data, $id)
    {
        return $this->resourceRepository->update($data, $id);
    }

    public function deleteResource($id)
    {
        return $this->resourceRepository->delete($id);
    }

    public function getResourcesByUserId($userId)
    {
        return Resource::where('user_id', $userId)->get();
    }
}

?>