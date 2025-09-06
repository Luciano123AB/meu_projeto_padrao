@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-nowrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="card border-black shadow mx-3 mt-5 mb-3">
                    <div class="card-body row row-cols-2">
                        <div class="col">
                            <form class="mb-2" action="{{ route("pesquisaUsuario") }}" method="post">
                                @csrf

                                <div class="input-group">
                                    <label class="input-group-text">Digite um nome de usuário:</label>

                                    <input id="usuario" class="form-control" type="text" name="usuario" placeholder="...">

                                    <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="pesquisar" class="input-group-text icon-link icon-link-hover link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" type="submit" name="pesquisar"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>Pesquisar</button>
                                </div>

                                @error("usuario")
                                    <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                        {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                    </div>
                                @enderror
                            </form>

                            <form action="{{ route("pesquisaStatus") }}" method="post">
                                @csrf

                                <div class="input-group">
                                    <label class="input-group-text">Escolha um status:</label>
                                
                                    <div class="d-flex align-items-center border-top border-bottom px-2">
                                        <div class="form-check me-2">
                                            <input id="permissao01" class="form-check-input" type="radio" name="permissao" value="permitidos">
                                    
                                            <label class="form-check-label" for="permissao01">Permitidos</label>
                                        </div>
                                
                                        <div class="form-check">
                                            <input id="permissao02" class="form-check-input" type="radio" name="permissao" value="negados">
                                    
                                            <label class="form-check-label" for="permissao02">Negados</label>
                                        </div>
                                    </div>

                                    <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="pesquisar" class="input-group-text icon-link icon-link-hover link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" type="submit" name="pesquisar"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>Pesquisar</button>
                                </div>

                                @error("permissao")
                                    <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                        {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                    </div>
                                @enderror
                            </form>
                        </div>

                        <div class="col">
                            <form class="mb-2" action="{{ route("pesquisaDataNascimento") }}" method="post">
                                @csrf

                                <div class="input-group">
                                    <label class="input-group-text">Digite uma data de nascimento:</label>

                                    <input id="data" class="form-control" type="text" name="data" placeholder="DIA/MÊS/ANO">

                                    <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="pesquisar" class="input-group-text icon-link icon-link-hover link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" type="submit" name="pesquisar"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>Pesquisar</button>
                                </div>

                                @error("data")
                                    <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                        {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                    </div>
                                @enderror
                            </form>

                            <form action="{{ route("pesquisaDataInicialFinal") }}" method="post">
                                @csrf

                                <div class="input-group">
                                    <label class="input-group-text">Defina uma data "inicial" e uma "final":</label>

                                    <input id="data_inicial" class="form-control" type="text" name="data_inicial" placeholder="DIA/MÊS/ANO">

                                    <input id="data_final" class="form-control" type="text" name="data_final" placeholder="DIA/MÊS/ANO">

                                    <button style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" id="pesquisar" class="input-group-text icon-link icon-link-hover link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" type="submit" name="pesquisar"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>Pesquisar</button>
                                </div>

                                <div class="d-flex">
                                    @error("data_inicial")
                                        <div class="alert alert-danger w-50 text-center mt-1 mb-0 me-1" role="alert">
                                            {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                        </div>
                                    @enderror

                                    @error("data_final")
                                        <div class="alert alert-danger w-50 text-center mt-1 mb-0" role="alert">
                                            {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                        </div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div style="height: 500px;" class="rounded-2 bg-dark border mx-3 mb-5 shadow overflow-auto">       
                    <table class="table table-hover align-middle">
                        @if(session()->has("resultado"))
                            <thead class="text-center">
                                <tr class="row-cols-6">
                                    <th style="width: 1%;" class="col bg-body-secondary align-middle border-start border-top border-end border-black">N°</th>
                                    <th class="col bg-body-secondary align-middle border-end border-black">Nome</th>
                                    <th class="col bg-body-secondary align-middle border-end border-black">Usuario</th>
                                    <th class="col bg-body-secondary align-middle border-end border-black">Email</th>
                                    <th style="width: 4%;" class="col bg-body-secondary border-end border-black">Data Nasc.</th>
                                    <th style="width: 5%;" class="col bg-body-secondary align-middle border-end border-black">Celular</th>
                                    <th style="width: 1%;" class="col bg-body-secondary align-middle border-end border-black">Gênero</th>                    
                                    <th style="width: 4%;" class="col bg-body-secondary align-middle border-end border-black">Permissão</th>
                                </tr>
                            </thead>

                            @forelse(session("resultado") as $usuario)
                                <tbody>                
                                    <tr class="row-cols-6">
                                        <td style="width: 1%;" class="col text-center fw-bold border-start border-end">{{ $loop->iteration }}</td>
                                        <td class="col border-end">{{ $usuario->nome_completo }}</td>
                                        <td class="col border-end">{{ $usuario->usuario }}</td>
                                        <td class="col border-end">{{ $usuario->email }}</td>
                                        <td style="width: 4%;" class="col text-center border-end">{{ $usuario->data_nascimento }}</td>
                                        <td style="width: 5%;" class="col text-center border-end">{{ $usuario->celular }}</td>
                                        <td style="width: 1%;" class="col text-center border-end">{{ $usuario->genero }}</td>

                                        @if($usuario->permissao == 1)
                                            <td style="width: 4%;" class="col text-center border-end"><button class="btn btn-success btn-sm" disabled>SIM</button></td>
                                        @else
                                            <td style="width: 4%;" class="col text-center border-end"><button class="btn btn-danger btn-sm" disabled>NÃO</button></td>
                                        @endif
                                    </tr>
                                </tbody>
                            @empty
                                <tr class="text-center fw-bold border-start border-top border-end border-black">
                                    <td colspan="8" class="bg-body-secondary"><svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle me-1 mb-1" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/></svg>NENHUM USUÁRIO ENCONTRADO<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle ms-1 mb-1" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/></svg></td>
                                </tr>
                            @endforelse

                            {{ session()->forget("resultado") }}
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#data").mask("00/00/0000");
            $("#data_inicial").mask("00/00/0000");
            $("#data_final").mask("00/00/0000");
        });
    </script>
@endsection