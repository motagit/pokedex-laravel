<?php

use App\Http\Controllers\PokemonsController;
use App\Http\Controllers\UserController;
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
Route::get('/insertPokemon', [PokemonsController::class, 'insertPokemon'])->middleware('auth');
Route::put('/approvePokemon/{id}', [PokemonsController::class, 'approvePokemon'])->name('approvePokemon')->middleware('auth');
Route::put('/reprovePokemon/{id}', [PokemonsController::class, 'reprovePokemon'])->middleware('auth');
Route::put('/turnAdmin/{id}', [UserController::class, 'turnAdmin'])->name('turnAdmin')->middleware('auth');

Route::get('/home', [PokemonsController::class, 'index'])->name('home');
Route::get('/managePokemons', [PokemonsController::class, 'approvePokemonsList'])->name('managePokemons');
Route::get('/permissions', [UserController::class, 'index'])->name('permissions');

Auth::routes();


