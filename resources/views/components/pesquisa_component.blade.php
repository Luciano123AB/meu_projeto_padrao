<tbody>
    <tr class="text-center">
        <td class="border-end">{{ $loop + 1 }}</td>
        <td class="text-start border-end">{{ $usuario->nome_completo }}</td>
        <td class="border-end">{{ $usuario->usuario }}</td>
        <td class="border-end">{{ $usuario->email }}</td>
        <td class="border-end">{{ date("d/m/Y", strtotime($usuario->data_nascimento)) }}</td>
        <td class="border-end">{{ date("d/m/Y", strtotime($usuario->created_at)) }}</td>
        <td class="border-end">{{ $usuario->celular }}</td>
        <td class="border-end">{{ $usuario->genero }}</td>
        <td>
            @if($usuario->permissao == 1)
                <span class="badge bg-success">SIM</span>
            @else
                <span class="badge bg-danger">NÃO</span>
            @endif
        </td>
    </tr>
</tbody>