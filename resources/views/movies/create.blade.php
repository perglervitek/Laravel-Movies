@extends('layouts.app')

@section('content')
    <!-- Blade for creating a new movie -->
    <div class="register-container">
        <h2 class="text-center form-title">
            {{ isset($movie) ? 'Upravit film' : 'Vytvořit film' }}
        </h2>
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
        <form action="{{ isset($movie) ? route('movies.update', $movie->id) : route('movies.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @if (isset($movie))
                @method('PUT')
            @endif
            <div class="input-group">
                <label for="title">* Název filmu</label>
                <input type="text" name="title" id="title" value="{{ isset($movie) ? $movie->title : old('title') }}" required>
            </div>
            <div class="input-group">
                <label for="description">* Popis filmu</label>
                <textarea name="description" id="description" cols="30" minlength="100" required
                    rows="10">{{ isset($movie) ? $movie->description : old('description') }}</textarea>
            </div>
            <div class="input-group">
                <label for="produced_at">* Produkováno</label>
                <input type="date" name="produced_at" id="produced_at" required
                    value="{{ isset($movie) ? $movie->produced_at->format('Y-m-d') : (old('produced_at') ? old('produced_at') : '') }}">
            </div>
            @if (isset($movie))
                <div class="input-group">
                    <img src="{{ asset('storage/' . $movie->image) }}" alt="Náhled filmu">
                </div>
            @endif
            <div class="input-group">
                <div class="mb-5">
                    <label for="image">@if(isset($movie)) Obrázek filmu @else * Obrázek filmu @endif </label>
                </div>
                <input type="file" name="image" id="image">
            </div>
            <div class="input-group">
                <label for="genres">* Žánr</label>
                <select name="genres" id="genres" required>
                    @if(!isset($movie))
                    <option value="">Vyber</option>
                    @endif
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @if (isset($movie))
                            @if ($genre->id == $movie->genres_id)
                                selected
                            @endif
                    @endif
                    >{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <button type="submit" class="register-btn">{{ isset($movie) ? 'Upravit' : 'Vytvořit' }}</button>
            </div>

        </form>
    </div>
    @push('scripts')
        <script src="{{ asset('js/components/createMovie.js') }}"></script>
    @endpush
@endsection
