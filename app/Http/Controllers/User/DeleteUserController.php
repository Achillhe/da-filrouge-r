<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\IUserService;

class DeleteUserController extends Controller
{
    private $userInterface;

    public function __construct(IUserService $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function __invoke($id)
    {
        $this->userInterface->deleteUser($id);

        return response()->json(['message' => 'User deleted']);
    }

}

?>