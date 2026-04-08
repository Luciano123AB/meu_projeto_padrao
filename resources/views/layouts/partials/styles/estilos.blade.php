<style>
    body {
        background: url('{{ asset("assets/images/" . (session("tema") == "escuro" ? "fundo_escuro.png" : "fundo.png")) }}') center/cover no-repeat;
        margin: 0;
        padding: 0;
    }

    #logo_efeito {
        transition: transform .1s;
    }

    #logo_efeito:hover {
        -ms-transform: scale(1.1);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    #pagina_login {
        min-height: 660px;
        max-width: 660px
    }

    #imagem_direitos {
        width: 35px;
        height: 35px;
    }

    #sidebar {
        max-height: 50vh;
        border-radius: 0 20px 20px 0;
        transition: transform 0.3s ease;
        z-index: 1100;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    .opcoes {
        position: fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-color: rgba(0,0,0,0.5);
        display:none;
        z-index:1050;
    }

    .opcao_cyan:hover {
        transition: background-color 0.4s ease;
        background-color: #0dcaf0;
    }

    .opcao_gray:hover {
        transition: background-color 0.4s ease;
        background-color: #adb5bd;
    }

    .bg_gray {
        background-color: #adb5bd;
    }

    #cards_efeito {
        transition: transform .1s;
    }

    #cards_efeito:hover {
        -ms-transform: scale(1.04);
        -webkit-transform: scale(1.04);
        transform: scale(1.04);
    }

    .imagens_cards {
        max-height: 160px;
        object-fit: cover;
    }

    .usuarios_fotos {
        width: 160px;
        height: 160px;
        object-fit: cover;
    }

    .importar_exportar {
        min-height: 300px;
        max-height: 300px;
    }

    #tabela_logs {
        min-height: 750px;
        max-height: 750px;
    }

    #pesquisa {
        padding-top: 5px;
        padding-bottom: 5px
    }

    #pesquisa_tabela {
        min-height: 500px;
        max-height: 500px;
    }

    .dropdown-menu {
        position: absolute;
        z-index: 2000;
    }

    .bloqueado:hover {
        cursor: not-allowed;
    }
</style>