<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
})->middleware(Autenticador::class);

/**
 * o resource simplifica todos esses metodos, mas para isso, precisamos seguir as boas praticas
 * as boas pratica sao as 'normas' a serem seguidas nas criacoes desses metodos, nas nomemclaturas
 * nomes esses que ja vem predefinidos, basta conhecer as normas
 */
//Route::controller(SeriesController::class)->group(function () {
//    Route::get('/series', 'index')->name('series.index');
//    Route::get('/series/create', 'create')->name('series.create');
//    Route::post('/series/salvar', 'store')->name('series.store');
//});
//Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');

/**
 * dessa forma podemos simplificar o uso das rotas
 */
Route::resource('/series', SeriesController::class)
    ->except('show');

// seasons //
Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

// episodes //
Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])
    ->name('episodes.update');

// login //
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->name('signin');
Route::get('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [UsersController::class, 'create'])
    ->name('users.create');
Route::post('/register', [UsersController::class, 'store'])
    ->name('users.store');
