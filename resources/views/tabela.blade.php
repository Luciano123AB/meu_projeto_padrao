@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div class="col-12 col-md-10 py-3">
                <div style="height: 750px;" class="{{ session("tema") == "escuro" ? "bg-dark" : "bg-secondary" }} border mx-3 shadow overflow-auto rounded">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="text-center sticky-top bg-secondary text-white">
                            <tr>
                                <th style="width: 10%;" class="border-end">Ações</th>
                                <th style="width: 1%;" class="border-end">N°</th>
                                <th class="border-end">Nome</th>
                                <th class="border-end">Usuário</th>
                                <th class="border-end">Email</th>
                                <th class="border-end">Senha</th>
                                <th class="border-end">CPF</th>
                                <th style="width: 8%;" class="border-end">Nascimento</th>
                                <th class="border-end">Celular</th>
                                <th class="border-end">Gênero</th>
                                <th style="width: 6%;">Permissão</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <x-tabela_component :usuario="$usuario" :loop="$loop->index" />                                
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center fw-bold">NENHUM USUÁRIO ENCONTRADO!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection