<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function index() {
        $pokemons = Pokemon::with('types')->get();
        return view('pokemons', ['pokemons' => $pokemons]);
    }

    public function postPokemon(Request $request) {
        $image = base64_encode(file_get_contents($request->file('imageUrl')));

        $pokemon = Pokemon::create([
            "name"=>$request->input("name"),
            "imageUrl"=>$image
        ]);
        // $types = $request->input("types");

        // foreach ($types as $value) {
        //     PokemonType::create([
        //         "type_id"=>$value["id"],
        //         "pokemon_id"=>$pokemon->id
        //     ]);
        // }

        $typeId = $request->input("type");

        PokemonType::create([
            "type_id"=>$typeId,
            "pokemon_id"=>$pokemon->id
        ]);

        return redirect('/');

    }
}
