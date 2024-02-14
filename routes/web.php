<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\DB;

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

//// de esta forma puedo ver en la web todas las consultas que se estan ejecutando
//DB::listen(function ($query){
//    dump($query->sql);
//});

Route::view('/welcome', 'welcome')->name('welcome');


Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    Route::put('/chirps/{id}', [ChirpController::class, 'update'])->name('chirps.update');
    Route::delete('/chirps/{id}', [ChirpController::class, 'destroy'])->name('chirps.delete');

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});

require __DIR__.'/auth.php';
