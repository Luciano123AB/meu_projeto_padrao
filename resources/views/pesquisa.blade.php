@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="card border-black shadow mx-1 mx-md-3 mt-4 mb-1">
                    <div class="card-body row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <form class="mb-2" action="{{ route('pesquisaUsuario') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row">
                                    <label class="input-group-text mb-2 mb-md-0">Digite um nome de usuário:</label>

                                    <input id="usuario" class="form-control" type="text" name="usuario" placeholder="...">
                                    
                                    <button class="btn btn-info mt-2 mt-md-0" type="submit" name="pesquisar">
                                        <i class="bi bi-search"></i> Pesquisar
                                    </button>
                                </div>
                                
                                @error('usuario')
                                    <div class="alert alert-danger text-center mt-2 mb-0">{{ $message }}</div>
                                @enderror
                            </form>

                            <form action="{{ route('pesquisaStatus') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row align-items-center">
                                    <label class="input-group-text mb-2 mb-md-0">Escolha um status:</label>

                                    <div class="d-flex gap-3 mb-2 mb-md-0">
                                        <div class="form-check">
                                            <input id="permissao01" class="form-check-input" type="radio" name="permissao" value="permitidos">

                                            <label class="form-check-label" for="permissao01">Permitidos</label>
                                        </div>

                                        <div class="form-check">
                                            <input id="permissao02" class="form-check-input" type="radio" name="permissao" value="negados">

                                            <label class="form-check-label" for="permissao02">Negados</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-info" type="submit" name="pesquisar">
                                        <i class="bi bi-search"></i> Pesquisar
                                    </button>
                                </div>

                                @error('permissao')
                                    <div class="alert alert-danger text-center mt-2 mb-0">{{ $message }}</div>
                                @enderror
                            </form>
                        </div>

                        <div class="col">
                            <form class="mb-2" action="{{ route('pesquisaDataNascimento') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row">
                                    <label class="input-group-text mb-2 mb-md-0">Digite uma data de nascimento:</label>

                                    <input id="data" class="form-control" type="text" name="data" placeholder="DIA/MÊS/ANO">

                                    <button class="btn btn-info mt-2 mt-md-0" type="submit">Pesquisar</button>
                                </div>

                                @error('data')
                                    <div class="alert alert-danger text-center mt-2 mb-0">{{ $message }}</div>
                                @enderror
                            </form>

                            <form action="{{ route('pesquisaDataInicialFinal') }}" method="post">
                                @csrf

                                <div class="input-group flex-column flex-md-row gap-2">
                                    <label class="input-group-text mb-2 mb-md-0">Defina uma data "inicial" e uma "final":</label>

                                    <input id="data_inicial" class="form-control" type="text" name="data_inicial" placeholder="DIA/MÊS/ANO">

                                    <input id="data_final" class="form-control" type="text" name="data_final" placeholder="DIA/MÊS/ANO">

                                    <button class="btn btn-info mt-2 mt-md-0" type="submit">Pesquisar</button>
                                </div>

                                <div class="d-flex flex-column flex-md-row gap-2 mt-2">
                                    @error('data_inicial')
                                        <div class="alert alert-danger text-center flex-fill">{{ $message }}</div>
                                    @enderror

                                    @error('data_final')
                                        <div class="alert alert-danger text-center flex-fill">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="rounded-2 bg-dark border mx-1 mx-md-3 mb-5 shadow overflow-auto">
                    <div class="table-responsive">
                        <table class="table table-hover table-dark align-middle mb-0" style="min-height: 400px;">
                            @if(session()->has("resultado"))
                                <thead class="text-center">
                                    <tr>
                                        <th>N°</th>
                                        <th>Nome</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Data Nasc.</th>
                                        <th>Celular</th>
                                        <th>Gênero</th>
                                        <th>Permissão</th>
                                    </tr>
                                </thead>

                                @forelse(session("resultado") as $usuario)
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-start">{{ $usuario->nome_completo }}</td>
                                            <td>{{ $usuario->usuario }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->data_nascimento }}</td>
                                            <td>{{ $usuario->celular }}</td>
                                            <td>{{ $usuario->genero }}</td>
                                            <td>
                                                @if($usuario->permissao == 1)
                                                    <span class="badge bg-success">SIM</span>
                                                @else
                                                    <span class="badge bg-danger">NÃO</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8" class="bg-secondary">NENHUM USUÁRIO ENCONTRADO</td>
                                    </tr>
                                @endforelse

                                {{ session()->forget("resultado") }}
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#data, #data_inicial, #data_final").mask("00/00/0000");
        });
    </script>
@endsection
