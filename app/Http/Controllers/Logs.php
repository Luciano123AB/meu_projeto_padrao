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

    public function limparLogs($id) {

        $id = Operacoes::decryptId($id);
        $usuario = Usuario::find($id);

        $usuario->logs()->delete();

        if ($usuario) {
            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "success",
                "title" => "Sucesso!",
                "text" => "Logs limpos com êxito!",
                "cor" => "info"
            ]);
        } else {
            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao limpar os logs! Tente novamente.",
                "cor" => "danger"
            ]);
        }
    }
}
