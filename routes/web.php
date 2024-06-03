<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallController;

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
Route::post('/install',[InstallController::class,'store'])->name('install.store');
Route::get('/',[HomeController::class,'setup']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
Route::get('admin/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit']);
Route::delete('admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
Route::get('admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show']);
Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
Route::post('admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store']);
Route::post('admin/users/{user}/update', [App\Http\Controllers\Admin\UserController::class, 'update']);
// User Routes - Account
Route::get('account', [App\Http\Controllers\Account\AccountController::class, 'index']);
Route::get('account/details/edit', [App\Http\Controllers\Account\AccountController::class, 'edit']);
Route::post('account/details/update', [App\Http\Controllers\Account\AccountController::class, 'update']);
Route::get('account/logout', [App\Http\Controllers\Account\AccountController::class, 'logout']);