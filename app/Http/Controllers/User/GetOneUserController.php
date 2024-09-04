<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;

class GetOneUserController extends Controller
{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function __invoke($id)
    {
        $user = $this->userInterface->getUserById($id);
        return response()->json(['data' => $user]);
    }

}