<?php

use App\Http\Controllers\API;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.basic')->group(function () {
    Route::get('/users', [API::class, 'getAllUsers'])->middleware('is_admin');
    Route::get('/users/{id}', [API::class, 'getUserById'])->middleware('is_admin');
    Route::put('/users/{id}', [API::class, 'updateUserById'])->middleware('is_admin');
    Route::post('/users', [API::class, 'registerUser'])->middleware('is_admin');
    Route::delete('/users/{id}', [API::class, 'deleteUserById'])->middleware('is_admin');

    Route::get('/admin-duty/{identifier}', [API::class, 'getAdminDuty']);
    Route::get('/admin-reports/{identifier}', [API::class, 'getAdminReports']);

    Route::get('/player/{identifier}', [API::class, 'getPlayer']);
    Route::get('/car/{plate}', [API::class, 'getCar']);
    
});
