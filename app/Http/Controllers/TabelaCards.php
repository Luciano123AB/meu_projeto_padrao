<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;

class TabelaCards
{
    public function tabela() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards() {

        $id = session("usuario.id");
        
        Operacoes::salvarLog($id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }
}
