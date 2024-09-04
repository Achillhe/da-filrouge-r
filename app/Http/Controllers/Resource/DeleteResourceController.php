<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\IResourceService;

class DeleteResourceController extends Controller
{
    private $resourceInterface;

    public function __construct(IResourceService $resourceInterface)
    {
        $this->resourceInterface = $resourceInterface;
    }

    public function __invoke($id)
    {
        $this->resourceInterface->deleteResource($id);

        return response()->json(['message' => 'Resource deleted']);
    }

}

?>