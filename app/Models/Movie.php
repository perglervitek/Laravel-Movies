<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Genres;
class Movie extends Model
{

    //Fillable by user
    protected $fillable = [
        'title', 'description', 'image', 'produced_at', 'slug', 'genres_id'
    ];

    //Date fields

    protected $dates = [
        'produced_at',
    ];

    use HasFactory;
    //Relation for genres table. One movie belongs to one genre

    public function genres (){
        return $this->belongsTo(Genres::class);
    }
    //Relation for reviews table. One movie can hold many reviews

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    //Function to calculate the rating of the movie based on reviews
    public function rating($reviews){
        $rating = 0;
        $index = 0;
        foreach($reviews as $review){
            $rating += $review->rating;
            $index += 1;
        }
        if($index > 0){
            return $rating/$index;
        }
        return "-";
    }
}
