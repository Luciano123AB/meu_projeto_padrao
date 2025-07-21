<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Projeto Padrão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

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

        function limparCampos() {
            document.getElementById("formulario").reset();
        }
    </script>
</body>
</html>