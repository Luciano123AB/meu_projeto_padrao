<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PesquisarBuscar
{
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

    public function pesquisaMes(Request $request) {
        $request->validate([
            "mes" => "required"
        ], [
            "mes.required" => "O campo mês é obrigatório"
        ]);

        $mes = $request->input("mes");
        $ultimoAno = DB::table("usuarios")
                       ->selectRaw("YEAR(created_at) as ano")
                       ->orderByDesc("ano")
                       ->limit(1)
                       ->value("ano");
        $inicio = "$ultimoAno-$mes-01";
        $fim = date("Y-m-d", strtotime("+1 month", strtotime($inicio)));
        $usuarios = Usuario::whereBetween("created_at", [$inicio, $fim])->get();

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

    public function pesquisaMesInicialFinal(Request $request){
        $request->validate([
            "mes_inicial_cadastros" => "required",
            "mes_final_cadastros" => "required"
        ], [
            "mes_inicial_cadastros.required" => "O campo mês inicial é obrigatória",
            "mes_final_cadastros.required" => "O campo mês final é obrigatória"
        ]);

        $mesInicial = $request->input("mes_inicial_cadastros");
        $mesFinal = $request->input("mes_final_cadastros");
        $ultimoAno = DB::table("usuarios")
                       ->selectRaw("YEAR(created_at) as ano")
                       ->orderByDesc("ano")
                       ->limit(1)
                       ->value("ano");
        $usuarios = Usuario::whereBetween("created_at", ["$ultimoAno/$mesInicial/01", "$ultimoAno/$mesFinal/01"])->get();

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

    public function buscar(Request $request) {
        $request->validate(
            [
                "cep" => "required|min:9"
            ],

            [
                "cep.required" => "O campo CEP é obrigatório",
                "cep.min" => "O campo CEP deve ter pelo menos 9 caracteres"
            ]
        );

        $cep = $request->input("cep");

        $dados = [
            'logradouro' => '',
            'bairro' => '',
            'cidade' => '',
            'estado' => '',
            'link' => '',
            'erro' => false
        ];

        if ($cep) {

            $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

            if ($response->successful() && !isset($response['erro'])) {

                $dados['logradouro'] = $response['logradouro'] ?? '';
                $dados['bairro'] = $response['bairro'] ?? '';
                $dados['cidade'] = $response['localidade'] ?? '';
                $dados['estado'] = $response['uf'] ?? '';
                $dados['link'] = 'https://www.google.com/maps/place/' . urlencode(
                    $dados['logradouro'] . ',' . $dados['bairro'] . ',' . $dados['cidade'] . '+' . $dados['estado']
                );

            } else {

                $dados['erro'] = true;

                return redirect()->back()->withInput()->with("cepInvalido", "Não foi possível encontrar este CEP! Tente novamente");
            }
        }

        return view('endereco', compact('dados', 'cep'));
    }

    public function consultar(Request $request) {
        $request->validate([
            'cnpj' => 'required|min:18',
        ],
    
        [
            "required" => "O campo CNPJ é obrigatório",
            "min" => "O campo CNPJ deve ter pelo menos 18 caracteres",
        ]);

        $cnpj = preg_replace('/\D/', '', $request->input("cnpj"));

        $dados = [
            'razao_social' => '',
            'nome_fantasia' => '',
            'cnae_fiscal_descricao' => '',
            'municipio' => '',
            'uf' => '',
            'descricao_situacao_cadastral' => '',
            'erro' => false
        ];

        if ($cnpj) {

            $response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$cnpj}");

            if ($response->successful() && !isset($response['erro'])) {

                $dados['razao_social'] = $response['razao_social'] ?? '';
                $dados['nome_fantasia'] = $response['nome_fantasia'] ?? '';
                $dados['cnae_fiscal_descricao'] = $response['cnae_fiscal_descricao'] ?? '';
                $dados['municipio'] = $response['municipio'] ?? '';
                $dados['uf'] = $response['uf'] ?? '';
                $dados['descricao_situacao_cadastral'] = $response['descricao_situacao_cadastral'] ?? '';

            } else {

                $dados['erro'] = true;

                return redirect()->back()->withInput()->with("cnpjInvalido", "Não foi possível consultar este CNPJ! Tente novamente");
            }
        }

        return view('endereco', compact('dados', 'cnpj'));
    }
}
