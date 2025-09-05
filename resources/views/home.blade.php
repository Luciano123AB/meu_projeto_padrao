@extends("layouts.main_layout")

@section("content")
    <nav class="navbar bg-primary bg-gradient border-5 border-bottom border-black shadow mb-5">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <button class="btn btn-info d-md-none me-2" type="button" id="sidebarToggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z"/>
                    </svg>
                </button>

                <div class="navbar-brand fs-5 fs-md-3 fw-bold ms-2 ms-md-5 text-center text-md-start">
                    <a href="{{ route("home") }}" class="link-offset-2 link-underline link-underline-opacity-0">
                        <svg class="me-1 text-dark" id="logo_efeito" xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="50" height="50" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/></svg>
                    </a>

                    Meu Projeto <span class="text-white">Padrão</span>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center me-5">
                <button id="usuario" class="btn btn-info dropdown-toggle border focus-ring focus-ring-light" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <img style="width: 40px; height: 40px;" class="rounded-pill border border-black me-2" src="data:image/png;base64,{{ session('usuario.foto') }}">
                    
                    {{ session('usuario.usuario') }}
                </button>
                
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    @if(session("usuario.usuario") != "Administrador")
                        <li><a href="{{ route('update', ['id' => Crypt::encrypt(session('usuario.id'))]) }}" class="dropdown-item border-secondary-subtle border-top">Editar</a></li>
                    @endif
                    
                    <li><a href="{{ route('logout') }}" class="dropdown-item border-top border-bottom">Sair</a></li>
                    
                    @if(session("usuario.usuario") != "Administrador")
                        <li><a href="{{ route('deletar', ['id' => Crypt::encrypt(session('usuario.id'))]) }}" class="dropdown-item border-secondary-subtle border-bottom">Excluir Conta</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-nowrap">
            <ul id="sidebar" class="col-12 col-md-2 bg-white border border-md-end border-black overflow-auto py-2" style="max-height: calc(100vh - 70px); transition: transform 0.3s ease; z-index: 1100;">
                <h6 class="fw-bold border-bottom border-black py-1">OPÇÕES:</h6>
                    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                        
                        <a href="{{ route('tabela') }}" class="link-secondary text-decoration-none">Tabela de Usuários</a>
                    </li>
                    <br>
                    
                    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                        
                        <a href="{{ route('cards') }}" class="link-secondary text-decoration-none">Cards de Usuários</a>
                    </li>
                    <br>
                    
                    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                        
                        <a href="{{ route('dashboard') }}" class="link-secondary text-decoration-none">Dashboard</a>
                    </li>
                    <br>
                    
                    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                        
                        <a href="{{ route('pesquisa') }}" class="link-secondary text-decoration-none">Pesquisa de Usuários</a>
                    </li>
                    <br>
                    
                    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                        
                        <a href="{{ route('logs', ['id' => Crypt::encrypt(session('usuario.id'))]) }}" class="link-secondary text-decoration-none">Logs</a>
                    </li>
                    <br>
                    
                    <li id="opcoes" class="rounded-end icon-link icon-link-hover p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                        
                        <a href="{{ route('importarExportar') }}" class="link-secondary text-decoration-none">Importar / Exportar</a>
                    </li>
                </ul>

                <div id="overlay" style="position: fixed; top:0; left:0; width:100%; height:100%; background-color: rgba(0,0,0,0.5); display:none; z-index:1050;"></div>

                <div class="col-12 col-md-10 py-3">
                
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-12 col-md-6 text-center mb-4 mb-md-0">
                        <h1 class="fs-3 fs-md-4 fs-lg-5">Seja BEM VINDO ao Nosso Site!</h1>
                    </div>

                    <div class="col-12 col-md-6 text-center">
                        <h2 class="fs-4 fs-md-3 mb-3 fw-bold">Sobre:</h2>
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, odit quam mollitia architecto dolore minus dolorum incidunt eum reiciendis delectus eius molestiae repellat suscipit id laudantium, nostrum perferendis est quia.</p>
                        
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi beatae odio labore, corporis in debitis? Tempore tempora necessitatibus, libero, dolorum maiores autem molestias officia natus sunt ab, facilis suscipit accusantium.</p>
                        
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus sint quae delectus molestias deleniti, dignissimos qui quam voluptatem laborum sit, recusandae ab fugit mollitia porro. Vitae unde ad magni aspernatur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        const openSidebar = () => {

            sidebar.style.transform = 'translateX(0)';
            overlay.style.display = 'block';

        };

        const closeSidebar = () => {

            sidebar.style.transform = 'translateX(-100%)';
            overlay.style.display = 'none';

        };

        toggleBtn.addEventListener('click', () => {
            if(sidebar.style.transform === 'translateX(0)'){
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        overlay.addEventListener('click', closeSidebar);

        window.addEventListener('load', () => {
            if(window.innerWidth < 768){

                sidebar.style.transform = 'translateX(-100%)';
                sidebar.style.position = 'absolute';
                sidebar.style.zIndex = '1100';

            }
        });

        window.addEventListener('resize', () => {
            if(window.innerWidth >= 768){

                sidebar.style.transform = 'translateX(0)';
                sidebar.style.position = 'relative';
                overlay.style.display = 'none';

            } else {

                sidebar.style.transform = 'translateX(-100%)';
                sidebar.style.position = 'absolute';

            }
        });
    </script>
@endsection
