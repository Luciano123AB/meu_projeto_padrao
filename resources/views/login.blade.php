@extends("layouts.main_layout")

@section("content")
    <nav class="navbar bg-primary bg-gradient border-5 border-bottom border-black shadow mb-5">
        <div class="container-fluid">
            <div class="navbar-brand fs-3 fw-bold ms-5">
                <a href="{{ route("login") }}" class="link-offset-2 link-underline link-underline-opacity-0">
                    <svg class="me-1 text-dark" id="logo_efeito" xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="75" height="75" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/></svg>
                </a>

                Meu Projeto <span class="text-white">Padrão</span>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form style="width: 750px;" action="{{ route("loginSubmit") }}" id="formulario" class="card border-black shadow" method="post" novalidate>
            @csrf

            <div class="card-header d-flex align-items-center justify-content-center">
                <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="36" height="36" fill="currentColor" class="bi bi-door-open me-1" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/></svg>

                <label class="fs-4 fw-bold">LOGIN</label>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="fs-5">Usuário:</label>

                    <div class="input-group input-group-lg">
                        <span class="input-group-text"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="26" height="26" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg></span>
                        
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="..." value="{{ old("usuario") }}" required>                        
                    </div>

                    @error("usuario")
                        <div class="alert alert-danger mt-1" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(session("usuarioErro"))
                        <div class="alert alert-danger mt-1" role="alert">
                            {{ session("usuarioErro") }}
                        </div>
                    @endif
                </div>

                <div>
                    <label class="fs-5">Senha:</label>
                    
                    <div class="input-group input-group-lg">
                        <span class="input-group-text"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="26" height="26" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16"><path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/><path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/></svg></span>

                        <input id="senha" class="form-control" type="password" name="senha" placeholder="..." value="{{ old("senha") }}" required>

                        <button id="mostrar_ocultar_senha" class="input-group-text focus-ring focus-ring-secondary" type="button" name="mostrar_ocultar_senha" onclick="mostrarOcultarSenha()">Mostrar</button>                        
                    </div>

                    @error("senha")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(session("senhaErro"))
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ session("senhaErro") }}
                        </div>
                    @endif
                </div>                
            </div>

            <div class="card-footer d-grid gap-2">
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="logar" class="btn btn-lg btn-info fw-bold text-primary icon-link icon-link-hover focus-ring justify-content-center" type="submit" name="logar"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/><path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/></svg>LOGAR</button>
                                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="limpar" class="btn btn-lg btn-secondary fw-bold icon-link icon-link-hover focus-ring focus-ring-secondary justify-content-center" type="button" name="limpar" onclick="limparCampos()"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16"><path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/><path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/></svg>LIMPAR</button>
            </div>

            <div class="card-footer bg-primary"></div>
        </form>        
    </div>    
@endsection