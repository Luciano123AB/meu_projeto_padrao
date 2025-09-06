@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-nowrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card border border-black p-3 shadow">
                            <form action="{{ route('importar') }}" id="formulario" method="post" enctype="multipart/form-data" novalidate>
                                @csrf

                                <div class="row row-cols-1 row-cols-md-2 g-3">
                                    <div class="col">
                                        <div class="overflow-auto">
                                            <label>Apenas arquivos em ".xlsx" são permitidos.</label>
                                            
                                            <input id="arquivo" class="form-control mt-2" type="file" name="arquivo" accept=".xlsx" required>
                                        </div>
                                        
                                        @error('arquivo')
                                            <div class="alert alert-danger mt-1" role="alert">
                                                {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col mb-3 d-flex justify-content-center align-items-center">
                                        <button id="importar" class="btn btn-lg btn-info w-100 w-md-auto fs-5 fs-md-1 p-2 p-md-4" type="submit" name="importar">
                                            IMPORTAR
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive rounded-2 bg-dark border" style="min-height: 300px;">
                                    <table class="table table-hover align-middle mb-0">
                                        @if(session()->has('dadosImportados'))
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

                                            <tbody>
                                                @forelse(session('dadosImportados') as $dados)
                                                    <tr class="text-center">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dados['nome_completo'] }}</td>
                                                        <td>{{ $dados['usuario'] }}</td>
                                                        <td>{{ $dados['email'] }}</td>
                                                        <td>{{ $dados['data_nascimento'] }}</td>
                                                        <td>{{ $dados['celular'] }}</td>
                                                        <td>{{ $dados['genero'] }}</td>
                                                        <td>
                                                            @if(isset($dados['permissao']) && $dados['permissao']==1)
                                                                <button class="btn btn-success btn-sm" disabled>SIM</button>
                                                            @else
                                                                <button class="btn btn-danger btn-sm" disabled>NÃO</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr class="text-center fw-bold">
                                                        <td colspan="8">NENHUM USUÁRIO ENCONTRADO</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            
                                            {{ session()->forget('dadosImportados') }}
                                        @endif
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border border-black p-3 shadow">
                            <form action="{{ route('exportar') }}" id="formulario" class="row row-cols-1 row-cols-md-2 g-3" method="get" novalidate>
                                @csrf
                                
                                <div class="col mb-3 d-flex justify-content-center align-items-center">
                                    <button id="exportar" class="btn btn-lg btn-info w-100 fs-5 fs-md-1 p-2 p-md-4" type="submit" name="exportar">
                                        EXPORTAR
                                    </button>
                                </div>
                                
                                <div class="col">
                                    <label class="form-label">Formato:</label>
                                    
                                    <select id="formato" class="form-select w-100" name="formato" required>
                                        <option value="" selected disabled>Selecione...</option>
                                        <option value="Excel">Excel</option>
                                        <option value="PDF">PDF</option>
                                    </select>
                                    
                                    @error('formato')
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $message }}<svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/></svg>
                                        </div>
                                    @enderror
                                </div>
                            </form>

                            <div class="table-responsive rounded-2 bg-dark border" style="min-height: 300px;">
                                <table class="table table-hover align-middle mb-0">
                                    @if(session()->has('dadosExportados'))
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

                                        <tbody>
                                            @forelse(session('dadosExportados') as $dados)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $dados->nome_completo }}</td>
                                                    <td>{{ $dados->usuario }}</td>
                                                    <td>{{ $dados->email }}</td>
                                                    <td>{{ $dados->data_nascimento }}</td>
                                                    <td>{{ $dados->celular }}</td>
                                                    <td>{{ $dados->genero }}</td>
                                                    <td>
                                                        @if($dados->permissao==1)
                                                            <button class="btn btn-success btn-sm" disabled>SIM</button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" disabled>NÃO</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center fw-bold">
                                                    <td colspan="8">NENHUM USUÁRIO ENCONTRADO</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        
                                        {{ session()->forget('dadosExportados') }}
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection