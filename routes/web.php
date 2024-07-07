<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\HouseUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});
 
Route::GET('/register', [RegisterController::class, 'index'])->name('register');
Route::POST('/register/create', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::group(['prefix'=>'house', 'as'=>'product.'],function(){
//     Route::GET('/', [ProductController::class, 'index']);
//     Route::GET('/create', [ProductController::class, 'create'])->name('create');
//     Route::POST('/store', [ProductController::class, 'store'])->name('store');
// });

Route::middleware(['auth', HouseUpload::class])->prefix('house')->name('product.')->group(function(){
    Route::GET('/', [ProductController::class, 'index'])->withoutMiddleware(HouseUpload::class);
    Route::GET('/create', [ProductController::class, 'create'])->name('create');
    Route::POST('/store', [ProductController::class, 'store'])->name('store');
});






Route::get('/user', function(){
    return Auth::user();
});
// Route::get('/logout', function(){
//     return Auth::logout();
// });