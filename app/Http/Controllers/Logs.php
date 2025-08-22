<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class Logs
{
    public function logs() {

        $id = session("usuario.id");
        $logs = Usuario::find($id)->logs()->whereNull("deleted_at")->get()->toArray();

        return view("logs", ["logs" => $logs]);
    }
}
