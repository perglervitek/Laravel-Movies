<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use App\Models\Genres;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returns main component for movies which hold all movies
        return view('movies.index')->with('movies', Movie::paginate(10))->with('genres', Genres::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Navigates to form for creation a new movie with all genres fetched
        return view('movies.create')->with('genres', Genres::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        // Image upload
        
        $image = $request->image->store('movies', 'public');

        // Create the movie

        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'slug' => $request->title,
            'produced_at' => $request->produced_at,
            'genres_id' => $request->genres
        ]);

        // Flash message and redirect
        session()->flash('success', 'Film vytvořen');
        return redirect(route('movies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        // Navigate to form for creation but with filled in data
        return view('movies.create')->with('movie', $movie)->with('genres', Genres::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $genre_id = request('genres');
        // get data from request
        $request->merge([
            'genres_id' => $genre_id
        ]);
        $data = $request->only(['title', 'description', 'produced_at', 'genres_id']);
        // Check if image is present in request
        if ($request->hasFile('image')) {
            //Store new image
            $image = $request->image->store('movies', 'public');
            // Delete old image
            Storage::delete('/public/'.$movie->image);
            // Add new image to request
            $data['image'] = $image;
          }
        $movie->update($data);
        session()->flash('success', 'Film byl upraven.');
        // Redirect to prevent double save
        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the records which should be destroyed
        $movie = Movie::where('id', $id)->first();
        // Delete movie image
        Storage::delete('/public/'.$movie->image);
        // Delete the movie
        $movie->delete();
        session()->flash('success', 'Film odstraněn');
        // Redirect to index route
        return redirect(route('movies.index'));
    }
}
