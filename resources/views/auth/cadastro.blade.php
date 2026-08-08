@extends("layouts.main_layout")

@section("content")
    <div class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form action="{{ route("cadastroSubmit") }}" id="formulario" class="card border-black shadow w-100 w-md-75 w-lg-50" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="card-header d-flex gap-1 align-items-center justify-content-center fs-5">
                <i class="bi bi-person-plus fs-3"></i>                
                <label class="fw-bold">CADASTRO</label>
            </div>

            <div class="card-body row row-cols-1 row-cols-md-2 g-3">
                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">Nome Completo:</label>
                        <input id="nome" class="form-control" type="text" name="nome" placeholder="..." required value="{{ old("nome") }}">
                    </div>
                    @error("nome")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">Usuario:</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Ex: Usuário123ABC" required value="{{ old("usuario") }}">
                    </div>
                    @error("usuario")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">Email:</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="usuario@gmail.com" required value="{{ old("email") }}">
                    </div>
                    @error("email")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">CPF:</label>
                        <input id="cpf" class="form-control" type="text" name="cpf" placeholder="000.000.000-00" required value="{{ old("cpf") }}">
                    </div>
                    @error("cpf")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                    @if(session("cpfErro"))
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ session("cpfErro") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                </div>

                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">Senha:</label>
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

                <div class="col">
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
                    @if(session("senhaErro"))
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ session("senhaErro") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                </div>                

                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">Data de Nascimento:</label>
                        <input id="data" class="form-control" type="text" name="data" placeholder="DIA/MÊS/ANO" required value="{{ old("data") }}">
                    </div>
                    @error("data")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="input-group">
                        <label class="input-group-text">Celular:</label>
                        <input id="celular" class="form-control" type="text" name="celular" placeholder="(99)99999-9999" required value="{{ old("celular") }}">
                    </div>
                    @error("celular")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="input-group">
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
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                </div>

                <div class="col text-center">
                    <img id="img_preview" alt="Image Preview" class="img-fluid rounded mb-2" src="{{ asset('assets/fotos/vazio.png') }}">

                    <label class="d-block small">Apenas fotos em ".png" são permitidos.</label>
                    <div class="input-group mt-2">
                        <label class="input-group-text">Foto (Opcional):</label>
                        
                        <input id="img_input" class="form-control" type="file" name="foto" accept="image/png">
                    </div>
                    @error("foto")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @enderror
                    @if(session("fotoTamanho"))
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ session("fotoTamanho") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                    @if(session("fotoErro"))
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ session("fotoErro") }}
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                    @endif
                </div>
            </div>
            @if(session("usuarioExiste"))
                <div class="alert alert-danger mx-3 mb-3" role="alert">
                    {{ session("usuarioExiste") }}
                    <i class="bi bi-info-circle-fill"></i>
                </div>
            @endif

            <div class="card-footer d-grid gap-2">                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" type="submit" id="cadastrar" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} fw-bold {{ Cache::get('tema') === 'escuro' ? "text-white" : "text-primary" }} icon-link icon-link-hover focus-ring justify-content-center" name="cadastrar">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z"/>
                        <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                    </svg>
                    REGISTRAR
                </button>
                                
                <button type="button" id="limpar" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-dark" : "btn-secondary" }} fw-bold icon-link icon-link-hover focus-ring focus-ring-secondary justify-content-center" name="limpar" onclick="limparCampos()">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">
                        <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                    </svg>
                    LIMPAR
                </button>
            </div>

            <div class="card-footer {{ Cache::get('tema') === 'escuro' ? "bg-black" : "bg-primary" }}"></div>
        </form>
    </div>
@endsection