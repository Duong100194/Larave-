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
Route::get('list', [\App\Http\Controllers\UserController::class, 'index'])->name('show_list');
Route::get('/create_user', [\App\Http\Controllers\UserController::class, 'create'])->name('create_user');
Route::post('/store', [\App\Http\Controllers\UserController::class, 'store'])->name('store_user');
Route::get('/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
Route::post('/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('update_user');
Route::post('/delete', [\App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user');
Route::post('/search', [\App\Http\Controllers\UserController::class, 'search'])->name('search');
//Route::post('/search', 'HomeController@searchdata')->name('searchdata');
//Route::post('/search', [\App\Http\Controllers\UserController::class, 'searchFullText'])->name('searchdata');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
