<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroUpdate extends Controller
{
    public function cadastro() {
        return view("cadastro");
    }

    public function cadastroSubmit(Request $request) {
        $request->validate([
            "nome" => "required|min:1|max:80",
            "usuario" => "required|min:6|max:30",
            "email" => "required|email",
            "senha" => "required|min:8|max:64",
            "confirmar_senha" => "required",
            "cpf" => "required",
            "data" => "required",
            "celular" => "required|min:15",
            "genero" => "required",
            "foto" => "max:4294967295",
        ],
        
        [
            "nome.required" => "O campo nome é obrigatório!",
            "nome.min" => "O campo nome deve ter pelo menos 1 caractere!",
            "nome.max" => "O campo nome deve ter no máximo 80 caracteres!",
            "usuario.required" => "O campo usuário é obrigatório!",
            "usuario.min" => "O campo usuário deve ter pelo menos 6 caracteres!",
            "usuario.max" => "O campo usuário deve ter no máximo 30 caracteres!",
            "email.required" => "O campo email é obrigatório!",
            "email.email" => "O campo email deve ser um endereço de email válido!",
            "senha.required" => "O campo senha é obrigatório!",
            "senha.min" => "O campo senha deve ter pelo menos 8 caracteres!",
            "senha.max" => "O campo senha deve ter no máximo 64 caracteres!",
            "confirmar_senha.required" => "O campo confirmar senha é obrigatório!",
            "cpf.required" => "O campo CPF é obrigatório!",
            "data.required" => "O campo data de nascimento é obrigatório!",
            "celular.required" => "O campo celular é obrigatório!",
            "celular.min" => "O campo celular deve ter pelo menos 15 caracteres!",
            "genero.required" => "O campo gênero é obrigatório!",
            "foto.max" => "O campo foto deve ter no máximo 4GB!",
        ]);

        $nome = $request->input("nome");
        $usuario = $request->input("usuario");
        $email = $request->input("email");
        $senha = $request->input("senha");
        $confirmarSenha = $request->input("confirmar_senha");
        $cpf = $request->input("cpf");
        $dataNascimento = $request->input("data");
        $celular = $request->input("celular");
        $genero = $request->input("genero");
        $foto = $request->file("foto");

        if ($senha !== $confirmarSenha) {
            return redirect()->back()->withInput()->with("senhaErro", "As senhas não coincidem!");
        }

        echo "<h1>Cadastro realizado com sucesso!</h1>";
        echo "<h2>Nome: $nome</h2>";
        echo "<h2>Usuário: $usuario</h2>";
        echo "<h2>Email: $email</h2>";
        echo "<h2>Senha: $senha</h2>";
        echo "<h2>Confirmar Senha: $confirmarSenha</h2>";
        echo "<h2>CPF: $cpf</h2>";
        echo "<h2>Data de Nascimento: $dataNascimento</h2>";
        echo "<h2>Celular: $celular</h2>";
        echo "<h2>Gênero: $genero</h2>";
    }
}
