<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Projeto Padrão</title>

    @include("layouts.partials.links")
    
    @include("layouts.partials.estilos")

    @include("layouts.partials.scripts")
</head>

<body style="background-position: center center;" class="fst-italic">
    @include("layouts.partials.alertas")
    
    @yield("content")

    <footer class="text-center mx-1 mt-5 mb-3">
        <br>
        <img style="width: 35px; height: 35px;" class="border border-black shadow me-1" src="{{ asset("assets/images/foto_proprietario.png") }}">

        <label class="text-white align-middle fs-5">Todos os Direitos Reservados: Luciano Eduardo Stefanello da Silva - 2025</label>
    </footer>
    
    @include("layouts.partials.funcoes")
</body>
</html>