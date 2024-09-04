<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IUserService;
use App\Interfaces\IMailService;
use App\Interfaces\IResetPassword;
use App\Services\UserService;
use App\Services\MailService;
use App\Services\ResetPasswordService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IMailService::class, MailService::class);
        $this->app->bind(IResetPassword::class, ResetPasswordService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
