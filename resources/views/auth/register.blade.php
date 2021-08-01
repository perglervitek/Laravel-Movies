@extends('layouts.app')

@section('content')

<div class="register-container">
    <!-- Blade for displaying register form -->
    <header class="section-header text-center">
        <p>Registrace</p>
    </header>
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
    <form action="{{ route('register')}}" method="post" id="register-form">
        @csrf
        <div class="input-group">
            <label for="name">* Jméno</label>
            <input type="text" name="name" id="name" pattern="^[A-Za-z -]+$" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group">
            <label for="email">* Email</label>
            <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
            <span class="hide-text" id="varovani">Zadaný email je již zaregistrovaný.</span>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group">
            <label for="password">* Heslo</label>
            <input id="password" onkeyup='passwordCheck();' type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group">
            <label for="password-confirm">* Potvrzení hesla</label>
            <input id="password-confirm" onkeyup='passwordCheck();' type="password" minlength="8" class="@error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            <span class="hide-text" id="password-warning">
                Hesla se musí být shodná.
            </span>
        </div>
        <div class="input-group">
            <button type="submit" class="register-btn">
                Registrovat
            </button>
        </div>
    </form>
</div>
@push('scripts')
<script src="{{ asset('js/components/register.js') }}"></script>
@endpush
@endsection