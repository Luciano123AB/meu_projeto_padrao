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
        $usuarios = Usuario::where("usuario", "like", "%" . $usuario . "%")->get();

        session(["resultado" => $usuarios]);

        return redirect()->back();
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
        $usuarios = Usuario::where("permissao", $valor)->get();

        session(["resultado" => $usuarios]);

        return redirect()->back();
    }

    public function pesquisaDataNascimento(Request $request){
        $request->validate([
            "data" => "required"
        ], [
            "data.required" => "O campo data de nascimento é obrigatório"
        ]);

        $data = $request->input("data");
        $dataFormatada = \Carbon\Carbon::createFromFormat("d/m/Y", $data)->format("Y-m-d");
        $usuarios = Usuario::whereDate("data_nascimento", $dataFormatada)->get();

        session(["resultado" => $usuarios]);

        return redirect()->back();
    }

    public function pesquisaDataInicialFinal(Request $request){
        $request->validate([
            "data_inicial" => "required",
            "data_final" => "required"
        ], [
            "data_inicial.required" => "O campo data inicial é obrigatória",
            "data_final.required" => "O campo data final é obrigatória"
        ]);

        $dataInicial = \Carbon\Carbon::createFromFormat("d/m/Y", $request->input("data_inicial"))->format("Y-m-d");
        $dataFinal = \Carbon\Carbon::createFromFormat("d/m/Y", $request->input("data_final"))->format("Y-m-d");
        $usuarios = Usuario::whereBetween("data_nascimento", [$dataInicial, $dataFinal])->get();

        session(["resultado" => $usuarios]);

        return redirect()->back();
    }
}
