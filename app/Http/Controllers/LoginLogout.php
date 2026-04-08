<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginLogout
{
    public function loginSubmit(Request $request): RedirectResponse {
        $request->validate([
            "usuario" => "required|min:6|max:30",
            "senha" => "required|min:8|max:64"
        ],
        
        [
            "usuario.required" => "O campo usuário é obrigatório.",
            "usuario.min" => "O campo usuário deve ter no mínimo :min caracteres.",
            "usuario.max" => "O campo usuário deve ter no máximo :max caracteres.",
            "senha.required" => "O campo senha é obrigatório.",
            "senha.min" => "O campo senha deve ter no mínimo :min caracteres.",
            "senha.max" => "O campo senha deve ter no máximo :max caracteres."
        ]);

        $usuario = Usuario::where("usuario", $request->input("usuario"))
                    ->where("deleted_at", NULL)->first();

        if (!$usuario) {
            return redirect()->back()->withInput()->with("usuarioErro", "Usuário não encontrado");
        }

        if (!password_verify($request->input("senha"), $usuario->senha)) {
            return redirect()->back()->withInput()->with("senhaErro", "Senha incorreta");
        }

        $usuario->ultimo_acesso = date("Y-m-d H:i:s");
        $usuario->save();

        Auth::login($usuario);

        return redirect()->route("home")->with("alertaOiTchau", [
            "title" => "Hello Sr.(ª) $usuario->usuario!",
            "text" => "Seja muito bem vindo!",
        ]);;
    }

    public function logout(Request $request): RedirectResponse {

        $usuario = Auth::user()->usuario;
        $logs = Usuario::find(Auth::user()->id)->logs();

        $logs->delete();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login")->with("alertaOiTchau", [
            "title" => "Até Mais Sr.(ª) $usuario!",
            "text" => "Esperamos o seu retorno ansiosamente!",
        ]);
    }
}
