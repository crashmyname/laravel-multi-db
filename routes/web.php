<?php

use App\Http\Controllers\UserController;
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
    return view('user.user');
});
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::get('/login', function(){
    return view('auth.login');
});
Route::post('/login',[UserController::class, 'onLogin'])->name('login');
Route::middleware(['auth', 'setDatabase'])->group(function () {
    Route::get('/home',[UserController::class, 'home'])->name('home');
    Route::post('/logout',[UserController::class, 'logout'])->name('logout');
    // Route lainnya...
});
