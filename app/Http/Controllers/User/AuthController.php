<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            $credentials = $validatedData;

            $auth = $this->userInterface->authUser($credentials);

            if ($auth) {
                $tokenResult = $auth;
                $cookie = cookie('jwt', $tokenResult, 60 * 24);

                return response()->json([
                    'user' => $credentials,
                    'status' => true,
                    'message' => 'Success',
                    'token' => $tokenResult
                ], 200)->withCookie($cookie);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized'
                ], 401);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}
