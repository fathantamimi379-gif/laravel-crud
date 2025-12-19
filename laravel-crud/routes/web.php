<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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

Route::get('/siswa', 'App\Http\Controllers\SiswaController@index');
Route::post('/siswa/create','App\Http\Controllers\SiswaController@create');
Route::get('/siswa/{id}/edit', [App\Http\Controllers\SiswaController::class, 'edit']);
Route::post('/siswa/{id}/update', [App\Http\Controllers\SiswaController::class, 'update']);
Route::get('/siswa/{id}/delete', [App\Http\Controllers\SiswaController::class, 'delete']);
