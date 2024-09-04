<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;

class GetUsersController extends Controller
{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function __invoke()
    {
        $users = $this->userInterface->getAllUsers();
        return response()->json(['data' => $users]);
    }

}

?>