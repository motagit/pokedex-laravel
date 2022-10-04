<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PokemonsController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::where('approved', '=', true)->get();
        return view('pokemons', ['pokemons' => $pokemons]);
    }

    public function show($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('details', ['pokemon' => $pokemon]);
    }

    public function store(Request $request)
    {
        $image = base64_encode(file_get_contents($request->file('imageUrl')));

        $userId = Auth::user()->id;

        $pokemon = Pokemon::create([
            "name"=>$request->input("name"),
            "description"=>$request->input("description"),
            "imageUrl"=>$image,
            "created_by"=>$userId
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

    public function insertPokemon()
    {
        $types = DB::table('type')->get();
        return view('insert', ['types' => $types]);
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemonTypes = DB::table('pokemon_type')->where('pokemon_id', '=', $id)->get();

        foreach ($pokemonTypes as $pokemonType) {
            $pokemonTypeRow = PokemonType::findOrFail($pokemonType->id);
            $pokemonTypeRow->delete();
        }

        $pokemon->delete();
        $previousUrl = str_replace(url('/'), '', url()->previous());

        if ($previousUrl == '/managePokemons'){
            return redirect('/managePokemons');
        } else {
            return redirect('/');
        }
    }

    public function approvePokemonsList()
    {
        $pokemons = Pokemon::with('user')->where('approved', '=', false)->get();

        return view('approvePokemons', ['pokemons' => $pokemons]);
    }

    public function approvePokemon($id)
    {
        $pokemon = Pokemon::findOrFail($id);

        if ($pokemon) {
            $pokemon->approved = true;
            $pokemon->save();
        }

        return $this->approvePokemonsList();
    }
}
