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

Route::get('home', [\App\Http\Controllers\UsersController::class, 'index'])->name('show_list');
Route::get('/create_user', [\App\Http\Controllers\UsersController::class, 'create'])->name('create_user');
Route::get('/store', [\App\Http\Controllers\UsersController::class, 'store'])->name('store_user');
Route::get('/edit/{id}', [\App\Http\Controllers\UsersController::class, 'edit'])->name('edit_user');
Route::post('/edit/{id}', [\App\Http\Controllers\UsersController::class, 'update'])->name('update_user');
Route::get('/delete/{id}', [\App\Http\Controllers\UsersController::class, 'destroy'])->name('delete_user');
