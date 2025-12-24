<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use Termwind\Components\Raw;

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
    return view('home');
});

Route::get('/login','App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin','App\Http\Controllers\AuthController@postlogin');
Route::get('/logout','App\Http\Controllers\AuthController@logout');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('auth');
Route::get('/siswa', 'App\Http\Controllers\SiswaController@index')->middleware('auth');
Route::post('/siswa/create','App\Http\Controllers\SiswaController@create')->middleware('auth');
Route::get('/siswa/{id}/edit', [App\Http\Controllers\SiswaController::class, 'edit'])->middleware('auth');
Route::post('/siswa/{id}/update', [App\Http\Controllers\SiswaController::class, 'update'])->middleware('auth');
Route::get('/siswa/{id}/delete', [App\Http\Controllers\SiswaController::class, 'delete'])->middleware('auth');
Route::get('/siswa/{id}/profile', [App\Http\Controllers\SiswaController::class, 'profile']);
