@extends('layouts.app')

@section('content')
<div class="container">
    <!--Dashboard of the admin - holds only the navigation to other admin parts-->
    <div class="box">
        <div class="box-item">
            <a class="link-button" href="{{route('genres.index')}}">Spravovat žánry</a>
        </div>
        <div class="box-item">
            <a class="link-button" href="{{ route('users.index')}}">Spravovat uživatele</a>
        </div>
        <div class="box-item">
            <a class="link-button" href="{{route('movies.index')}}">Spravovat filmy</a>
        </div>
    </div>
</div>
@endsection
