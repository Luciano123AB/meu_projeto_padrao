<?php

namespace App\Http\Controllers;

use App\Services\Operacoes;

class HomeOpcoes
{
    public function home() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("home");
    }
}
