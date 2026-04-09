<tr class="text-center">
    <td class="text-center fw-bold border-end">{{ $loop + 1 }}</td>
    <td class="border-end">{{ $dados->nome_completo }}</td>
    <td class="border-end">{{ $dados->usuario }}</td>
    <td class="border-end">{{ $dados->email }}</td>
    <td class="border-end">{{ $dados->data_nascimento }}</td>
    <td class="border-end">{{ $dados->celular }}</td>
    <td class="border-end">{{ $dados->genero }}</td>
    <td>
        @if($dados->permissao==1)
            <button class="badge bg-success" disabled>SIM</button>
        @else
            <button class="badge bg-danger" disabled>NÃO</button>
        @endif
    </td>
</tr>