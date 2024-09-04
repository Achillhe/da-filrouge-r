<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\IResourceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CreateResourceController extends Controller
{
    private $resourceInterface;

    public function __construct(IResourceService $resourceInterface)
    {
        $this->resourceInterface = $resourceInterface;
    }

    public function __invoke(Request $request)
    {
        try{
            $data = $request->all();

            $data['creation_date'] = now();
    
            //Get authenticated user
            // $utilisateur = Auth::user();
            // $user_id = $utilisateur['id'];
    
            $resources = $this->resourceInterface->createResource($data);
    
            return response()->json([
                'data' => $resources,
                'message' => 'RESOURCE_CREATE'
        ], 201);
        }
        catch (\Exception $ex) {

            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
       
    }
}
?>