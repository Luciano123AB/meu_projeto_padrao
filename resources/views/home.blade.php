@extends("layouts.main_layout")

@section("content")
    <nav class="navbar bg-primary bg-gradient border-5 border-bottom border-black shadow">
        <div class="container-fluid">
            <div class="navbar-brand fs-3 fw-bold ms-5">
                <a href="{{ route("home") }}" class="link-offset-2 link-underline link-underline-opacity-0">
                    <svg class="me-1 text-dark" id="logo_efeito" xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="75" height="75" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/></svg>
                </a>

                Meu Projeto <span class="text-white">Padrão</span>
            </div>

            <div class="btn-group my-1 me-5">
                <button id="usuario" class="btn btn-info dropdown-toggle border focus-ring focus-ring-light" type="button" name="usuario" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><img style="width: 45px; height: 45px;" class="rounded-pill border border-black me-2" src="data:image/png;base64,{{ session("usuario.foto") }}">{{ session("usuario.usuario") }}</button>
                        
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    @if(session("usuario.usuario") != "Administrador")
                        <li><a href="{{ route("update", ["id" => Crypt::encrypt(session("usuario.id"))]) }}" id="editar" class="dropdown-item border-secondary-subtle border-top">Editar</a></li>
                    @endif

                    <li><a href="{{ route("logout") }}" id="sair" class="dropdown-item border-top border-bottom">Sair</a></li>
                    
                    @if(session("usuario.usuario") != "Administrador")
                        <li><a href="{{ route("deletar", ["id" => Crypt::encrypt(session("usuario.id"))]) }}" id="excluir" class="dropdown-item border-secondary-subtle border-bottom">Excluir Conta</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
            
    <div style="margin-left: 12px; margin-right: 12px;">
        <div class="row vh-100">
            <ul style="height: 500px;" class="col-2 bg-white border-bottom border-end border-black overflow-scroll">
                <h6 class="fw-bold border-bottom border-black my-2">OPÇÕES:</h6>
                <li style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="opcoes" class="rounded-end icon-link icon-link-hover p-1"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg><a href="{{ route("tabela") }}" id="opcao01" class="link-secondary link-offset-2 link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Tabela de Usuários</a></li>
                <li style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="opcoes" class="rounded-end icon-link icon-link-hover p-1"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg><a href="{{ route("cards") }}" id="opcao02" class="link-secondary link-offset-2 link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Cards de Usuários</a></li>
                <br>
                <li style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="opcoes" class="rounded-end icon-link icon-link-hover p-1"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg><a href="{{ route("dashboard") }}" id="opcao03" class="link-secondary link-offset-2 link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Dashboard</a></li>
                <li style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="opcoes" class="rounded-end icon-link icon-link-hover p-1"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg><a href="{{ route("pesquisa") }}" id="opcao03" class="link-secondary link-offset-2 link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Pesquisa de Usuários</a></li>
            </ul>

            <div class="col-10 d-flex">
                <div class="row text-center align-items-center">
                    <label class="col-6 fs-1">Seja BEM VINDO ao Nosso Site!</label>

                    <div class="col-6">
                        <label class="fs-2 fw-bold mb-5">Sobre:</label>
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, odit quam mollitia architecto dolore minus dolorum incidunt eum reiciendis delectus eius molestiae repellat suscipit id laudantium, nostrum perferendis est quia.</p>
                        
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi beatae odio labore, corporis in debitis? Tempore tempora necessitatibus, libero, dolorum maiores autem molestias officia natus sunt ab, facilis suscipit accusantium.</p>
                            
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus sint quae delectus molestias deleniti, dignissimos qui quam voluptatem laborum sit, recusandae ab fugit mollitia porro. Vitae unde ad magni aspernatur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection