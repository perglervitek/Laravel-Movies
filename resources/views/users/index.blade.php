@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-item">
                <a class="link-button" href="{{ route('genres.index') }}">Spravovat žánry</a>
            </div>
            <div class="box-item">
                <a class="link-button" href="{{ route('movies.index') }}">Spravovat filmy</a>
            </div>
        </div>
        <div class="table-container">

            <header class="section-header text-center">
                <p>Uživatelé</p>
            </header>
            @if ($users->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Název uživatele</th>
                            <th>Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if (Auth::id() != $user->id)
                                        <form action="/admin/users/{{ $user->id }}" method="post" class="table-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">
                                                Smazat
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-btns">
                    {{ $users->links() }}
                </div>
            @else
                <h2 class="section-header text-center">Žádné filmy</h2>
            @endif
        </div>
    </div>
@endsection
