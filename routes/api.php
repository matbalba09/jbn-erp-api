<?php

use App\Http\Controllers\HeartbeatController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

    Route::get('Heartbeat', [HeartbeatController::class, 'Heartbeat']);

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('{id}', [UserController::class, 'getById']);
        Route::post('create', [UserController::class, 'create']);
        Route::put('update/{id}', [UserController::class, 'update']);

        Route::post('setUserRoles', [UserController::class, 'setUserRoles']);
        Route::get('getUserRoles/{id}', [UserController::class, 'getUserRoles']);
    });

    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('{id}', [RoleController::class, 'getById']);
        Route::post('create', [RoleController::class, 'create']);
        Route::put('update/{id}', [RoleController::class, 'update']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
    });
});
