<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Http\Requests\CreateGenresRequest;
use App\Http\Requests\UpdateGenresRequest;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returns main component for genres which hold all genres
        return view('genres.index')->with('genres', Genres::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returns view with form for genre creation
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGenresRequest $request)
    {
        //Create new item in database
        Genres::create([
            'name' => $request->name,
            'slug' => $request->name
        ]);
        // Add message for response to user
        session()->flash('success', 'Žánr vytvořen');
        // Redirect to prevent user sending information twice
        return redirect(route('genres.index'));
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
    public function edit(Genres $genre)
    {
        $this->authorize('view', $genre);
        return view('genres.create')->with('genre', $genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenresRequest $request, Genres $genre)
    {   
        //Function for updating informations for genre
        $genre->update([
            'name' => $request->genre
        ]);
        $genre->save();
        // Message for users response
        session()->flash('success', 'Žánr upraven');
        // Return to different route to prevent double editing
        return redirect(route('genres.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genres $genre)
    {
        //Function to delete genre
        $this->authorize('delete', $genre);
        $genre->delete();
        session()->flash('success', 'Žánr odstraněn');
        return redirect(route('genres.index'));
    }
}
