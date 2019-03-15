<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <title>TMS test</title>
    </head>
    <body>
        <div class="container">
            <div id="app">
            </div>
        </div>
        <script type="text/javascript" src="{{ URL::asset('vuejs/build.js') }}"></script>
    </body>
</html>
