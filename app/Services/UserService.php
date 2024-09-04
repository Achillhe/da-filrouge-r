<?php

namespace App\Services;

use App\Interfaces\IUserService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserService implements IUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(array $data, $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }

    public function authUser(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $tokenResult = $user->createToken('API Token of ' . $user->firstName." ".$user->lastName);

            return $tokenResult->plainTextToken;
        } else {
            return null;
        }
    }

    public function getUserByConfirmationToken($token)
    {
        return $this->userRepository->findBy('confirmation_token', $token);
    }

    public function confirmUserRegistration($users)
    {
        $users->update(['confirmation_token' => null, 'confirmed_at' => now()]);
    
        return $users;    }

    public function logoutUser(Request $request)
    {
        $request->user()->tokens()->delete();
    }
}
