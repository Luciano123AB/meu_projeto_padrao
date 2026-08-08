<nav class="navbar {{ Cache::get('tema') === 'escuro' ? "bg-dark" : "bg-primary" }} bg-gradient border-5 border-bottom border-black shadow mb-1">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} border d-md-none me-2" type="button" id="sidebarToggle" aria-controls="sidebar" aria-expanded="false" aria-label="Abrir menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z"/>
                </svg>
            </button>

            <div class="navbar-brand fs-5 fs-lg-3 fw-bold ms-2 ms-md-5 text-center text-md-start">
                <a href="{{ route("home") }}" class="link-offset-2 link-underline link-underline-opacity-0 d-flex gap-1 flex-wrap align-items-center text-black">
                    <svg class="{{ Cache::get('tema') === 'escuro' ? "text-white" : "text-dark" }} me-1" id="logo_efeito" xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="50" height="50" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    {{ config("app.name") }}:
                    <span class="text-white ms-auto">{{ mb_strtoupper($pagina) }}</span>
                </a>
            </div>
        </div>

        @if ($pagina === "Login")
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center me-5">
                <a href="{{ route("cadastro") }}" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} border icon-link icon-link-hover focus-ring focus-ring-light my-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-right me-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708z"/>
                    </svg>
                    Cadastrar Usuário
                </a>
            </div>
        @elseif($pagina === "Cadastro")
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center me-5">
                <a href="{{ route("login") }}" style="--bs-icon-link-transform: translate3d(-.250rem, 0, 0);" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} border icon-link icon-link-hover focus-ring focus-ring-light my-1">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left me-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                    </svg>                    
                    Voltar ao Login
                </a>
            </div>
        @elseif($pagina === "Atualização" || $pagina === "Redefinir Senha")
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center me-5">
                <a href="{{ route("home") }}" style="--bs-icon-link-transform: translate3d(-.250rem, 0, 0);" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} border icon-link icon-link-hover focus-ring focus-ring-light my-1">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left me-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                    </svg>                    
                    Cancelar
                </a>
            </div>
        @endif

        @auth
            <div class="btn-group d-flex flex-row align-items-start align-items-md-center me-5 mb-1">
                <button type="button" class="btn {{ Cache::get('tema') === 'escuro' ? 'btn-secondary' : 'btn-info' }} border focus-ring focus-ring-light">
                    <img class="rounded-pill border border-black me-2" width="40" height="40" src="{{ asset('assets/fotos/' . auth()->user()->foto) }}">                    
                    {{ auth()->user()->usuario }}
                </button>

                <button style="height: 54px;" type="button" class="btn {{ Cache::get('tema') === 'escuro' ? 'btn-secondary' : 'btn-info' }} dropdown-toggle dropdown-toggle-split border focus-ring focus-ring-light" data-bs-toggle="dropdown" aria-expanded="false">                    
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow">
                    @if(auth()->user()->usuario != "Administrador")
                        <li>
                            <a href="{{ route('update', ['id' => Crypt::encrypt(auth()->user()->id)]) }}" class="dropdown-item border-secondary-subtle border-top">
                                Editar
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->usuario != "Administrador")
                        <li>
                            <a href="{{ route('mudar.senha', ['id' => Crypt::encrypt(auth()->user()->id)]) }}" class="dropdown-item border-secondary-subtle border-top">
                                Redefinir Senha
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item border-top border-bottom">Sair</a>
                    </li>

                    @if(auth()->user()->usuario != "Administrador")
                        <li>
                            <a href="{{ route('deletar', ['id' => Crypt::encrypt(auth()->user()->id)]) }}" class="dropdown-item border-secondary-subtle border-bottom">
                                Excluir Conta
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        @endauth
    </div>
</nav>