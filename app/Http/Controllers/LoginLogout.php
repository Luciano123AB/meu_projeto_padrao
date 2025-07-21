<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginLogout extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            "usuario" => "required|min:6|max:30",
            "senha" => "required|min:8|max:64"
        ],
        
        [
            "usuario.required" => "O campo usuário é obrigatório!",
            "usuario.min" => "O campo usuário deve ter no mínimo 6 caracteres!",
            "usuario.max" => "O campo usuário deve ter no máximo 30 caracteres!",
            "senha.required" => "O campo senha é obrigatório!",
            "senha.min" => "O campo senha deve ter no mínimo 8 caracteres!",
            "senha.max" => "O campo senha deve ter no máximo 64 caracteres!"
        ]);

        $usuarioInserido = $request->input("usuario");
        $senha = $request->input("senha");

        $usuario = Usuario::where("usuario", $usuarioInserido)
                    ->where("deleted_at", NULL)->first();

        if (!$usuario) {
            return redirect()->back()->withInput()->with("usuarioError", "Usuário não encontrado!");
        }

        if (!password_verify($senha, $usuario->senha)) {
            return redirect()->back()->withInput()->with("senhaError", "Senha incorreta!");
        }

        echo "<h1>$usuarioInserido, você está logado com sucesso!</h1>";
        echo "<h2>Senha: $senha</h2>";
    }
}
