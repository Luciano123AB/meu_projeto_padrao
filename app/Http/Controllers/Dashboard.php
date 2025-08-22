<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Usuario;
use Illuminate\Http\Request;

class Dashboard
{
    public function dashboard() {

        $id = session("usuario.id");
        $log = new Log();
        $log->pagina = "Dashboard";
        $log->data_hora = date("Y-m-d H:i:s");
        $log->usuario_id = $id;
        
        $log->save();

        $usuarios = Usuario::where("usuario", "!=", "Administrador")->get();
        $permitidos = $usuarios->where("permissao", 1)->count();
        $negados = $usuarios->where("permissao", 0)->count();
        $total = $usuarios->count();
        $porcentagemPermitidos = $total > 0 ? round(($permitidos / $total) * 100) : 0;
        $porcentagemNegados = $total > 0 ? round(($negados / $total) * 100) : 0;

        return view("dashboard", [
            "total" => $total,
            "permitidos" => $permitidos,
            "negados" => $negados,
            "porcentagemPermitidos" => $porcentagemPermitidos,
            "porcentagemNegados" => $porcentagemNegados
        ]);
    }
}
