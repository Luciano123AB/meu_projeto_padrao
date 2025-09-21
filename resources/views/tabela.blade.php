@extends("layouts.main_layout")

@section("content")
    @include("layouts/navbar_logado")

    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-nowrap">
            @include("layouts/opcoes")

            <div class="col-12 col-md-10 py-3">
                <div style="height: 750px;" class="bg-dark border mx-3 shadow overflow-auto rounded">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="text-center sticky-top bg-secondary text-white">
                            <tr>
                                <th style="width: 10%;">Ações</th>
                                <th style="width: 1%;">N°</th>
                                <th>Nome</th>
                                <th>Usuário</th>
                                <th>Email</th>
                                <th>Senha</th>
                                <th>CPF</th>
                                <th style="width: 8%;">Nascimento</th>
                                <th>Celular</th>
                                <th>Gênero</th>                    
                                <th style="width: 6%;">Permissão</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(session("usuario.usuario") == "Administrador")
                                @forelse($usuarios as $usuario)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ route("update", ["id" => Crypt::encrypt($usuario->id)]) }}" 
                                            class="btn btn-sm btn-primary m-1" 
                                            data-bs-toggle="tooltip" title="Editar usuário">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            
                                            <a href="{{ route("deletar", ["id" => Crypt::encrypt($usuario->id)]) }}" 
                                            class="btn btn-sm btn-danger" 
                                            data-bs-toggle="tooltip" title="Excluir usuário">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>

                                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                        <td>{{ $usuario->nome_completo }}</td>
                                        <td>{{ $usuario->usuario }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="text-center">*****</td>
                                        <td class="text-center">***.***.***-**</td>
                                        <td class="text-center">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
                                        <td class="text-center">{{ $usuario->celular }}</td>
                                        <td class="text-center">{{ $usuario->genero }}</td>

                                        <td class="text-center">
                                            <a href="{{ route("permissao", ["id" => Crypt::encrypt($usuario->id)]) }}" 
                                            class="badge {{ $usuario->permissao ? 'bg-success' : 'bg-danger' }} p-2 text-decoration-none">
                                                {{ $usuario->permissao ? 'SIM' : 'NÃO' }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center fw-bold">NENHUM USUÁRIO ENCONTRADO!</td>
                                    </tr>
                                @endforelse
                            @else
                                @forelse($usuarios as $usuario)
                                    <tr>
                                        <td></td>
                                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                        <td>{{ $usuario->nome_completo }}</td>
                                        <td>{{ $usuario->usuario }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="text-center">*****</td>
                                        <td class="text-center">***.***.***-**</td>
                                        <td class="text-center">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
                                        <td class="text-center">{{ $usuario->celular }}</td>
                                        <td class="text-center">{{ $usuario->genero }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $usuario->permissao ? 'bg-success' : 'bg-danger' }} p-2">
                                                {{ $usuario->permissao ? 'SIM' : 'NÃO' }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center fw-bold">NENHUM USUÁRIO ENCONTRADO!</td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection