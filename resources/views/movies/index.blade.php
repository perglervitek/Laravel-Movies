@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="box">
            <div class="box-item">
                <a class="link-button" href="{{route('genres.index')}}">Spravovat žánry</a>
            </div>
            <div class="box-item">
                <a class="link-button" href="{{ route('users.index')}}">Spravovat uživatele</a>
            </div>
        </div>

        <div class="table-container">

            <header class="section-header text-center">
                <p>Filmy</p>

                <a href="{{ route('movies.create') }}" class="link-button">Vytvořit film</a>
            </header>
            @if($movies->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Náhled filmu</th>
                            <th>Název filmu</th>
                            <th>Žánr filmu</th>
                            <th>Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>
                                    <div class="table-img-container">
                                        <img src="{{ asset('storage/'.$movie->image) }}" alt="Obal filmu">
                                    </div>

                                </td>
                                <td>
                                    {{ $movie->title }}
                                </td>
                                <td>
                                    <a class="search-genre" href="{{ route('genres.edit', $movie->genres->id )}}">
                                        {{ $movie->genres->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="link-button">Upravit</a>
                                    <form action="/admin/movies/{{ $movie->id }}" method="post" class="table-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">
                                            Smazat
                                        </button>
                                    </form>
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
@endsection
