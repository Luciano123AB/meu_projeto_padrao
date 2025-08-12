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
                        <li><a href="#" id="editar" class="dropdown-item border-secondary-subtle border-top">Editar</a></li>
                    @endif

                    <li><a href="{{ route("logout") }}" id="sair" class="dropdown-item border-top border-bottom">Sair</a></li>
                    
                    @if(session("usuario.usuario") != "Administrador")
                        <li><a href="#" id="excluir" class="dropdown-item border-secondary-subtle border-bottom">Excluir Conta</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
            
    <div style="margin-left: 12px; margin-right: 12px;">
        <div class="row vh-100">
            <ul style="height: 500px;" class="col-2 bg-white border-bottom border-end border-black overflow-scroll">
                <h6 class="fw-bold border-bottom border-black my-2">OPÇÕES:</h6>
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