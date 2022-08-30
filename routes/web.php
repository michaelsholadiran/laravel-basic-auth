<?php

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

//Auth
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SubAdmin\DashboardController as SubAdminDashboardController;

Route::get('/', function () {
    return view('admin.dashboard.index');
});


// Route::middleware(['auth','verified'])->prefix('admin/')->name('backend.')->group(function () {
Route::middleware(['guest','guest:superadmin','guest:subadmin','guest:user'])->group(function () {
Route::controller(AuthenticatedSessionController::class)->prefix('/')->group(function () {

Route::get('/login', 'create')->name('login');
Route::post('login', 'store')->name('login.store');
});

Route::controller(RegisteredUserController::class)->name('register')->prefix('/')->group(function () {
Route::get('/register', 'create');
Route::post('/register', 'store')->name('.store');
});
});
//this should have auth middleware for respective guards
Route::get('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::middleware(['auth:user'])->prefix('user')->name('user.')->group(function () {
 Route::resource('dashboard', UserDashboardController::class);
});

Route::middleware(['auth:superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
 Route::resource('dashboard', SuperAdminDashboardController::class);
});

Route::middleware(['auth:subadmin'])->prefix('subadmin')->name('subadmin.')->group(function () {
 Route::resource('dashboard', SubAdminDashboardController::class);
});
