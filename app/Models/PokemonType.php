<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonType extends Model
{
    use HasFactory;

    protected $table = 'pokemon_type';
    protected $primaryKey = 'id';
    protected $fillable = ["type_id", "pokemon_id"];
}
