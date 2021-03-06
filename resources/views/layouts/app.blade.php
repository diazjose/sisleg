<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}" />


        <title>DGPJ</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
        <script src="{{asset('tables/jquery.dataTables.min.js')}}" defer></script>
        <script src="{{asset('tables/dataTables.bootstrap4.min.js')}}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Ubuntu&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@700&display=swap" rel="stylesheet">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css">
        
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('tables/bootstrap.css') }}" rel="stylesheet" type="text/css">
        -->

        <link href="{{ asset('tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        
        <div id="app">
            @include('includes.menu')     
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        @yield('script')
    </body>
</html>
