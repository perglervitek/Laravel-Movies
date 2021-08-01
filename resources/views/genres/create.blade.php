@extends('layouts.app')

@section('content')
    <!-- Blade for creating a new genre -->
    <div class="register-container">
        <h2 class="text-center form-title">
            {{ isset($genre) ? 'Upravit žánr' : 'Vytvořit žánr' }}
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
        <form action="{{ isset($genre) ? route('genres.update', $genre->id) : route('genres.store') }}" method="post">
            @csrf
            @if (isset($genre))
                @method('PUT')
            @endif
            <div class="input-group">
                <label for="name">* Název žánru</label>
                <input type="text" name="name" id="name" value="{{ isset($genre) ? $genre->name : old('name') }}" required>
            </div>
            <div class="input-group">
                <button type="submit" class="register-btn">{{ isset($genre) ? 'Upravit' : 'Vytvořit' }}</button>
            </div>

        </form>
    </div>
    @push('scripts')
        <script src="{{ asset('js/components/createGenre.js') }}"></script>
    @endpush
@endsection
