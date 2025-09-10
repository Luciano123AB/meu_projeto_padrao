<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class Deletar
{
    public function deletar($id) {

        $id = Operacoes::decryptId($id);
        $usuario = Usuario::find($id);

        session(["id" => $usuario->id]);

        return redirect()->back()->withInput()->with("alerta", [
            "icon" => "warning",
            "title" => "Atenção!",
            "text" => "Tem certeza que deseja deletar este usuário?",
            "footer" => "warning"
        ]);
    }

    public function deletarConfirmar($id) {

        $usuario = Usuario::find($id);

        $usuario->delete();
        session()->forget("id");

        if ($usuario) {
            if (session("usuario.usuario") == $usuario->usuario) {
                session()->forget("usuario");

                return redirect()->route("login");
            } else {
                return redirect()->back()->withInput()->with("alerta", [
                    "icon" => "success",
                    "title" => "Sucesso!",
                    "text" => "Usuário deletado com êxito!",
                    "cor" => "info"
                ]);
            }
        } else {
            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao deletar o usuário! Tente novamente.",
                "cor" => "danger"
            ]);
        }
    }
}
