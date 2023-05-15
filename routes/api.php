<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiVeldController;
use App\Http\Controllers\Api\ApiEventController;

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


//public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //add protected routes here
    Route::post('/logout', [UserController::class, 'logout']);


    //events endpoints
    Route::get('/events', [ApiEventController::class, 'index']);
    Route::get('/events/{id}', [ApiEventController::class, 'show']);
    Route::post('/events', [ApiEventController::class, 'store']);
    Route::delete('/events/{id}', [ApiEventController::class, 'destroy']);
    //users endpoints
    Route::get('/user', [UserController::class, 'showApi']);
    Route::put('/users/edit/{id}', [ApiUserController::class, 'update']);
    //velden endpoints 
    Route::get('/velden', [ApiVeldController::class, 'index']);
    Route::get('/velden/sort/{lat}/{long}', [ApiVeldController::class, 'locationSorted']);


});