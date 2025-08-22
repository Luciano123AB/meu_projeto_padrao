<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TabelaCards
{
    public function tabela() {

        $id = session("usuario.id");
        $log = new Log();
        $log->pagina = "Tabela";
        $log->data_hora = date("Y-m-d H:i:s");
        $log->usuario_id = $id;

        $log->save();

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards() {

        $id = session("usuario.id");
        $log = new Log();
        $log->pagina = "Cards";
        $log->data_hora = date("Y-m-d H:i:s");
        $log->usuario_id = $id;

        $log->save();

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }
}
