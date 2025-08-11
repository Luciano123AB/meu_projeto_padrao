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

        return redirect()->back()->with("confirmarPermissao", "Tem certeza que deseja alterar a permissão deste usuário?");
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

        return redirect()->back()->with("permissaoSucesso", "Permissão do usuário alterada com êxito!");
    }
}
