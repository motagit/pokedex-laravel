<?php

use App\Http\Controllers\PokemonsController;
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

Route::get('/', [PokemonsController::class, 'index']);
Route::post('/pokemon', [PokemonsController::class, 'store'])->middleware('auth');;
Route::delete('/pokemon/{id}', [PokemonsController::class, 'destroy'])->middleware('auth');;
Route::get('/pokemon/{id}', [PokemonsController::class, 'show']);
Route::any('/insertPokemon', [PokemonsController::class, 'insertPokemon'])->middleware('auth');


Auth::routes();

Route::get('/home', [PokemonsController::class, 'index'])->name('home');
