<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Event\GetEventController;
use App\Http\Controllers\Event\GetOneEventController;
use App\Http\Controllers\Event\CreateEventController;
use App\Http\Controllers\Event\UpdateEventController;
use App\Http\Controllers\Event\DeleteEventController;

use App\Http\Controllers\Resource\GetResourcesController;
use App\Http\Controllers\Resource\GetOneResourceController;
use App\Http\Controllers\Resource\CreateResourceController;
use App\Http\Controllers\Resource\UpdateResourceController;
use App\Http\Controllers\Resource\DeleteResourceController;
use App\Http\Controllers\Resource\GetResourcesByUserIdController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\GetUsersController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\User\GetOneUserController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\GetUserData;

use App\Http\Controllers\User\ResetPasswordController;

Route::get('events', GetEventController::class);
Route::get('events/{id}', GetOneEventController::class);
Route::post('events', CreateEventController::class);
Route::put('events/{id}', UpdateEventController::class);
Route::delete('events/{id}', DeleteEventController::class);

Route::get('resources', GetResourcesController::class);
Route::get('resources/{id}', GetOneResourceController::class);
Route::post('addResources', CreateResourceController::class);
Route::put('resources/{id}', UpdateResourceController::class);
Route::delete('resources/{id}', DeleteResourceController::class);
Route::get('resourcesByUserId/{userId}', GetResourcesByUserIdController::class);

Route::get('users', GetUsersController::class);
Route::get('users/{id}', GetOneUserController::class); 
Route::post('register', CreateUserController::class);
Route::put('users/{id}', UpdateUserController::class);
Route::delete('users/{id}', DeleteUserController::class);

Route::post('/mot-de-passe/oubli', [ResetPasswordController::class, 'mailResetPassword']);
Route::get('/mot-de-passe/reinitialiser/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/mot-de-passe/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset.post');


Route::get('confirm-registration/{token}', [CreateUserController::class, 'confirmUser'])->name('confirm-registration');

Route::post('login', [AuthController::class, 'login']);

//routes protégées 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('userData', GetUserData::class);
    Route::post('logout', [LogoutController::class, 'logout']);
});
