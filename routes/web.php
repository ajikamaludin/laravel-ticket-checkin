<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', '\FrontPageController@index');

Route::get('/', [FrontPageController::class, 'index'])->name('frontpage.index');
Route::post('/', [FrontPageController::class, 'store'])->name('frontpage.store');

Route::get('/login', [AuthController::class, 'formLogin'])->name('auth.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/home', function () {
    return view('admin.index');
})->name('dashboard');
