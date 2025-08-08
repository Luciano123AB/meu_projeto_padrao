<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class TabelaCards
{
    public function tabela() {

        $usuario = Usuario::all()->whereNull("deleted_at");

        return view("tabela", ["usuario" => $usuario]);
    }
}
