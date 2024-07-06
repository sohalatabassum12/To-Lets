<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});
 
Route::GET('/register', [RegisterController::class, 'index'])->name('register');
Route::POST('/register/create', [RegisterController::class, 'store']);

//Route::get('/register/{id}/login', [LoginController::class, 'login'])->name('profile.login');
//Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginCheck', [LoginController::class, 'loginCheck'])->name('loginCheck');

Route::get('product', function(){
    return view('product.blade.php');
});

Route::get('/user', function(){
    return Auth::user();
});
Route::get('/logout', function(){
    return Auth::logout();
});