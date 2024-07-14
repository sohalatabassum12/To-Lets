<?php

use App\Http\Middleware\HouseUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookHouseController;
use App\Http\Controllers\UserProfileController;

Route::get('/', [ProductController::class, 'index']);
 
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
    Route::GET('/', [ProductController::class, 'index'])->name('list')->withoutMiddleware(HouseUpload::class);
    Route::GET('/create', [ProductController::class, 'create'])->name('create');
    Route::POST('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/{house}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ProductController::class, 'update'])->name('update');
    Route::get('/{product}/delete', [ProductController::class, 'delete'])->name('delete');

});


Route::get('/profile/list', [UserProfileController::class, 'index'])->name('profile.list');
Route::GET('/profile/create', [UserProfileController::class, 'create'])->name('profile.create');
Route::POST('/profile/store', [UserProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/{profile}/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}/update', [UserProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{profile}/delete', [UserProfileController::class, 'delete'])->name('profile.delete');
   

Route::get('/book/{product}', [BookHouseController::class, 'status'])->name('house.book')->middleware('auth');
Route::get('/message/{productId}', [MessageController::class, 'index'])->name('message');
Route::post('/message/send', [MessageController::class, 'send'])->name('message.send');
Route::get('/user', function(){
    return Auth::user();
});
// Route::get('/logout', function(){
//     return Auth::logout();
// });