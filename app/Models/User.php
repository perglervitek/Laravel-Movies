<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relation for reviews table. One user can hold many reviews
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    //Calculates the rating based on reviews
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
    
    //Checks if this item has been already reviewsd by the current user
    public function alreadyReview($movie_id, $reviews){
        foreach($reviews as $review){
            if($movie_id == $review->movie->id && Auth::user()->id == $review->user->id){
                return true;
            }
        }
        return false;
    }
}
