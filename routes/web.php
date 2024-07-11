<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\UserController;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
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
})->name('index');

Route::get('user/{user}', [UserController::class, 'getUser'])->name('user.id');

Route::get('users', [UserController::class, 'index'])->name('users');

Route::get('businesses', [BusinessController::class, 'index'])->name('businesses');