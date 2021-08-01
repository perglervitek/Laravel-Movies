@extends('layouts.app')

@section('content')
    <div class="slider">
        <div class="slides">
            <div class="slide">
                <img src="{{ asset('storage/' . $movie->image) }}" alt="Animals">
            </div>
        </div>
    </div>

    <section class="container-movie">
        <h2 class="section-header">{{ $movie->title }} ({{ date('Y', strtotime($movie->produced_at)) }})</h2>
        <p class="movie-description">
            Žánr: <a href="/movies/?genres_id={{ $movie->genres_id }}">{{ $movie->genres->name }}</a>
        </p>
        <p class="movie-description">
            {{ $movie->description }}
        </p>
        <h2 class="section-header">
            Recenze filmu
        </h2>
        @foreach ($movie->reviews as $review)
        <div class="review @if(Auth::check() && $review->user->id == Auth::user()->id) user-review @endif">
        @if(Auth::check() && $review->user->id == Auth::user()->id)
            <h2 class="section-header">Moje recenze: </h2>
        @endif
        <p>Uživatel: {{ $review->user->name }} napsal:</p>
        <p class="review-content">{{ $review->content }}</p>
        <p class="review-content">Hodnocení: {{ $review->rating }}</p>
        </div>

        @endforeach
        @if (Auth::check())
            @if (!Auth::user()->alreadyReview($movie->id, $movie->reviews))
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="register-container" action="{{ route('reviews.store') }}" method="post">
                    @csrf
                    <h2>Přidat recenzi</h2>
                    <div class="input-group">
                        <label for="content">* Recenze</label>
                        <textarea minlength="100" name="content" id="content" required>{{ old('content') }}</textarea>
                    </div>
                    <div class="input-group">
                        <label for="rating">* Hodnocení (Jako ve škole)</label>
                        <input type="number" name="rating" id="rating" value="{{ old('rating') }}" required max="5" min="1">
                    </div>
                    <div class="input-group">
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <input class="register-btn" type="submit" value="Odeslat">
                    </div>
                </form>
            @endif
        @endif
    </section>
    @push('scripts')
        <script src="{{ asset('js/components/createReview.js') }}"></script>
    @endpush
@endsection
