<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', LoginController::class);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('user', UserController::class)->except(['show', 'edit']);
    Route::apiResource('post', PostController::class)->except(['show', 'edit']);

    Route::post('logout', LogoutController::class);
});
