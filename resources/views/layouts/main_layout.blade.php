<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Projeto Padrão</title>
    <link href="{{ asset("https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css") }}" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
        *{
            padding: 0;
            margin: 0;
        }

        #logo_efeito{
            transition: transform .1s;
        }

        #logo_efeito:hover{
            -ms-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
    </style>
</head>
<body style="background-image: url('{{ asset("assets/images/fundo.png") }}'); background-size: cover; background-repeat: no-repeat; background-position: center center;" class="fst-italic">
    @yield("content");

    <div class="text-center mx-1 mt-5 mb-3">
        <img style="width: 35px; height: 35px;" class="border border-black shadow me-1" src="{{ asset("assets/images/foto_proprietario.png") }}">

        <label class="text-white align-middle fs-5">Todos os Direitos Reservados: Luciano Eduardo Stefanello da Silva - 2025</label>
    </div>
    
    <script>
        function mostrarOcultarSenha() {

            const senha = document.getElementById("senha");
            const botaoMostrarOcultar = document.getElementById("mostrar_ocultar_senha");

            if (senha.type === "password") {

                senha.type = "text";
                botaoMostrarOcultar.textContent = "Ocultar";

            } else {

                senha.type = "password";
                botaoMostrarOcultar.textContent = "Mostrar";
                
            }
        }

        function mostrarOcultarConfirmarSenha() {

            const confirmarSenha = document.getElementById("confirmar_senha");
            const botaoMostrarOcultar = document.getElementById("mostrar_ocultar_confirmar_senha");

            if (confirmarSenha.type === "password") {

                confirmarSenha.type = "text";
                botaoMostrarOcultar.textContent = "Ocultar";

            } else {

                confirmarSenha.type = "password";
                botaoMostrarOcultar.textContent = "Mostrar";
                
            }
        }

        function limparCampos() {
            document.getElementById("formulario").reset();
            document.getElementById("img_preview").src = "data:image/png;base64,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";
        }
    </script>
</body>
</html>