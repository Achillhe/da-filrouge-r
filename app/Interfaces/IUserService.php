<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IUserService
{
    public function getAllUsers();
    public function getUserById($id);
    public function createUser(array $data);
    public function updateUser(array $data, $id);
    public function deleteUser($id);
    public function authUser(array $credentials);
    public function logoutUser(Request $request);

    public function getUserByConfirmationToken($token);
    public function confirmUserRegistration($user);
}
