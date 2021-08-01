<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genres;

class MoviesPublicController extends Controller
{
    public function index()
    {
        // Get all genres and Move model
        $genres = Genres::orderBy('name')->get();
        $movies = new Movie;

        //Check if request has genres_id to filter it
        if (request()->has('genres_id')) {
            $movies = $movies->where('genres_id', request('genres_id'));
        }
        //Check if request has title to filter it
        if (request()->has('title')) {
            $movies = $movies->where('title', 'LIKE', '%' . request('title') . '%');
        }
        //Check if request has sort to sort the results
        if (request()->has('sort')) {
            $movies = $movies->orderBy('title', request('sort'));
        }

        // Paginate the result
        $movies = $movies->paginate(5)->appends([
            'genres_id' => request('genres_id'),
            'sort' => request('sort'),
            'title' => request('title')
        ]);
            //return to the view
        return view('public.movies.showAll', compact('movies'))->with('genres', $genres);
    }

    public function show(Movie $movie)
    {   
        // Returns to sing movie item
        return view('public.movies.show')->with('movie', $movie);
    }
}
