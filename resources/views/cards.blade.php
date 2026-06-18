@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div class="col-12 col-md-10 py-3">
                <div class="mx-3">
                    <div style="height: 750px;" class="card {{ session('tema') == "escuro" ? "bg-dark" : "bg-light" }} d-flex border border-black shadow overflow-y-scroll">
                        <div class="row row-cols-1 row-cols-md-2 g-4 m-3">
                            @forelse($usuarios as $usuario)
                                <x-cards_component :usuario="$usuario" />
                            @empty
                                <div class="col">
                                    <div class="card h-100 border-2 border-black shadow">
                                        <div class="row g-0">
                                            <div class="col-md-4 bg-light d-flex justify-content-center align-items-center p-2 border-end">
                                                <img src="data:image/png;base64,{{ $foto_padrao ?? '' }}" alt="Sem foto" class="imagens_cards img-fluid rounded-circle border border-black">
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