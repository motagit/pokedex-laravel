<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'imageUrl', 'description', 'created_by'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemon_type', 'pokemon_id', 'type_id');
    }

}
