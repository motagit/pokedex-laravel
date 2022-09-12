<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonsController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with('types')->get();
        return view('pokemons', ['pokemons' => $pokemons]);
    }

    public function getPokemon($id)
    {
        $pokemon = Pokemon::find($id);
        return view('details', ['pokemon' => $pokemon]);
    }

    public function insertPokemonPage()
    {
        $types = DB::table('type')->get();
        return view('insert', ['types' => $types]);
    }

    public function postPokemon(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('imageUrl')));

        $pokemon = Pokemon::create([
            "name"=>$request->input("name"),
            "description"=>$request->input("description"),
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
