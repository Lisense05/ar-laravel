<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminStatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
});

Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin')->name('admin');
    Route::patch('/update-user/{user}', [AdminController::class, 'update'])->middleware('is_admin')->name('update.user');
    Route::delete('/delete-user', [AdminController::class, 'delete'])->middleware('is_admin')->name('delete.user');
    Route::post('/create-user', [AdminController::class, 'store'])->middleware('is_admin')->name('create.user');

    Route::get('/players', [PlayersController::class, 'index'])->name('players');
    Route::get('/search', [PlayersController::class, 'search']);

    Route::get('/players/{playerId}', [PlayersController::class, 'getPlayerInfo'])->name('playerInfo');

    Route::get('/players/{playerId}/search-vehicles', [PlayersController::class, 'searchPlayerVehicles'])->name('searchPlayerVehicles');
    Route::get('/players/{playerId}/search-contacts', [PlayersController::class, 'searchPlayerContacts'])->name('searchPlayerContacts');
    Route::get('/players/{playerId}/search-phone', [PlayersController::class, 'searchPlayerPhoneTransactions'])->name('searchPlayerPhoneTransactions');
    Route::get('/players/{playerId}/search-bank', [PlayersController::class, 'searchPlayerBankTransactions'])->name('searchPlayerBankTransactions');

    Route::put('/players/{playerId}', [PlayersController::class, 'update'])->name('players.update');

    Route::get('/adminstat', [AdminStatController::class, 'index'])->name('adminstat');

    
    
});

require __DIR__.'/auth.php';
