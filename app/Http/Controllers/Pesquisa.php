<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class Pesquisa
{
    public function pesquisa() {
        return view("pesquisa");
    }

    public function pesquisaUsuario(Request $request){
        $request->validate([
            "usuario" => "required"
        ],
        
        [
            "usuario.required" => "O campo usuario é obrigatório"
        ]);

        $usuario = $request->input("usuario");

        echo "<h1>Pesquisa Realizada com Sucesso!</h1>";
        echo "<h2>Usuario Informado: $usuario</h2>";
        echo "<h1>Lista de Usuários:</h1>";
        echo "<h2>1- ...</h2>";
    }

    public function pesquisaStatus(Request $request){
        $request->validate([
            "permissao" => "required"
        ],
        
        [
            "permissao.required" => "A seleção do status é obrigatória"
        ]);

        $status = $request->input("permissao");

        echo "<h1>Pesquisa Realizada com Sucesso!</h1>";
        echo "<h2>Status Escolhido: $status</h2>";
        echo "<h1>Lista de Usuários:</h1>";
        echo "<h2>1- ...</h2>";
    }

    public function pesquisaDataNascimento(Request $request){
        $request->validate([
            "data" => "required"
        ], [
            "data.required" => "O campo data de nascimento é obrigatório"
        ]);

        $data = $request->input("data");

        echo "<h1>Pesquisa Realizada com Sucesso!</h1>";
        echo "<h2>Data Informada: $data</h2>";
        echo "<h1>Lista de Usuários:</h1>";
        echo "<h2>1- ...</h2>";
    }

    public function pesquisaDataInicialFinal(Request $request){
        $request->validate([
            "data_inicial" => "required",
            "data_final" => "required"
        ], [
            "data_inicial.required" => "O campo data inicial é obrigatória",
            "data_final.required" => "O campo data final é obrigatória"
        ]);

        $dataInicial = $request->input("data_inicial");
        $dataFinal = $request->input("data_final");

        echo "<h1>Pesquisa realizada com sucesso!</h1>";
        echo "<h2>Data Inicial Informada: $dataInicial</h2>";
        echo "<h2>Data Final Informada: $dataFinal</h2>";
        echo "<h1>Lista de Usuários:</h1>";
        echo "<h2>1- ...</h2>";
    }
}
