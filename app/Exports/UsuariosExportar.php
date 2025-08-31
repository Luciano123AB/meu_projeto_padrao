<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsuariosExportar implements FromCollection, WithHeadings
{
    public function collection() {
        return Usuario::select("nome_completo", "usuario", "email", "cpf", "data_nascimento", "celular", "genero", "permissao")->get();
    }

    public function headings(): array {
        return [
            "Nome Completo",
            "Usuário",
            "Email",
            "CPF",
            "Data de Nascimento",
            "Celular",
            "Gênero",
            "Permissão"
        ];
    }
}
