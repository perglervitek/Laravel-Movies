@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-item">
                <a class="link-button" href="{{ route('users.index')}}">Spravovat uživatele</a>
            </div>
            <div class="box-item">
                <a class="link-button" href="{{route('movies.index')}}">Spravovat filmy</a>
            </div>
        </div>
        <div class="table-container">
            
            <header class="section-header text-center">
                <p>Žánry</p>
                
                <a href="{{ route('genres.create')}}" class="link-button">Vytvořit žánr</a>
            </header>
            <table>
                <thead>
                    <tr>
                        <th>Název žánru</th>
                        <th>Počet filmů</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <td>
                                {{$genre->name}}
                            </td>
                            <td>
                                {{ $genre->movies->count()}}
                            </td>
                            <td>
                                <a href="{{ route('genres.edit', $genre->id) }}" class="link-button">Upravit</a>
                                <form action="genres/{{$genre->id}}" method="post" class="table-form">
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
                {{ $genres->links()}}
            </div>
        </div>
    </div>
@endsection