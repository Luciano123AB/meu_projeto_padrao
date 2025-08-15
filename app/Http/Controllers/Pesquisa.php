<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class Pesquisa
{
    public function pesquisa() {
        return view("pesquisa");
    }

    public function pesquisaNome(Request $request){
        $request->validate([
            "nome" => "required"
        ],
        
        [
            "nome.required" => "O campo nome é obrigatório"
        ]);

        $nome = $request->input("nome");
        $usuarios = Usuario::where('nome_completo', 'like', '%' . $nome . '%')->get();

        return view("pesquisa", [
            "usuarios" => $usuarios,
            "resultado" => true
        ]);
    }

    public function pesquisaStatus(Request $request){
        $request->validate([
            "permissao" => "required"
        ],
        
        [
            "permissao.required" => "A seleção do status é obrigatória"
        ]);

        $status = $request->input("permissao");
        $valor = ($status === "permitidos") ? 1 : 0;
        $usuarios = Usuario::where('permissao', $valor)->get();

        return view("pesquisa", [
            "usuarios" => $usuarios,
            "resultado" => true
        ]);
    }

    public function pesquisaDataNascimento(Request $request){
        $request->validate([
            "data_nascimento" => "required"
        ], [
            "data_nascimento.required" => "O campo data de nascimento é obrigatório"
        ]);

        $data = $request->input("data_nascimento");
        $dataFormatada = \Carbon\Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
        $usuarios = Usuario::whereDate('data_nascimento', $dataFormatada)->get();

        return view("pesquisa", [
            "usuarios" => $usuarios,
            "resultado" => true
        ]);
    }

    public function pesquisaDataInicialFinal(Request $request){
        $request->validate([
            "data_inicial" => "required",
            "data_final" => "required"
        ], [
            "data_inicial.required" => "O campo data inicial é obrigatória",
            "data_final.required" => "O campo data final é obrigatória"
        ]);

        $dataInicial = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input("data_inicial"))->format('Y-m-d');
        $dataFinal = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input("data_final"))->format('Y-m-d');
        $usuarios = Usuario::whereBetween('data_nascimento', [$dataInicial, $dataFinal])->get();

        return view("pesquisa", [
            "usuarios" => $usuarios,
            "resultado" => true
        ]);
    }
}
