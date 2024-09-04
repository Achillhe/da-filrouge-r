<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function logout(Request $request)
    {
        $this->userInterface->logoutUser($request);

        return response()->json(['message' => 'Successfully logged out']);
    }

}