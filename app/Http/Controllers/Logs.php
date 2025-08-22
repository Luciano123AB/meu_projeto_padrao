<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class Logs
{
    public function logs($id) {

        $id = Operacoes::decryptId($id);
        $logs = Usuario::find($id)->logs()->whereNull("deleted_at")->get()->toArray();

        return view("logs", ["logs" => $logs]);
    }
}
