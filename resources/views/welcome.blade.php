@extends('layouts.app')

@section('content')
<div class="container">
    <div class="slider">
        <div class="slides">
            @foreach ($movies as $newMovie)
            <div  id="slide-{{($loop->index+1)}}">
                <a class="slide" href="{{ route('movie.show', $newMovie->id) }}">
                    <img src="{{asset('storage/'.$newMovie->image)}}" alt="Animals">
                    <div class="slider-text">{{$newMovie->title}}</div>
                </a>
            </div> 
            @endforeach
        </div>
        <a href="#slide-1">1</a>
        <a href="#slide-2">2</a>
        <a href="#slide-3">3</a>
        <a href="#slide-4">4</a>
        <a href="#slide-5">5</a>
    </div>
    <section>
        <header class="section-header">
            <h2>Náhodné filmy </h2>
        </header>
        <div class="movies">
            @foreach ($randomMovies as $randomMovie)
                <div class="movie-item"><a href="{{ route('movie.show', $randomMovie->id) }}">
                    <img src="{{asset('storage/'.$randomMovie->image)}}" alt="{{$randomMovie->title}}">
                    <div class="movie-text">{{ $randomMovie->title }}</div>
                </a></div>
            @endforeach
        </div>  
    </section>
    @foreach ($genres as $genre)

    @if($genre->movies->count() >= 3)
    <header class="section-header">
        <h2>{{ $genre->name}}</h2>
    </header>
        <div class="movies">
            @foreach ($genre->movies as $movie)
            <div class="movie-item"><a href="{{ route('movie.show', $movie->id) }}">
                <img src="{{asset('storage/'.$movie->image)}}" alt="{{$movie->title}}">
                <div class="movie-text">{{ $movie->title }}</div>
            </a></div>
            @endforeach
        </div>    
    @endif
    @endforeach
    </div>
@endsection
