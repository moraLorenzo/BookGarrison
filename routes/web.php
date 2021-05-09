<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('admin', AdminController::class)->middleware('is_admin');

Route::resource('user', UserController::class)->middleware('is_user');

Route::resource('book', BookController::class)->middleware('is_admin');

Route::patch('/book/update_status/{id}/{status}', [App\Http\Controllers\BookController::class, 'update_status'])->middleware('is_admin')->name('book.update_status');
