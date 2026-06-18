@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="card border-black shadow mx-1 mx-md-3 mb-1">
                    <div class="card-body row row-cols-1 g-3">
                        <div class="col">
                            <form method="GET" action="{{ route("buscar", ["cep" => $cep ?? '000']) }}" id="form_cep">
                                <label class="fs-3 fs-md-4 fw-bold">Busca de CEP</label>

                                <div class="input-group flex-column flex-md-row">
                                    <label class="input-group-text mb-2 mb-md-0">
                                        <i class="bi bi-geo-alt"></i>
                                        Digite o CEP:
                                    </label>
    
                                    <input id="cep" class="form-control w-50" type="text" name="cep" placeholder="00000-000" value="{{ $cep ?? '' }}">
    
                                    <button class="botoes_pesquisar btn {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit" id="buscar">
                                        <i class="bi bi-search"></i> Buscar
                                    </button>
                                </div>

                                @error("cep")
                                    <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                        {{ $message }}
                                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                @enderror

                                @if(session("cepInvalido"))
                                    <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                        {{ session("cepInvalido") }}
                                        <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
    
                <div class="card border-black shadow mx-1 mx-md-3 mb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <i class="bi bi-signpost-2"></i>
    
                                <label for="logradouro" class="form-label">Rua:</label>
    
                                <input type="text" id="logradouro" class="form-control" value="{{ $dados["logradouro"] ?? '...' }}" readonly disabled>
                            </div>
    
                            <div class="col-md-6">
                                <i class="bi bi-signpost"></i>
    
                                <label for="bairro" class="form-label">Bairro:</label>
    
                                <input type="text" id="bairro" class="form-control" value="{{ $dados["bairro"] ?? '...' }}" readonly disabled>
                            </div>
    
                            <div class="col-md-6">
                                <i class="bi bi-building"></i>
    
                                <label for="cidade" class="form-label">Cidade:</label>
    
                                <input type="text" id="cidade" class="form-control" value="{{ $dados["cidade"] ?? '...' }}" readonly disabled>
                            </div>
    
                            <div class="col-md-6">
                                <i class="bi bi-flag"></i>
    
                                <label for="estado" class="form-label">Estado:</label>
    
                                <input type="text" id="estado" class="form-control" value="{{ $dados["estado"] ?? '...' }}" readonly disabled>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <i class="bi bi-crosshair2"></i>

                                <label for="link" class="form-label mb-0">Link do Maps:</label>

                                <a href="{{ $dados["link"] ?? "" }}" type="link" id="link" readonly>{{ $dados["link"] ?? "..." }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card border-black shadow mx-1 mx-md-3">
                    <div class="card-body">
                        <label class="fs-3 fs-md-4 fw-bold">Consulta de CNPJ</label>
    
                        <form method="GET" action="{{ route("consultar", ["cnpj" => $cnpj ?? '000']) }}" id="form_cnpj">
                            <div class="input-group flex-column flex-md-row">
                                <label for="cnpj" class="input-group-text mb-2 mb-md-0">
                                    <i class="bi bi-geo-alt"></i>
                                    Digite o CNPJ (Somente números):
                                </label>
    
                                <input id="cnpj" class="form-control w-50" type="text" name="cnpj" placeholder="00.000.000/0000-00" maxlength="18" value="{{ $cnpj ?? '' }}">
    
                                <button class="botoes_pesquisar btn {{ session('tema') == "escuro" ? "btn-secondary" : "btn-info" }} mt-2 mt-md-0" type="submit" id="consultar">
                                    <i class="bi bi-search"></i>
                                    Buscar
                                </button>
                            </div>
                            
                            @error("cnpj")
                                <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                    {{ $message }}
                                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                    </svg>
                                </div>
                            @enderror

                            @if(session("cnpjInvalido"))
                                <div class="alert alert-danger text-center mt-1 mb-0" role="alert">
                                    {{ session("cnpjInvalido") }}
                                    <svg xmlns="{{ asset("http://www.w3.org/2000/svg") }}" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill mb-1" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                    </svg>
                                </div>
                            @endif
                        </form>
        
                        <label class="fs-5 mt-3">Resultado da Consulta:</label>

                        <ul class="mb-0">
                            <li>
                                <b>Razão Social:</b>
                                {{ $dados['razao_social'] ?? '...' }}
                            </li>
                            <li>
                                <b>Nome Fantasia:</b>
                                {{ $dados['nome_fantasia'] ?? '...' }}
                            </li>
                            <li>
                                <b>CNAE Principal:</b>
                                {{ $dados['cnae_fiscal_descricao'] ?? '...' }}
                            </li>
                            <li>
                                <b>Município:</b>
                                {{ $dados['municipio'] ?? '...' }}
                            </li>
                            <li>
                                <b>UF:</b>
                                {{ $dados['uf'] ?? '...' }}
                            </li>
                            <li>
                                <b>Status:</b>
                                {{ $dados['descricao_situacao_cadastral'] ?? '...' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
