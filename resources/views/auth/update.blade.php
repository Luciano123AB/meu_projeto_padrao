@extends("layouts.main_layout")

@section("content")
    <div class="container d-flex justify-content-center align-items-center text-center mb-5">
        <form style="width: 1000px;" action="{{ route("updateSubmit") }}" id="formulario" class="card border-black shadow" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="card-header d-flex gap-1 align-items-center justify-content-center fs-5">
                <i class="bi bi-person-gear fs-3"></i>
                <label class="fw-bold">ATUALIZAR</label>
            </div>

            <div class="card-body">
                <input id="id" type="hidden" name="id" value="{{ Crypt::encrypt($usuario->id) }}">

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Novo Nome Completo:</label>
                        <input id="nome" class="form-control" type="text" name="nome" placeholder="..." required value="{{ old("nome", $usuario->nome_completo) }}">
                    </div>
                    @error("nome")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Novo Usuario:</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Ex: Usuário123ABC" required value="{{ old("usuario", $usuario->usuario) }}">
                    </div>
                    @error("usuario")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Novo Email:</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="usuario@gmail.com" required value="{{ old("email", $usuario->email) }}">
                    </div>
                    @error("email")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text">Novo Celular:</label>                        
                        <input id="celular" class="form-control" type="text" name="celular" placeholder="(99)99999-9999" required value="{{ old("celular", $usuario->celular) }}">
                    </div>
                    @error("celular")
                        <div class="alert alert-danger mt-1 mb-0" role="alert">
                            {{ $message }}
                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="mb-3">
                        <img id="img_preview" class="rounded" alt="Image Preview" src="{{ asset("assets/fotos/" . $usuario->foto) }}">
                    </div>

                    <label>Apenas fotos em ".png" são permitidos.</label>
                </div>

                <div class="input-group">
                    <label class="input-group-text">Nova Foto (Opcional):</label>
                    <input id="img_input" class="form-control" type="file" name="foto" accept="image/png" aria-describedby="addon-wrapping">
                </div>                
                @error("foto")
                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                        {{ $message }}
                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                    </div>
                @enderror
                @if(session("fotoTamanho"))
                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                        {{ session("fotoTamanho") }}
                        Escolha outra.
                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                    </div>
                @endif
                @if(session("fotoErro"))
                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                        {{ session("fotoErro") }}
                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                    </div>
                @endif
            </div>

            <div class="card-footer d-grid gap-2">                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="salvar" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-secondary" : "btn-info" }} fw-bold {{ Cache::get('tema') === 'escuro' ? "text-white" : "text-primary" }} icon-link icon-link-hover focus-ring justify-content-center" type="submit" name="salvar">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                        <path d="M11 2H9v3h2z"/><path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                    </svg>
                    SALVAR
                </button>
                                
                <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="limpar" class="btn btn-lg {{ Cache::get('tema') === 'escuro' ? "btn-dark" : "btn-secondary" }} fw-bold icon-link icon-link-hover focus-ring focus-ring-secondary justify-content-center" type="button" name="limpar" onclick="limparCampos()">
                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">
                        <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0"/>
                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                    </svg>
                    RESETAR
                </button>
            </div>

            <div class="card-footer {{ Cache::get('tema') === 'escuro' ? "bg-black" : "bg-primary" }}"></div>
        </form>
    </div>
@endsection