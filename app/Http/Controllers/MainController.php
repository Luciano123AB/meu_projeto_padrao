<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Boot;
use App\Services\Operacoes;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController
{
    public function login(): View {
        if (Boot::testarConexao() == false) {
            Boot::criarPovoarBanco();
        }

        if (!is_dir(base_path("node_modules"))) {
            Boot::dependencias();
        }

        return view("auth.login");
    }
    
    public function cadastro(): View {
        return view("auth.cadastro");
    }

    public function update($id): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuario = Usuario::find(Operacoes::decryptId($id));

        return view("auth.update", ["usuario" => $usuario]);
    }

    public function mudarSenha(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view("auth.mudar_senha");
    }

    public function home(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view("home");
    }

    public function tabela(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }

    public function dashboard(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuarios = Usuario::where("usuario", "!=", "Administrador")->get();
        $permitidos = $usuarios->where("permissao", 1)->count();
        $negados = $usuarios->where("permissao", 0)->count();
        $total = $usuarios->count();

        return view("dashboard", [
            "total" => $total,
            "permitidos" => $permitidos,
            "negados" => $negados,
            "porcentagemPermitidos" => $total > 0 ? round(($permitidos / $total) * 100) : 0,
            "porcentagemNegados" => $total > 0 ? round(($negados / $total) * 100) : 0
        ]);
    }

    public function logs($id): View {

        $logs = Usuario::find(Operacoes::decryptId($id))->logs()->whereNull("deleted_at")->get()->toArray();

        return view("logs", ["logs" => $logs]);
    }

    public function pesquisa(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view("pesquisa");
    }

    public function endereco(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view("endereco");
    }

    public function importarExportar(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view("importar_exportar");
    }
}
