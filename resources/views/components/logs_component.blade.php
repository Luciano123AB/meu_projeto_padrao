<tr>
    <td class="text-center fw-bold border-end">{{ $loop + 1 }}</td>
    <td class="text-start border-end">{{ $log["pagina"] }}</td>
    <td class="text-center border-end">{{ date("d/m/Y", strtotime($log["data_hora"])) }}</td>
    <td class="text-center border-end">{{ date("H:i:s", strtotime($log["data_hora"])) }}</td>
    <td class="text-center">
        <a href="{{ route("limparLog", ["id" => Crypt::encrypt($log["id"])]) }}" class="btn btn-sm {{ session("tema") == "escuro" ? "btn-dark" : "btn-danger" }}" data-bs-toggle="tooltip" title="Excluir usuário">
            <i class="bi bi-trash"></i>
        </a>
    </td>
</tr>