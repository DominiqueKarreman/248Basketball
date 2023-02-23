<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeldController;

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

Route::get('/velden', function () {
    
    return view('velden');
    
});
Route::resource('velden', VeldController::class);

Route::get('/velden', [VeldController::class, 'index'])->name('velden.index');
Route::get('/velden/create', [VeldController::class, 'create'])->name('velden.create');
Route::get('/velden/{veld}', [VeldController::class, 'show'])->name('velden.show');
Route::get('/velden/{veld}/edit', [VeldController::class, 'edit'])->name('velden.edit');
Route::post('/velden', [VeldController::class, 'store'])->name('velden.store');
Route::put('/velden/{veld}', [VeldController::class, 'update'])->name('velden.update');
Route::delete('/velden/{veld}', [VeldController::class, 'destroy'])->name('velden.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
