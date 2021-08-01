@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-container">

            <header class="section-header text-center">
                <p>Filmy</p>
            </header>
            <h2 class="filter-title">
                Kategorie
            </h2>
            @foreach ($genres as $genre)
                <a class="search-genre" href="/~perglvit/public/movies?genres_id={{ $genre->id }}">{{ $genre->name }}</a>
            @endforeach
            <h2 class="filter-title">
                Řazení
            </h2>
            <a class="search-genre"
                href="{{ route('movie.index', ['genre' => request('genre'), 'sort' => 'asc']) }}">Vzestupně</a>
            <a class="search-genre"
                href="{{ route('movie.index', ['genre' => request('genre'), 'sort' => 'desc']) }}">Sestupně</a>
            <h2 class="filter-title">
                Vyhledat název
            </h2>
            <form class="seach-form" action="{{ route('movie.index') }}" method="GET">
                <label class="search-label" for="title">* Název filmu</label>
                <input class="search-input" type="text" name="title" id="title" required
                    value="{{ isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '' }}">

                <button class="search-btn" type="submit">Hledat</button>

            </form>
            <a class="search-genre remove-filters" href="{{ route('movie.index') }} ">Vymazat filtry</a>

            @if ($movies->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Náhled filmu</th>
                            <th>Název filmu</th>
                            <th>Žánr filmu</th>
                            <th>Počet hodnocení</th>
                            <th>Průměrné hodnocení</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>
                                    <div class="table-img-container">
                                        <a href="{{ route('movie.show', $movie->id) }}">
                                            <img src="{{ asset('storage/' . $movie->image) }}" alt="Obal filmu">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a class="search-genre" href="{{ route('movie.show', $movie->id) }}">
                                        {{ $movie->title }}
                                    </a>
                                </td>
                                <td>
                                    <a class="search-genre"  href="/~perglvit/public/movies?genres_id={{ $movie->genres->id }}">
                                        {{ $movie->genres->name }}
                                    </a>
                                </td>
                                <td>
                                    <span>{{ $movie->reviews->count() }} </span>
                                </td>
                                <td>
                                    {{ $movie->rating($movie->reviews) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-btns">
                    {{ $movies->links() }}
                </div>
            @else
                <h2 class="section-header text-center">Žádné filmy</h2>
            @endif
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/components/search.js') }}"></script>
    @endpush
@endsection
