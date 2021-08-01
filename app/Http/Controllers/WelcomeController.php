<?php

namespace App\Http\Controllers;
use App\Models\Genres;
use App\Models\Movie;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Prepare data for welcom page
        $genres = Genres::inRandomOrder()->limit(10)->get();
        $newestMovies = Movie::orderBy('produced_at', 'desc')->limit(5)->get();
        $randomMovies = Movie::inRandomOrder()->limit(6)->get();
        // Return parent component
        return view('welcome')->with('genres', $genres)->with('movies', $newestMovies)->with('randomMovies', $randomMovies);
    }
}
