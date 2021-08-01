@extends('layouts.app')

@section('content')
<!-- Blade for displaying login form -->
<div class="register-container">
    <header class="section-header text-center">
        <p>Přihlášení</p>
    </header>
    <form method="post" action="{{ route('login')}}">
        @csrf
        <div class="input-group">
            <label for="email">* Email</label>
            <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" pattern="^(?![\.\-_])((?![\-\._][\-\._])[a-z0-9\-\._]){0,63}[a-z0-9]@(?![\-])((?!--)[a-z0-9\-]){0,63}[a-z0-9]\.(|((?![\-])((?!--)[a-z0-9\-]){0,63}[a-z0-9]\.))(|([a-z]{2,14}\.))[a-z]{2,14}$" autofocus>
            @error('email')
            <div class="mt-5">
                <span>{{ $message }}</span>
            </div>
            
            @enderror
        </div>
        <div class="input-group">
            <label for="password">* Heslo</label>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" pattern=".{8,}">
            @error('password')
            <div class="mt-5">
                <span>{{ $message }}</span>
            </div>
            @enderror
        </div>
        <div class="input-group">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Zapamatovat si mě</label>
        </div>
        <div class="input-group">
            <button type="submit" class="register-btn">
                Přihlásit
            </button>
        </div>
    </form>
</div>
@push('scripts')
<script src="{{ asset('js/components/login.js') }}"></script>
@endpush
@endsection