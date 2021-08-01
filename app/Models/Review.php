<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //Fillable items by user
    protected $fillable = [
        'content', 'movie_id', 'user_id' , 'rating'
    ];
    //Relation for movies table. One movie can hold many reviews

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    //Relation for users table. One user can hold many reviews
    public function user(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
