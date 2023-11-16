<?php

use App\Http\Controllers\AdminController;
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

Route::get('/home', function () {
    return view('panels.home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin')->name('admin');
    Route::patch('/update-user/{user}', [AdminController::class, 'update'])->middleware('is_admin')->name('update.user');
    Route::delete('/delete-user', [AdminController::class, 'delete'])->middleware('is_admin')->name('delete.user');
    Route::post('/create-user', [AdminController::class, 'store'])->middleware('is_admin')->name('create.user');
});

require __DIR__.'/auth.php';
