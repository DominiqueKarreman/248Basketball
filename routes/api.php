<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiVeldController;
use App\Http\Controllers\Api\ApiEventController;
use App\Http\Controllers\Api\ApiUserFriendController;
use App\Http\Controllers\Api\ApiChatMessageController;
use App\Http\Controllers\Api\ApiPickupController;
use App\Http\Controllers\Api\ApiUserNotificationTokenController;

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
Route::post('/register', [UserController::class, 'register'])->name('api.register');
Route::post('/login', [UserController::class, 'login'])->name('api.login');

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //add protected routes here
    Route::post('/logout', [UserController::class, 'logout'])->name('api.logout');


    //events endpoints
    Route::get('/events', [ApiEventController::class, 'index'])->name('api.events.index');
    Route::get('/events/{id}', [ApiEventController::class, 'show'])->name('api.events.show');
    Route::post('/events', [ApiEventController::class, 'store'])->name('api.events.store');
    Route::delete('/events/{id}', [ApiEventController::class, 'destroy'])->name('api.events.destroy');
    //users endpoints
    Route::get('/user', [UserController::class, 'showApi'])->name('api.user.showApi');
    Route::put('/users/edit/{id}', [ApiUserController::class, 'update'])->name('api.users.update');
    //velden endpoints
    Route::get('/gebruikers', [ApiUserController::class, 'gebruikers'])->name('api.gebruikers');
    Route::get('/factory/{amount}', [ApiUserController::class, 'factory'])->name('api.factory');
    //velden endpoints
    Route::get('/velden', [ApiVeldController::class, 'index'])->name('api.velden.index');
    Route::get('/velden/{id}', [ApiVeldController::class, 'show'])->name('api.velden.show');
    Route::get('/velden/sort/{lat}/{long}', [ApiVeldController::class, 'locationSorted'])->name('api.velden.locationSorted');

    Route::get("/friends", [ApiUserFriendController::class, "index"])->name('api.friends.index');
    Route::post("/friends", [ApiUserFriendController::class, "store"])->name('api.friends.store');
    Route::get("/friends/requests", [ApiUserFriendController::class, "requests"])->name('api.friends.requests');
    Route::post("/friends/request/{id}/decide", [ApiUserFriendController::class, "decide"])->name('api.friends.decide');
    Route::delete("/friends/{id}/unfriend", [ApiUserFriendController::class, "unfriend"])->name('api.friends.unfriend');
    Route::get("/friends/provider:{provider}", [ApiUserFriendController::class, "socialFriends"])->name('api.friends.socialFriends');

    Route::get("/messages", [ApiChatMessageController::class, "index"])->name('api.messages.index');
    Route::get("/messages/{withUser}", [ApiChatMessageController::class, "withUser"])->name('api.messages.withUser');

    //notification endpoints

    Route::get("/notification_token", [ApiUserNotificationTokenController::class, "index"])->name('api.notification_token.index');
    Route::post("/notification_token", [ApiUserNotificationTokenController::class, "store"])->name('api.notification_token.store');
    Route::delete("/notification_token/{id}", [ApiUserNotificationTokenController::class, "destroy"])->name('api.notification_token.destroy');

    // Route::resource('pickups', ApiPickupController::class);

    Route::get('/pickups', [ApiPickupController::class, "index"])->name('api.pickups.index');
    Route::post('/pickups', [ApiPickupController::class, 'createPickupGame'])->name('api.pickups.create');
    Route::get('/pickups/requests', [ApiPickupController::class, "getPickupRequests"])->name('api.pickups.getPickupRequests');
    Route::post('/pickups/{id}/invitationDecide', [ApiPickupController::class, "DecidePickupInvitation"])->name('api.pickups.DecidePickupInvitation');
    Route::delete('/pickups/{id}/players/{userId}', [ApiPickupController::class, "removePlayerFromPickup"])->name('api.pickups.removePlayerFromPickup');
    Route::post('/pickups/{id}/invite', [ApiPickupController::class, "inviteToPickup"])->name('api.pickups.inviteToPickup');
    // Route::get('/pickups/{id}', [ApiPickupController::class, "show"]);
    Route::get('/pickups/{id}/players', [ApiPickupController::class, "getPickupPlayers"])->name('api.pickups.getPickupPlayers');
    Route::put('/pickups/{id}/activate', [ApiPickupController::class, "activatePickup"])->name('api.pickups.activatePickup');
    Route::put('/pickups/{id}/deactivate', [ApiPickupController::class, "deactivatePickup"])->name('api.pickups.deactivatePickup');
    Route::put('/pickups/{id}', [ApiPickupController::class, "updatePickup"])->name('api.pickups.updatePickup');
    Route::post('/pickups/{id}/gameResult', [ApiPickupController::class, "addGameResult"])->name('api.pickups.addGameResult');
    Route::get('/pickups/usersToInvite', [ApiPickupController::class, "usersToInvite"])->name('api.pickups.usersToInvite');
});
