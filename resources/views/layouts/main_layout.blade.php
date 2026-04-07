<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Projeto Padrão</title>
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
    
    @yield("content")

    <footer class="text-center mx-1 mt-auto mb-3">
        <br>
        <img style="width: 35px; height: 35px;" class="border border-black shadow rounded me-1" src="{{ asset("assets/images/foto_proprietario.png") }}">

        <label class="text-white align-middle fs-5">© 2025 - {{ date("Y") }} {{ env("APP_NAME") }} / Todos os direitos reservados: Luciano Eduardo Stefanello da Silva</label>
    </footer>
    
    @include("layouts.partials.scripts.scripts")
</body>
</html>
