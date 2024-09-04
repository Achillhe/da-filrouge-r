<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\IResourceService;
use Illuminate\Http\Request;

class UpdateResourceController extends Controller
{
    private $resourceInterface;

    public function __construct(IResourceService $resourceInterface)
    {
        $this->resourceInterface = $resourceInterface;
    }

    public function __invoke(Request $request, $id)
    {
        $data = $request->all();
        $resource = $this->resourceInterface->updateResource($data, $id);

        return response()->json(['data' => $resource]);
    }

}

?>