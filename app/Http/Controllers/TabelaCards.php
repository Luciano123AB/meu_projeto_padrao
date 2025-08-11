<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class TabelaCards
{
    public function tabela() {

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards() {

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }
}
