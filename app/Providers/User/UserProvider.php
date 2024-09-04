<?php

namespace App\Providers\User;

use App\Interfaces\IUserService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IUserService::class, UserService::class);
    }
}

?>