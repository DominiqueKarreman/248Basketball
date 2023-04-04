<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocatieController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeldController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ws', function () {
    // event(new App\Events\chatMessage('Hello World'));
    return View('ws');
});
Route::get('/wse', function () {
    event(new App\Events\chatMessage('Hello World'));
    return View('ws');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get(
        '/dashboard',
        function () {
            return view('dashboard');
        }
    )->name('dashboard');


    Route::get('/velden', [VeldController::class, 'index'])->name('velden.index');
    Route::get('/velden/create', [VeldController::class, 'create'])->name('velden.create');
    Route::get('/velden/{veld}', [VeldController::class, 'show'])->name('velden.show');
    Route::get('/velden/{veld}/edit', [VeldController::class, 'edit'])->name('velden.edit');
    Route::post('/velden', [VeldController::class, 'store'])->name('velden.store');
    Route::put('/velden/{veld}', [VeldController::class, 'update'])->name('velden.update');
    Route::delete('/velden/{veld}', [VeldController::class, 'destroy'])->name('velden.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{veld}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{veld}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{veld}', [UserController::class, 'update'])->name('users.update');
    Route::put('/users/{id}/changeRoles', [UserController::class, 'changeRoles'])->name('users.changeRoles');
    Route::delete('/users/{veld}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('/permissions/{id}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::put('/roles/{id}/permissions/edit', [RoleController::class, 'permissionUpdate'])->name('roles.permissions.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::resource('events', EventController::class);

    Route::get('/locaties', [LocatieController::class, 'index'])->name('locaties.index');
    Route::get('/locaties/create', [LocatieController::class, 'create'])->name('locaties.create');
    Route::get('/locaties/{id}', [LocatieController::class, 'show'])->name('locaties.show');
    Route::get('/locaties/{id}/edit', [LocatieController::class, 'edit'])->name('locaties.edit');
    Route::post('/locaties', [LocatieController::class, 'store'])->name('locaties.store');
    Route::put('/locaties/{id}', [LocatieController::class, 'update'])->name('locaties.update');

    Route::delete('/locaties/{id}', [LocatieController::class, 'destroy'])->name('locaties.destroy');
    Route::post('/ws', [ChatController::class, 'store'])->name('ws.store');
    Route::post('/ws/typing', [ChatController::class, 'typing'])->name('ws.typing');
    
});