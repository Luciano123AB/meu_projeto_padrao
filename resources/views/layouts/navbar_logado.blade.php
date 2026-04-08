<nav class="navbar {{ session("tema") == "escuro" ? "bg-dark" : "bg-primary" }} bg-gradient border-5 border-bottom border-black shadow mb-1">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn {{ session("tema") == "escuro" ? "btn-secondary" : "btn-info" }} border d-md-none me-2" type="button" id="sidebarToggle" aria-controls="sidebar" aria-expanded="false" aria-label="Abrir menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z"/>
                </svg>
            </button>

            <div class="navbar-brand fs-5 fs-lg-3 fw-bold ms-2 ms-md-5 text-center text-md-start">
                <a href="{{ route("home") }}" class="link-offset-2 link-underline link-underline-opacity-0 text-black">
                    <svg class="me-1 {{ session("tema") == "escuro" ? "text-white" : "text-dark" }}" id="logo_efeito" xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="50" height="50" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    
                    Meu Projeto <span class="text-white">Padrão</span>
                </a>
            </div>
        </div>

        <div class="btn-group d-flex flex-row align-items-start align-items-md-center me-5 mb-1">
            <button type="button" class="btn {{ session('tema') == 'escuro' ? 'btn-secondary' : 'btn-info' }} border focus-ring focus-ring-light">
                <img class="rounded-pill border border-black me-2" width="40" height="40" src="data:image/png;base64,{{ Auth::user()->foto }}">
                
                {{ Auth::user()->usuario }}
            </button>

            <button style="height: 54px" type="button" class="btn {{ session('tema') == 'escuro' ? 'btn-secondary' : 'btn-info' }} dropdown-toggle dropdown-toggle-split border focus-ring focus-ring-light"
                data-bs-toggle="dropdown" aria-expanded="false">
                
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                @if(Auth::user()->usuario != "Administrador")
                    <li>
                        <a href="{{ route('update', ['id' => Crypt::encrypt(Auth::user()->id)]) }}" class="dropdown-item border-secondary-subtle border-top">
                            Editar
                        </a>
                    </li>
                @endif

                @if(Auth::user()->usuario != "Administrador")
                    <li>
                        <a href="{{ route('mudar_senha', ['id' => Crypt::encrypt(Auth::user()->id)]) }}" class="dropdown-item border-secondary-subtle border-top">
                            Redefinir Senha
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item border-top border-bottom">Sair</a>
                </li>

                @if(Auth::user()->usuario != "Administrador")
                    <li>
                        <a href="{{ route('deletar', ['id' => Crypt::encrypt(Auth::user()->id)]) }}" class="dropdown-item border-secondary-subtle border-bottom">
                            Excluir Conta
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>