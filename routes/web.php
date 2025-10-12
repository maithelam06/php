<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Middleware\LoginMiddleware;


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

// backend routes
Route::get('dashboar/index', [DashboardController::class, 'index'])->name
('dashboard.index')->middleware('admin');

// USER
Route::group(['prefix' => 'user'],function () {
Route::get('index', [UserController::class, 'index'])-> name
('user.index')->middleware('admin');
Route::get('create', [UserController::class, 'create'])-> name
('user.create')->middleware('admin');
});


/* AJAX */
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name
('ajax.location.index')->middleware('admin');



Route::get('admin', [AuthController::class, 'index'])->name('auth.admin');
Route::post('login' , [AuthController::class, 'login'])->name('auth.login')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');