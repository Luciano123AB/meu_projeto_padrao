@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    @include("layouts.tema")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-nowrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="mx-3">
                    <div style="height: 750px;" class="card d-flex border border-black shadow overflow-y-scroll">
                        <div class="row row-cols-1 row-cols-md-2 g-4 m-3">
                            @forelse($usuarios as $usuario)
                                <div id="cards_efeito" class="col mt-3 mb-1">
                                    <div class="card h-100 border-2 border-black shadow">
                                        <div class="row g-0">
                                            <div class="col-md-4 bg-light d-flex justify-content-center align-items-center p-2 border-end rounded-1">
                                                <img 
                                                    src="data:image/png;base64,{{ $usuario->foto }}" 
                                                    alt="Foto de {{ $usuario->nome_completo }}" 
                                                    class="img-fluid rounded-circle border border-black"
                                                    style="max-height: 160px; object-fit: cover;">
                                            </div>

                                            <div class="col-md-8">
                                                <div class="card-body p-2">
                                                    <h5 class="card-title text-center mb-3">Informações</h5>
                                                    
                                                    <ul class="list-group list-group-flush small">
                                                        <li class="list-group-item"><strong>Nome:</strong> {{ $usuario->nome_completo }}</li>
                                                        <li class="list-group-item"><strong>Login:</strong> {{ $usuario->usuario }}</li>
                                                        <li class="list-group-item"><strong>Email:</strong> {{ $usuario->email }}</li>
                                                        <li class="list-group-item"><strong>Senha:</strong> *****</li>
                                                        <li class="list-group-item"><strong>CPF:</strong> ***.***.***-**</li>
                                                        <li class="list-group-item"><strong>Nascimento:</strong> {{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</li>
                                                        <li class="list-group-item"><strong>Celular:</strong> {{ $usuario->celular }}</li>
                                                        <li class="list-group-item"><strong>Gênero:</strong> {{ $usuario->genero }}</li>
                                                        <li class="list-group-item">
                                                            <strong>Permissão:</strong>
                                                            
                                                            @if($usuario->permissao == 1)
                                                                <span class="badge bg-success">SIM</span>
                                                            @else
                                                                <span class="badge bg-danger">NÃO</span>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col">
                                    <div class="card h-100 border-2 border-black shadow">
                                        <div class="row g-0">
                                            <div class="col-md-4 bg-light d-flex justify-content-center align-items-center p-2 border-end">
                                                <img 
                                                    src="data:image/png;base64,{{ $foto_padrao ?? '' }}" 
                                                    alt="Sem foto"
                                                    class="img-fluid rounded-circle border border-black"
                                                    style="max-height: 160px; object-fit: cover;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-2">
                                                    <h5 class="card-title text-center mb-3">Informações</h5>
                                                    <ul class="list-group list-group-flush small">
                                                        <li class="list-group-item">Nome: ...</li>
                                                        <li class="list-group-item">Login: ...</li>
                                                        <li class="list-group-item">Email: ...</li>
                                                        <li class="list-group-item">Senha: ...</li>
                                                        <li class="list-group-item">CPF: ...</li>
                                                        <li class="list-group-item">Nascimento: ...</li>
                                                        <li class="list-group-item">Celular: ...</li>
                                                        <li class="list-group-item">Gênero: ...</li>
                                                        <li class="list-group-item"><strong>Permissão:</strong> <span class="badge bg-secondary">NULL</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection