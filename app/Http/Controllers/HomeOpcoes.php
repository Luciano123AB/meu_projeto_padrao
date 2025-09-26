<?php

namespace App\Http\Controllers;

use App\Models\Logs;

class HomeOpcoes
{
    public function home() {

        $id = session("usuario.id");
        $log = new Logs();
        $log->usuario_id = $id;
        $log->pagina = "Home";
        $log->data_hora = date("Y-m-d H:i:s");        

        $log->save();

        return view("home");
    }
}
