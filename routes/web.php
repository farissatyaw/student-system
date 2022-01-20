<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'doLogin'])->name('doLogin');
Route::post('/logout', [App\Http\Controllers\UserController::class, 'doLogout'])->name('doLogout');
Route::group(['middleware'=>'auth'], function() {
    Route::get('/account/{user:uuid}', [App\Http\Controllers\UserController::class, 'show'])->name('account');
    Route::put('/account/{user:uuid}', [App\Http\Controllers\UserController::class, 'update'])->name('account.update');
});
