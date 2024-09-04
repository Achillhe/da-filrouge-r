<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;
use Illuminate\Http\Request;

class GetUserData extends Controller{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function __invoke(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = $request->user();

        return response()->json($user);
    }
}

?>