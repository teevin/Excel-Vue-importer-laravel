<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Excel Importer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <form action="/import" method="post" enctype="multipart/form-data">
                 @csrf
                <input type="file" name="file" id="file" ref="file" class="form-control">
                <br>
                <button class="btn btn-success" >Import User Data</button>
            </form>
            <div id="app">
              @yield('content')
            </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <!-- <script src="js/app.js"></script> -->
    </body>
</html>
