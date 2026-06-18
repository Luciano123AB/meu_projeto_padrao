@extends("layouts.main_layout")

@section("content")
    <div id="pagina_login" class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form action="{{ route("loginSubmit") }}" id="formulario" class="card border-black shadow w-100 w-md-75 w-lg-50" method="post" novalidate>
            @csrf

            <div class="card-header d-flex gap-1 align-items-center justify-content-center fs-5">
                <i class="bi bi-door-open fs-3"></i>                
                <label class="fw-bold">LOGIN</label>
            </div>

            <div class="card-body">
                <div class="mb-3 text-center text-md-start">
                    <label>Usuário:</label>                    
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>                        
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="..." value="{{ old("usuario") }}" required>
                    </div>
                    @error("usuario")
                        <div class="alert alert-danger text-center mt-1" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                    @if(session("usuarioErro"))
                        <div class="alert alert-danger text-center mt-1" role="alert">
                            {{ session("usuarioErro") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                </div>

                <div class="text-center text-md-start">
                    <label>Senha:</label>                    
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-key"></i>
                        </span>                        
                        <input id="senha" class="form-control" type="password" name="senha" placeholder="..." value="{{ old("senha") }}" required>                        
                        <button id="mostrar_ocultar_senha" class="input-group-text focus-ring focus-ring-secondary" type="button" onclick="mostrarOcultarSenha()">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error("senha")
                        <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                    @if(session("senhaErro"))
                        <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                            {{ session("senhaErro") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                </div>                
            </div>

            <div class="card-footer d-grid gap-2">
                <button type="submit" id="logar" class="btn {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} fw-bold {{ session('tema') == "escuro" ? "text-white" : "text-primary" }} icon-link icon-link-hover focus-ring justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right me-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg>                    
                    ENTRAR
                </button>

                <button type="button" id="limpar" class="btn {{ session('tema') == "escuro" ? "btn-dark" : "btn-secondary" }} fw-bold icon-link icon-link-hover focus-ring justify-content-center" onclick="limparCampos()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse me-1" viewBox="0 0 16 16">
                        <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                    </svg>                    
                    LIMPAR
                </button>
            </div>

            <div class="card-footer {{ session('tema') == "escuro" ? "bg-black" : "bg-primary" }}"></div>
        </form>        
    </div>    
@endsection