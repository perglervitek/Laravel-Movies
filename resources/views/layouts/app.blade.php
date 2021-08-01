<!-- This blade is the main component of the application, provides display for all other blades. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Import light style if light theme cookie is set -->
    @if (Cookie::get('theme') == 'light')
        <link href="{{ asset('css/app_light.css') }}" rel="stylesheet">
    @endif
</head>

<body>

    <!-- Header of the application -->
    <div id="app">
        <header>
            <a href="{{ route('home') }}" class="logo">MOVIES</a>
            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">Odhlásit</button>
                </form>
            @endif
            <nav class="right">
                <a href="{{ route('movie.index') }}">Filmy</a>
                @guest
                    @if (Route::has('login'))
                        <a class="active" href="{{ route('login') }}">Přihlásit</a>
                    @endif
                    @if (Route::has('register'))

                        <a href="{{ route('register') }}">Registerovat</a>
                    @endif
                @else
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin_dashboard') }}">Administrace</a>
                    @endif
                    @if (Auth::user()->role == 'user')
                        <a href="{{ route('user_dashboard') }}">Můj účet</a>
                    @endif
                @endguest
            </nav>
        </header>

        <!-- Main content taken from other blades-->

        <main class="container">
            @if (session()->has('success'))
                <div class="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <nav class="footer-inner">
                <section class="footer-item">
                    <h3 class="footer-title">MOVIES</h3>
                </section>

                <section class="footer-item">


                    <h3 class="footer-section-title">Režim aplikace</h3>
                    <div class="skin-container">
                        @if (Cookie::get('theme') == 'light')
                            <a class="skin-btn" href="{{ url('theme/dark') }}">
                                Tmavý</a>
                        @else
                            <a class="skin-btn" href="{{ url('theme/light') }}">Světlý</a>
                        @endif
                    </div>
                </section>
            </nav>
        </footer>


    </div>
    <!-- Including JS scripts in the application -->
    @stack('scripts')
</body>



</html>
