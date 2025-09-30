<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PesquisarBuscar
{
    public function pesquisa() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

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

        if ($usuarios) {
            session(["resultado" => $usuarios]);
    
            return redirect()->back();            
        } else {

            $cor = "danger";

            if (session("tema") == "escuro") {

                $cor = "dark";

            }

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao realizar a pesquisa! Tente novamente.",
                "cor" => "$cor"
            ]);
        }
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

        if ($usuarios) {
            session(["resultado" => $usuarios]);
    
            return redirect()->back();            
        } else {

            $cor = "danger";

            if (session("tema") == "escuro") {

                $cor = "dark";

            }

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao realizar a pesquisa! Tente novamente.",
                "cor" => "$cor"
            ]);
        }
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

        if ($usuarios) {
            session(["resultado" => $usuarios]);
    
            return redirect()->back();            
        } else {

            $cor = "danger";

            if (session("tema") == "escuro") {

                $cor = "dark";

            }

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao realizar a pesquisa! Tente novamente.",
                "cor" => "$cor"
            ]);
        }
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

        if ($usuarios) {
            session(["resultado" => $usuarios]);
    
            return redirect()->back();            
        } else {

            $cor = "danger";

            if (session("tema") == "escuro") {

                $cor = "dark";

            }

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "error",
                "title" => "Erro!",
                "text" => "Falha ao realizar a pesquisa! Tente novamente.",
                "cor" => "$cor"
            ]);
        }
    }

    public function buscar($cep) {
        
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->successful() && !isset($response['erro'])) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'CEP inválido ou não encontrado'], 404);
    }

    public function consultar(Request $request) {

        $cnpj = preg_replace('/\D/', '', $request->cnpj);

        $request->merge(['cnpj' => $cnpj]);

        $request->validate([
            'cnpj' => 'required|digits:14',
        ],
    
        [
            "required" => "O campo nome é obrigatório",
            "digits" => "O campo CNPJ deve ter pelo menos 14 caracteres.",
        ]);

        try {

            $response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$request->cnpj}");

            if ($response->failed()) {
                return back()->withErrors(['cnpj' => 'Não foi possível consultar este CNPJ']);
            }

            $empresa = $response->json();

            return view('endereco', compact('empresa'));
        } catch (\Exception $e) {
            return back()->withErrors(['cnpj' => 'Erro na consulta: ' . $e->getMessage()]);
        }
    }
}
