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
                <aside class="col-12 col-md-2 p-0 bg-dark">
                    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2 px-0">
                        <div class="collapse navbar-collapse w-100">
                            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                                <li class="nav-item">
                                    <a class="nav-link pl-2 text-nowrap" href="/home">
                                        <i data-feather="home"></i> <span class="font-weight-bold ml-2">HOME</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-2 text-nowrap" href="/cpf/agenda">
                                        <i data-feather="list"></i> <span class="font-weight-bold ml-2">AGENDAS</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-2" href="/cpf/meeting/admin">
                                        <i data-feather="calendar"></i> <span class="d-none d-md-inline ml-2">MEETING</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-2" href="/user">
                                        <i data-feather="users"></i> <span class="d-none d-md-inline ml-2">USERS</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-2" href="#" onclick="$('#form-logout').submit()">
                                        <i data-feather="log-out"></i> <span class="d-none d-md-inline ml-2">LOGOUT</span>
                                    </a>
                                </li>
                                <form id="form-logout" action="/logout" method="post">
                                @csrf
                                </form>
                            </ul>
                        </div>
                    </nav>
                </aside>
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
