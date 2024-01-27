<?php

use App\Mail\NewUserWelcomeMail;
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
    return view('welcome');
});

Auth::routes();
Route::get('/email',function (){
    return new NewUserWelcomeMail();
});
Route::post('follow/{user}',[App\Http\Controllers\follwersController::class, 'store']);
Route::get('/',[App\Http\Controllers\PostController::class, 'index']);
Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create'])->name('create');
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/p/{post}', [App\Http\Controllers\PostController::class, 'show']);
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');