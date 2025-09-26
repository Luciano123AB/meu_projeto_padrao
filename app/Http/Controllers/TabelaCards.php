<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Usuario;

class TabelaCards
{
    public function tabela() {

        $id = session("usuario.id");
        $log = new Logs();
        $log->usuario_id = $id;
        $log->pagina = "Tabela";
        $log->data_hora = date("Y-m-d H:i:s");        

        $log->save();

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards() {

        $id = session("usuario.id");
        $log = new Logs();
        $log->usuario_id = $id;
        $log->pagina = "Cards";
        $log->data_hora = date("Y-m-d H:i:s");        

        $log->save();

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }
}
