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

        return redirect()->route("home")->with("confirmarDelete", "Tem certeza que deseja deletar este usuário?");
    }

    public function deletarConfirmar($id) {

        $usuario = Usuario::find($id);

        $usuario->delete();
        session()->forget("id");

        if (session("usuario.usuario") == $usuario->usuario) {
            session()->forget("usuario");

            return redirect()->route("login");
        } else {
            return redirect()->route("home");
        }        
    }
}
