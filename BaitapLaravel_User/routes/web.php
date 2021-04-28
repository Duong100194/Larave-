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

/*Route::get('/', function () {
    return view('user-list-view');
});
*/
Route::get('', [\App\Http\Controllers\HomeController::class, 'index'])->name('show_list');
Route::get('/create-user', [\App\Http\Controllers\CreateUserController::class, 'index'])->name('create_user');

