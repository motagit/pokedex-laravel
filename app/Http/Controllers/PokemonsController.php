<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function index() {
        $pokemons = Pokemon::with('types')->get();
        return $pokemons;
    }
}
