<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;

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
    return view('/series');

});

Route::resource('/series', SeriesController::class)
    ->except('show');

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

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{season}/episodes', function (\Illuminate\Http\Request $request) {
//    dd($request->all());
    return to_route('series.index');
});
