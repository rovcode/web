<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\FileController;
use Illuminate\Support\Facades\Auth;

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

// Route::post('/login', [App\Http\Controllers\Web\AuthController::class, 'login_user'])->name('loginapi');
// Route::post('/register', [App\Http\Controllers\Web\AuthController::class, 'register_user'])->name('myregister');

Route::group(['prefix' => 'file'], function () {
    Route::get('/add',[FileController::class, 'create'])->name('add_file');
    Route::get('/',[FileController::class, 'index_file']);    
    Route::get('/details/{id}', [FileController::class, 'show'])->name('show_file');
    Route::post('/store',[FileController::class, 'store'])->name('register_file');
    Route::delete('/delete/{id}',[FileController::class, 'destroy'])->name('delete_file');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
