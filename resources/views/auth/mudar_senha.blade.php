@extends("layouts.main_layout")

@section("content")
    <div class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form style="width: 1000px;" action="{{ route("mudar_senha_submit") }}" id="formulario" class="card border-black shadow" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="card-header d-flex gap-1 align-items-center justify-content-center fs-5">
                <i class="bi bi-person-gear fs-3"></i>
                <label class="fw-bold">ATUALIZAR SENHA</label>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Senha Atual:</label>
                        <input id="senha_atual" class="form-control" type="password" name="senha_atual" placeholder="Ex: @ABde12" required value="{{ old("senha_atual") }}">                        
                        <button id="mostrar_ocultar_senha_atual" class="input-group-text focus-ring focus-ring-secondary" type="button" name="mostrar_ocultar_senha_atual" onclick="mostrarOcultarSenhaAtual()"><i class="bi bi-eye"></i></button>
                    </div>
                    @error("senha_atual")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                    @if(session("senhaInvalida"))
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ session("senhaInvalida") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Nova Senha:</label>
                        <input id="senha" class="form-control" type="password" name="senha" placeholder="Ex: @ABde12" required value="{{ old("senha") }}">
                        <button id="mostrar_ocultar_senha" class="input-group-text focus-ring focus-ring-secondary" type="button" name="mostrar_ocultar_senha" onclick="mostrarOcultarSenha()"><i class="bi bi-eye"></i></button>
                    </div>
                    @error("senha")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div>
                    <div class="input-group">
                        <label class="input-group-text">Confirmar Senha:</label>                        
                        <input id="confirmar_senha" class="form-control" type="password" name="confirmar_senha" placeholder="..." required value="{{ old("confirmar_senha") }}">                        
                        <button id="mostrar_ocultar_confirmar_senha" class="input-group-text focus-ring focus-ring-secondary" type="button" name="mostrar_ocultar_confirmar_senha" onclick="mostrarOcultarConfirmarSenha()"><i class="bi bi-eye"></i></button>
                    </div>
                    @error("confirmar_senha")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer d-grid gap-2">                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" type="submit" id="salvar" class="btn btn-lg {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} fw-bold {{ session('tema') == "escuro" ? "text-white" : "text-primary" }} icon-link icon-link-hover focus-ring justify-content-center" name="salvar">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z"/>
                        <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                    </svg>
                    SALVAR
                </button>
                                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" type="button" id="limpar" class="btn btn-lg {{ session('tema') == "escuro" ? "btn-dark" : "btn-secondary" }} fw-bold icon-link icon-link-hover focus-ring focus-ring-secondary justify-content-center" name="limpar" onclick="limparCampos()">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">
                        <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                    </svg>
                    RESETAR
                </button>
            </div>

            <div class="card-footer {{ session('tema') == "escuro" ? "bg-black" : "bg-primary" }}"></div>
        </form>
    </div>
@endsection