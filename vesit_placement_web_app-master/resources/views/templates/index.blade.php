<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        @section('styles')
            <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
        @show
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        @yield('main')

        @section('scripts')
            <script src="{{ URL::to('js/app.js') }}"></script>
        @show
    </body>
</html>
