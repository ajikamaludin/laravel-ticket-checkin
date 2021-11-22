<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\TicketController;

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

Route::get('/login', [AuthController::class, 'formLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.store')->middleware('guest');

// Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard')->middleware('auth');

// resources
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index')->middleware('auth');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create')->middleware('auth');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store')->middleware('auth');
Route::get('/tickets/{ticket}', [TicketController::class, 'edit'])->name('tickets.edit')->middleware('auth');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update')->middleware('auth');
