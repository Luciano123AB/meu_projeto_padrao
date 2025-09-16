<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class Permissao
{
    public function permissao($id) {
        
        $id = Operacoes::decryptId($id);
        $usuario = Usuario::find($id);

        session(["id" => $usuario->id]);

        return redirect()->back()->withInput()->with("alertaConfirmacao", [
            "icon" => "warning",
            "title" => "Atenção!",
            "text" => "Tem certeza que deseja alterar a permissão deste usuário?",
            "rota" => "permissaoConfirmar"
        ]);
    }

    public function permissaoConfirmar($id) {
        
        $usuario = Usuario::find($id);

        if ($usuario->permissao == 0) {

            $usuario->permissao = 1;

            $usuario->save();
        } else {

            $usuario->permissao = 0;

            $usuario->save();            
        }
        
        session()->forget("id");

        if ($usuario) {
            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "success",
                "title" => "Sucesso!",
                "text" => "Permissão do usuário alterada com êxito!",
                "cor" => "info"
            ]);
        } else {
            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao alterar a permissão do usuário! Tente novamente.",
                "cor" => "danger"
            ]);
        }
    }
}
