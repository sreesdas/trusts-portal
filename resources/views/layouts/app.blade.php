<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ONGC Trusts Portal">
    <meta name="keywords" content="Laravel,PHP,ONGC,Trust,Infocom">

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

</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row min-vh-100">
                @auth
                    @yield('sidebar')
                @endauth
                <main class="col bg-faded px-0">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <a class="navbar-brand" href="#">
                            @yield('heading', 'TRUSTS PORTAL')
                        </a>
                        @auth
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                        @endauth
                    </nav>
                    <div class="p-3">
                        @include('partials.alert')
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
