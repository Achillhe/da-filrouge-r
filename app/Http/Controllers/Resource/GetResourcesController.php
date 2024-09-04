<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\IResourceService;

class GetResourcesController extends Controller
{
    private $resourceInterface;

    public function __construct(IResourceService $resourceInterface)
    {
        $this->resourceInterface = $resourceInterface;
    }

    public function __invoke()
    {
        $resources = $this->resourceInterface->getAllResources();
        return response()->json(['data' => $resources]);
    }

}

?>