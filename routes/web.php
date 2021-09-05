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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cursos/{id}/inscricao', [App\Http\Controllers\CursosController::class, 'inscricao'])->name('cursos.inscricao');

Route::resource('inscricaos',App\Http\Controllers\InscricaosController::class);
Route::resource('cursos',App\Http\Controllers\CursosController::class);