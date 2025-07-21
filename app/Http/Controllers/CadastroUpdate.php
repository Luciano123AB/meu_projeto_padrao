<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroUpdate extends Controller
{
    public function cadastro()
    {
        return view('cadastro');
    }

    public function cadastroSubmit(Request $request)
    {
        $request->validate([
            "nome" => "required|string|max:255",
            "usuario" => "required|string|max:255|unique:users,usuario",
            "email" => "required|email|max:255|unique:users,email",
            "data" => "required|date_format:d/m/Y",
            "senha" => "required|string|min:8|confirmed",
            "foto" => "nullable|image|mimes:png|max:2048",
        ],
        
        [
            "nome.required" => "O campo Nome Completo é obrigatório.",
            "usuario.required" => "O campo Usuário é obrigatório.",
            "usuario.unique" => "Este Usuário já está em uso.",
            "email.required" => "O campo Email é obrigatório.",
            "email.email" => "O Email deve ser um endereço de email válido.",
            "email.unique" => "Este Email já está em uso.",
            "data.required" => "O campo Data de Nascimento é obrigatório.",
            "data.date_format" => "A Data de Nascimento deve estar no formato DIA/MÊS/ANO.",
            "senha.required" => "O campo Senha é obrigatório.",
            "senha.min" => "A Senha deve ter pelo menos 8 caracteres.",
            "senha.confirmed" => "A confirmação da Senha não corresponde.",
            "foto.image" => "A foto deve ser uma imagem.",
            "foto.max" => "A foto não pode exceder 2MB.",
        ]);
    }
}
