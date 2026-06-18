@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="mx-3">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card border border-black p-3 shadow">
                                <form action="{{ route('subir.arquivo') }}" id="formulario" method="post" enctype="multipart/form-data" novalidate>
                                    @csrf

                                    <div class="row row-cols-1 row-cols-md-2 g-3 mb-2">
                                        <div class="col">
                                            <div class="overflow-auto">
                                                <label>Apenas arquivos de texto e imagem são permitidos.</label>
                                                
                                                <input id="arquivo" class="form-control mt-2" type="file" name="arquivo" accept=".txt, image/jpeg, image/png" required>
                                            </div>                                            
                                            @error('arquivo')
                                                <div class="alert alert-danger text-center mt-1" role="alert">
                                                    {{ $message }}
                                                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                                    </svg>
                                                </div>
                                            @enderror
                                        </div>
    
                                        <div class="col mb-1 d-flex justify-content-center align-items-center">
                                            <button id="subir" class="btn btn-lg {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} w-100 w-md-auto fs-5 fs-md-1 p-2 p-md-4" type="submit" name="subir">
                                                SUBIR
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{ route('criar.arquivo') }}" id="formulario" method="post" enctype="multipart/form-data" novalidate>
                                    @csrf

                                    <div class="row row-cols-1 row-cols-md-2 g-3">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <div class="text-center">
                                                <label>Um arquivo ".txt" será criado na pasta "storage/public".</label>                                                
                                            </div>
                                        </div>
    
                                        <div class="col mb-1 d-flex justify-content-center align-items-center">
                                            <button id="criar" class="btn btn-lg {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} w-100 w-md-auto fs-5 fs-md-1 p-2 p-md-4" type="submit" name="criar">
                                                CRIAR
                                            </button>
                                        </div>
                                    </div>
    
                                    @error('texto')
                                        <div class="alert alert-danger text-center my-1" role="alert">
                                            {{ $message }}
                                            <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </div>
                                    @enderror
                                    <div class="rounded-2 {{ session('tema') == "escuro" ? "bg-dark" : "bg-secondary" }} border overflow-auto">
                                        <textarea id="texto" class="form-control" name="texto" cols="30" rows="15" placeholder="..." required value="{{ old("texto") }}"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                        <div class="col">
                            <div class="card border border-black p-3 shadow">
                                <div id="arquivos" class="table-responsive rounded-2 {{ session('tema') == "escuro" ? "bg-dark" : "bg-secondary" }} border overflow-auto">
                                    <table class="table table-hover {{ session('tema') == "escuro" ? "table-dark" : "table-secondary" }} align-middle mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th class="border-end align-middle">N°</th>
                                                <th class="border-end align-middle">Nome</th>
                                                <th class="border-end align-middle">Tamanho(Kb)</th>
                                                <th class="border-end align-middle">Tipo</th>
                                                <th class="border-end">Data Mod.</th>
                                                <th class="align-middle"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($dados_arquivos as $arquivo)
                                                <tr class="text-center">
                                                    <td class="text-center fw-bold border-end">{{ $loop->index + 1 }}</td>
                                                    <td class="border-end">{{ $arquivo["nome"] }}</td>
                                                    <td class="border-end">{{ $arquivo["tamanho"] }}</td>
                                                    <td class="border-end">{{ $arquivo["tipo"] }}</td>
                                                    <td class="border-end">{{ $arquivo["data"] }}</td>
                                                    <td>
                                                        <a href="{{ route("download.arquivo", ["arquivo" => $arquivo["nome"]]) }}" class="badge bg-success">Download</a>
                                                        <a href="{{ route("excluir.arquivo", ["arquivo" => $arquivo["arquivo"]]) }}" class="badge bg-danger">Excluir</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center fw-bold">
                                                    <td colspan="6" class="{{ session('tema') == "escuro" ? "bg-dark" : "bg-secondary" }}">NENHUM ARQUIVO ENCONTRADO</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection