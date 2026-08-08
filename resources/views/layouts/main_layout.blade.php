<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name") }} - {{ $pagina }}</title>
    <link rel="icon" href="{{ asset("favicon.ico") }}">

    @include("layouts.partials.links")

    @php
        if (Cache::get('tema') === 'escuro') {
            $imagem = "fundo_escuro.png";
        } else {
            $imagem = "fundo.png";
        }
    @endphp
    <style>
        body {
            background-image: url('{{ asset("assets/images/" . $imagem) }}');
        }
    </style>
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

    <script src="{{ asset("assets/js/main_scripts.js") }}"></script>
    <script>
        function limparCampos() {
            document.getElementById("formulario").reset();

            @if($pagina !== "Atualização")
                document.getElementById("img_preview").src = "{{ asset('assets/fotos/vazio.png') }}";
            @else
                document.getElementById("img_preview").src = "{{ asset('assets/fotos/' . $usuario->foto) }}";
            @endif
        }
    </script>
</body>
</html>
