<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class Deletar
{
    public function deletar($id): RedirectResponse {

        $usuario = Usuario::find(Operacoes::decryptId($id));

        session(["id" => $usuario->id]);

        $cor01 = "success";
        $cor02 = "danger";

        if (session("tema") == "escuro") {

            $cor01 = "secondary";
            $cor02 = "dark";

        }

        return redirect()->back()->withInput()->with("alertaConfirmacao", [
            "icon" => "warning",
            "title" => "Atenção!",
            "text" => "Tem certeza que deseja deletar esse usuário!",
            "rota" => "deletarConfirmar",
            "cor01" => "$cor01",
            "cor02" => "$cor02"
        ]);
    }

    public function deletarConfirmar($id): RedirectResponse {

        $usuario = Usuario::find(Operacoes::decryptId($id));

        $usuario->delete();

        session()->forget("id");

        if ($usuario) {
            if (Auth::user()->usuario == $usuario->usuario) {
                return redirect()->route("logout");
            } else {

                $cor = "info";

                if (session("tema") == "escuro") {

                    $cor = "secondary";

                }

                return redirect()->back()->withInput()->with("alerta", [
                    "icon" => "success",
                    "title" => "Sucesso!",
                    "text" => "Usuário deletado com êxito!",
                    "cor" => "$cor"
                ]);
            }
        }

        $cor = "danger";

        if (session("tema") == "escuro") {

            $cor = "dark";

        }

        return redirect()->back()->withInput()->with("alerta", [
            "icon" => "error",
            "title" => "Erro!",
            "text" => "Falha ao deletar o usuário! Tente novamente.",
            "cor" => "danger"
        ]);        
    }
}
