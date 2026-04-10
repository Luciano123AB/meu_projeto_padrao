<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env("APP_NAME") }}</title>
    <link rel="icon" href="{{ asset("favicon.ico") }}">

    @include("layouts.partials.links")
    
    @include("layouts.partials.styles.estilos")
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body style="background-position: center center;" class="fst-italic d-flex flex-column min-vh-100">
    @include("layouts.partials.alertas")

    @include("layouts.navbar")

    @include("layouts.subnavbar")
    
    <div class="mb-5">
        @yield("content")
    </div>

    @include("layouts.footer")
    
    @include("layouts.partials.scripts.scripts")
</body>
</html>
