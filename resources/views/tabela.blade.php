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

                                        <td class="text-center fw-bold border-end">{{ $loop->iteration }}</td>
                                        <td class="border-end">{{ $usuario->nome_completo }}</td>
                                        <td class="border-end">{{ $usuario->usuario }}</td>
                                        <td class="border-end">{{ $usuario->email }}</td>
                                        <td class="text-center border-end">*****</td>
                                        <td class="text-center border-end">***.***.***-**</td>
                                        <td class="text-center border-end">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
                                        <td class="text-center border-end">{{ $usuario->celular }}</td>
                                        <td class="text-center border-end">{{ $usuario->genero }}</td>
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
                                        <td class="border-end"></td>
                                        <td class="text-center fw-bold border-end">{{ $loop->iteration }}</td>
                                        <td class="border-end">{{ $usuario->nome_completo }}</td>
                                        <td class="border-end">{{ $usuario->usuario }}</td>
                                        <td class="border-end">{{ $usuario->email }}</td>
                                        <td class="text-center border-end">*****</td>
                                        <td class="text-center border-end">***.***.***-**</td>
                                        <td class="text-center border-end">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
                                        <td class="text-center border-end">{{ $usuario->celular }}</td>
                                        <td class="text-center border-end">{{ $usuario->genero }}</td>
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