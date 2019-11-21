<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welfare Trusts Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Material+Icons" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .card {
            width: 90%;
        }

        .side-bg {
            background:url('/images/providentfund.jpg');
            background-position: center;
            background-size: cover;
        }

        body {
            background: url('/images/people.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .h-ecpec {
            font-family: 'Nunito', sans-serif;
            font-size: 36px;
            font-weight: 900;
            text-shadow: -4px 3px 3px #ddd;
            margin-bottom: 30px;
            color: #588fd1;
            margin-left: -10px;
        }

        .card-container {
            margin-top: 5rem;
        }

        @media(min-height: 768px){
            .card-container {
                margin-top: 10rem;
            }
        }

        @media(min-height: 1024px){
            .card-container {
                margin-top: 15rem;
            }
        }
        

    </style>
</head>
<body>
<div id="app">
    <div class="d-flex" id="wrapper">

        <div id="page-content-wrapper">
    
            <div class="container-fluid mt-4">
                @yield('content')

            </div>
        </div>
    
    </div>
</div>
</body>
</html>
