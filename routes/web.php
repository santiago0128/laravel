<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['web', 'auth', 'check_user_status'])->group(function () {
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('User');
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'store'])->name('EditUser');
    Route::post('/campanastatus', [App\Http\Controllers\UserController::class, 'editarUsuarios'])->name('EditUser');
    Route::get('/main', [App\Http\Controllers\UserController::class, 'controlCampana']);
    

});