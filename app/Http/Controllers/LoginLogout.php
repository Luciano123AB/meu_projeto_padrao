<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginLogout
{
    public function loginSubmit(Request $request): RedirectResponse {
        $request->validate([
            "usuario" => "required|min:6|max:30",
            "senha" => "required|min:8|max:64"
        ],
        
        [
            "usuario.required" => "O campo usuário é obrigatório",
            "usuario.min" => "O campo usuário deve ter no mínimo 6 caracteres",
            "usuario.max" => "O campo usuário deve ter no máximo 30 caracteres",
            "senha.required" => "O campo senha é obrigatório",
            "senha.min" => "O campo senha deve ter no mínimo 8 caracteres",
            "senha.max" => "O campo senha deve ter no máximo 64 caracteres"
        ]);

        $usuarioInserido = $request->input("usuario");
        $senha = $request->input("senha");

        $usuario = Usuario::where("usuario", $usuarioInserido)
                    ->where("deleted_at", NULL)->first();

        if (!$usuario) {
            return redirect()->back()->withInput()->with("usuarioErro", "Usuário não encontrado");
        }

        if (!password_verify($senha, $usuario->senha)) {
            return redirect()->back()->withInput()->with("senhaErro", "Senha incorreta");
        }

        $usuario->ultimo_acesso = date("Y-m-d H:i:s");
        $usuario->save();

        session(["usuario" => [
            "id" => $usuario->id,
            "usuario" => $usuario->usuario,
            "foto" => $usuario->foto,
            "permissao" => $usuario->permissao
        ]]);

        return redirect()->route("home")->with("alertaOiTchau", [
            "title" => "Hello Sr.(ª) $usuario->usuario!",
            "text" => "Seja muito bem vindo!",
        ]);;
    }

    public function logout(): RedirectResponse {

        $id = session("usuario.id");
        $usuario = session("usuario.usuario");
        $logs = Usuario::find($id)->logs();

        $logs->delete();
        DB::statement("ALTER TABLE logs AUTO_INCREMENT = 1");

        session()->forget("usuario");

        return redirect()->route("login")->with("alertaOiTchau", [
            "title" => "Até Mais Sr.(ª) $usuario!",
            "text" => "Esperamos o seu retorno ansiosamente!",
        ]);
    }
}
