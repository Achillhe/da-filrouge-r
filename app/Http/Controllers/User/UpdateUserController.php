<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function __invoke(Request $request, $id)
    {
        $data = $request->all();
        $user = $this->userInterface->updateUser($data, $id);

        return response()->json(['data' => $user]);
    }

}

?>