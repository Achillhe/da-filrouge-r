<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\IResourceService;

class GetResourcesByUserIdController extends Controller
{
    private $resourceInterface;

    public function __construct(IResourceService $resourceInterface)
    {
        $this->resourceInterface = $resourceInterface;
    }

    public function __invoke($userId)
    {
        $resources = $this->resourceInterface->getResourcesByUserId($userId);

        return response()->json($resources);
    }

}

?>