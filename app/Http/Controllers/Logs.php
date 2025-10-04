<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;

class Logs
{
    public function limparLogs($id) {

        $id = Operacoes::decryptId($id);
        $usuario = Usuario::find($id);

        $usuario->logs()->delete();

        if ($usuario) {

            $cor = "info";

            if (session("tema") == "escuro") {

                $cor = "secondary";

            }

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "success",
                "title" => "Sucesso!",
                "text" => "Logs limpos com êxito!",
                "cor" => "$cor"
            ]);
        } else {

            $cor = "danger";

            if (session("tema") == "escuro") {

                $cor = "dark";

            }

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao limpar os logs! Tente novamente.",
                "cor" => "$cor"
            ]);
        }
    }
}
