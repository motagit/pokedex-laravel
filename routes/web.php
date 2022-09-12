<?php

use App\Http\Controllers\PokemonsController;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
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
Route::post('/pokemon', [PokemonsController::class, 'postPokemon']);
Route::any('/insertPokemon', function() {
    $types = DB::table('type')->get();
    return view('insertPokemon', ['types' => $types]);
});
