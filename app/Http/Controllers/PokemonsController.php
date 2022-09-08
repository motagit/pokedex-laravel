<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function index() {
        $pokemons = Pokemon::with('types')->get();
        return $pokemons;
    }

    public function store(Request $request) {

        $pokemon = Pokemon::create([
            "name"=>$request->input("name"),
            "imageUrl"=>$request->input("imageUrl")
        ]);
        $types = $request->input("types");

        foreach ($types as $value) {
            PokemonType::create([
                "type_id"=>$value["id"],
                "pokemon_id"=>$pokemon->id
            ]);
        }

        return $pokemon;

    }
}
