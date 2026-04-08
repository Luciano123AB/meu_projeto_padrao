@extends("layouts.main_layout")

@section("content")
    <div class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form style="width: 1000px;" action="{{ route("mudar_senha_submit") }}" id="formulario" class="card border-black shadow" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="card-header d-flex align-items-center justify-content-center">
                <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="36" height="36" fill="currentColor" class="bi bi-person-gear me-1" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                </svg>

                <label class="fs-4 fw-bold">ATUALIZAR SENHA</label>
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
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @enderror

                    @if(session("senhaInvalida"))
                        <div class="alert alert-danger mx-3 mb-3" role="alert">
                            {{ session("senhaInvalida") }}
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Nova Senha:</label>

                        <input id="senha" class="form-control" type="password" name="nova_senha" placeholder="Ex: @ABde12" required value="{{ old("nova_senha") }}">
                        
                        <button id="mostrar_ocultar_senha" class="input-group-text focus-ring focus-ring-secondary" type="button" name="mostrar_ocultar_senha" onclick="mostrarOcultarSenha()"><i class="bi bi-eye"></i></button>
                    </div>

                    @error("nova_senha")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
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
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer d-grid gap-2">                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="salvar" class="btn btn-lg {{ session("tema") == "escuro" ? "btn-secondary" : "btn-info" }} fw-bold {{ session("tema") == "escuro" ? "text-white" : "text-primary" }} icon-link icon-link-hover focus-ring justify-content-center" type="submit" name="salvar">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z"/>
                        <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                    </svg>
                    SALVAR
                </button>
                                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="limpar" class="btn btn-lg {{ session("tema") == "escuro" ? "btn-dark" : "btn-secondary" }} fw-bold icon-link icon-link-hover focus-ring focus-ring-secondary justify-content-center" type="button" name="limpar" onclick="resetarCampos()">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">
                        <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                    </svg>
                    RESETAR
                </button>
            </div>

            <div class="card-footer {{ session("tema") == "escuro" ? "bg-black" : "bg-primary" }}"></div>
        </form>
    </div>

    <script>
        function resetarCampos() {
            document.getElementById("formulario").reset();
        }
    </script>
@endsection