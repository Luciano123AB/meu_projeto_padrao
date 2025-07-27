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

            <div class="me-5">
                <a href="{{ route("login") }}" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="voltar" class="btn btn-lg btn-info border icon-link icon-link-hover focus-ring focus-ring-light" type="button"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/></svg>Voltar ao Login</a>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form style="width: 1000px;" action="{{ route("cadastroSubmit") }}" id="formulario" class="card border-black shadow" method="post" novalidate>
            @csrf

            <div class="card-header d-flex align-items-center justify-content-center">
                <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="36" height="36" fill="currentColor" class="bi bi-person-plus me-1" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/></svg>

                <label class="fs-4 fw-bold">CADASTRO</label>
            </div>

            <div class="card-body row row-cols-2">
                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Nome Completo:</label>

                        <input id="nome" class="form-control" type="text" name="nome" placeholder="..." required value="{{ old("nome") }}">
                    </div>

                    @error("nome")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Usuario:</label>

                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Ex: Usuário123ABC" required value="{{ old("usuario") }}">
                    </div>

                    @error("usuario")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Email:</label>

                        <input id="email" class="form-control" type="text" name="email" placeholder="usuario@gmail.com" required value="{{ old("email") }}">
                    </div>

                    @error("email")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">CPF:</label>

                        <input id="cpf" class="form-control" type="text" name="cpf" placeholder="000.000.000-00" required value="{{ old("cpf") }}">
                    </div>

                    @error("cpf")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Senha:</label>

                        <input id="senha" class="form-control" type="password" name="senha" placeholder="Ex: @ABde12" required value="{{ old("senha") }}">

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

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Confirmar Senha:</label>

                        <input id="confirmar_senha" class="form-control" type="password" name="confirmar_senha" placeholder="..." required value="{{ old("confirmar_senha") }}">

                        <button id="mostrar_ocultar_confirmar_senha" class="input-group-text focus-ring focus-ring-secondary" type="button" name="mostrar_ocultar_confirmar_senha" onclick="mostrarOcultarConfirmarSenha()">Mostrar</button>
                    </div>

                    @error("confirmar_senha")
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

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Data de Nascimento:</label>

                        <input id="data" class="form-control" type="text" name="data" placeholder="DIA/MÊS/ANO" required value="{{ old("data") }}">
                    </div>

                    @error("data")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Celular:</label>

                        <input id="celular" class="form-control" type="text" name="celular" placeholder="(99)99999-9999" required value="{{ old("celular") }}">
                    </div>

                    @error("celular")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col mb-3">
                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Gênero:</label>

                        <select id="genero" class="form-select" name="genero" required>
                            <option value="" selected disabled>Selecione...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>

                        @if(old("genero"))
                            <script>
                                document.getElementById("genero").value = "{{ old("genero") }}";
                            </script>
                        @endif
                    </div>

                    @error("genero")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="mb-3">
                        <img id="img_preview" alt="Image Preview" src="data:image/png;base64,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">
                    </div>

                    <label>Apenas fotos em ".png" são permitidos.</label>

                    <div class="input-group input-group-lg">
                        <label class="input-group-text">Foto (Opcional):</label>

                        <input id="img_input" class="form-control" type="file" name="foto" accept="image/png" aria-describedby="addon-wrapping">
                    </div>

                    @error("foto")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>            

            <div class="card-footer d-grid gap-2">                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="cadastrar" class="btn btn-lg btn-info fw-bold text-primary icon-link icon-link-hover focus-ring justify-content-center" type="submit" name="cadastrar"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16"><path d="M11 2H9v3h2z"/><path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/></svg>CADASTRAR</button>
                                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="limpar" class="btn btn-lg btn-secondary fw-bold icon-link icon-link-hover focus-ring focus-ring-secondary justify-content-center" type="button" name="limpar" onclick="limparCampos()"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16"><path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/><path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/></svg>LIMPAR</button>
            </div>

            <div class="card-footer bg-primary"></div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#cpf").mask("000.000.000-00");
            $("#celular").mask("(00)00000-0000");
            $("#data").mask("00/00/0000");
        });
    </script>
@endsection