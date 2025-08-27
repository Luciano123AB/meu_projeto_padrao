<?php

namespace App\Imports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\ToModel;

class UsuariosImportar implements ToModel
{
    public function model(array $row)
    {
        return new Usuario([
            "nome_completo"     => $row[0],
            "usuario"    => $row[1],
            "email"    => $row[2],
            "senha" => bcrypt($row[3]),
            "cpf" => $row[4],
            "data_nascimento" => $row[5],
            "celular" => $row[6],
            "genero" => $row[7],
            "permissao" => $row[8]
        ]);
    }
}
