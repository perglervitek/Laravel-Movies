@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="container-movie">
            <header class="section-header">Uživatel: {{ $user->name }}
            </header>
            @if ($user->reviews->count() > 0)
                <h2 class="section-header">
                    Filmy v knihovně
                </h2>
                <div class="mb-5 mt-5">
                    @foreach ($user->reviews as $review)
                        <a class="search-genre" href="{{ route('movie.show', $review->movie->id)}}">{{ $review->movie->title }}</a>

                    @endforeach
                </div>
            @endif
            @if ($user->reviews->count() > 0)
                <h2 class="section-header">
                    Recenze filmu
                </h2>
                @foreach ($user->reviews as $review)
                    <div class="review">
                        <p>Napsal jste:</p>
                        <p class="review-content">{{ $review->content }}</p>
                        <p class="review-content">Hodnocení: {{ $review->rating }}</p>
                        <p class="review-content">Film: <a class="search-genre" href="{{ route('movie.show', $review->movie->id)}}">{{ $review->movie->title }}</a></p>
                    </div>
                @endforeach
            @endif
            @if($user->reviews->count() == 0)
            <header class="section-header text-center">
                <p>Váš účet je prázdný</p>
            </header>
            @endif
        </section>
    </div>
@endsection
