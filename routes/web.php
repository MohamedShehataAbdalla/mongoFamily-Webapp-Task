<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GrandparentController;
use App\Http\Controllers\SonController;
use App\Http\Controllers\GrandsonController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::resource('users', UserController::class);
    Route::resource('grandparents', GrandparentController::class);
    Route::resource('sons', SonController::class);
    Route::resource('grandsons', GrandsonController::class);









