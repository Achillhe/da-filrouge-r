<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\IResourceService;

class GetOneResourceController extends Controller
{
    private $resourceInterface;

    public function __construct(IResourceService $resourceInterface)
    {
        $this->resourceInterface = $resourceInterface;
    }

    public function __invoke($id)
    {
        $resource = $this->resourceInterface->getResourceById($id);
        return response()->json(['data' => $resource]);
    }

}

?>