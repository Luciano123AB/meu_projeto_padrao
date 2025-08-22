<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class HomeOpcoes
{
    public function home() {

        $id = session("usuario.id");
        $log = new Log();
        $log->pagina = "Home";
        $log->data_hora = date("Y-m-d H:i:s");
        $log->usuario_id = $id;

        $log->save();

        return view("home");
    }
}
