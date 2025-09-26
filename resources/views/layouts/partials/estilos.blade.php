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

    #sidebar {
        max-height: calc(100vh - 70px);
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    .opcao:hover {
        background-color: rgba(0,0,0,.05);
    }

    #cards_efeito {
        transition: transform .1s;
    }

    #cards_efeito:hover {
        -ms-transform: scale(1.04);
        -webkit-transform: scale(1.04);
        transform: scale(1.04);
    }

    .dropdown-menu {
        position: absolute;
        z-index: 2000;
    }
</style>