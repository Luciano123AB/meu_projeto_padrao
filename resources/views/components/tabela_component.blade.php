<tr>
    <td class="text-center border-end">
        @if(auth()->user()->usuario == "Administrador" || auth()->user()->permissao == 1)
            <a href="{{ route("update", ["id" => Crypt::encrypt($usuario->id)]) }}" class="btn btn-sm {{ session('tema') == "escuro" ? "btn-secondary" : "btn-primary" }} m-1" data-bs-toggle="tooltip" title="Editar usuário">
                <i class="bi bi-pencil-square"></i>
            </a>
                
            <a href="{{ route("deletar", ["id" => Crypt::encrypt($usuario->id)]) }}" class="btn btn-sm {{ session('tema') == "escuro" ? "btn-dark" : "btn-danger" }}" data-bs-toggle="tooltip" title="Excluir usuário">
                <i class="bi bi-trash"></i>
            </a>
        @endif
    </td>

    <td class="text-center fw-bold border-end">{{ $loop + 1 }}</td>
    <td class="border-end">{{ $usuario->nome_completo }}</td>
    <td class="border-end">{{ $usuario->usuario }}</td>
    <td class="border-end">{{ $usuario->email }}</td>
    <td class="text-center border-end">
        @if(auth()->user()->usuario == "Administrador")
            {{ $usuario->cpf }}
        @else
            ***.***.***-**
        @endif
    </td>
    <td class="text-center border-end">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
    <td class="text-center border-end">{{ $usuario->celular }}</td>
    <td class="text-center border-end">{{ $usuario->genero }}</td>
    <td class="text-center">
        @if(auth()->user()->usuario == "Administrador")
            <a href="{{ route("permissao", ["id" => Crypt::encrypt($usuario->id)]) }}" 
            class="badge {{ $usuario->permissao ? 'bg-success' : 'bg-danger' }} p-2 text-decoration-none">
                {{ $usuario->permissao ? 'SIM' : 'NÃO' }}
            </a>
        @else
            <span class="badge {{ $usuario->permissao ? 'bg-success' : 'bg-danger' }} bloqueado p-2">
                {{ $usuario->permissao ? 'SIM' : 'NÃO' }}
            </span>
        @endif
    </td>
</tr>