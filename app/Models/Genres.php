<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    //Filable fields by user
    protected $fillable = ['name', 'slug'];
    use HasFactory;

    //Relation for movies table. One genre can hold many movies
    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
