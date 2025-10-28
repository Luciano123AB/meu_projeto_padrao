<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Boot;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class MainController
{
    public function login(): View {

        $banco = Boot::testarConexao();
        
        if ($banco == false) {
            Boot::criarPovoarBanco();
        }

        if (!is_dir(base_path("node_modules"))) {
            Boot::dependencias();
        }

        return view("login");
    }
    
    public function cadastro(): View {
        return view("cadastro");
    }

    public function update($id): View {
        Operacoes::salvarLog(session("usuario.id"));

        $id = Operacoes::decryptId($id);
        $usuario = Usuario::find($id);

        return view("update", ["usuario" => $usuario]);
    }

    public function home(): View {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("home");
    }

    public function tabela(): View {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards(): View {

        $id = session("usuario.id");
        
        Operacoes::salvarLog($id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }

    public function dashboard(): View {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        $usuarios = Usuario::where("usuario", "!=", "Administrador")->get();
        $permitidos = $usuarios->where("permissao", 1)->count();
        $negados = $usuarios->where("permissao", 0)->count();
        $total = $usuarios->count();
        $porcentagemPermitidos = $total > 0 ? round(($permitidos / $total) * 100) : 0;
        $porcentagemNegados = $total > 0 ? round(($negados / $total) * 100) : 0;

        return view("dashboard", [
            "total" => $total,
            "permitidos" => $permitidos,
            "negados" => $negados,
            "porcentagemPermitidos" => $porcentagemPermitidos,
            "porcentagemNegados" => $porcentagemNegados
        ]);
    }

    public function logs($id): View {

        $id = Operacoes::decryptId($id);
        $logs = Usuario::find($id)->logs()->whereNull("deleted_at")->get()->toArray();

        return view("logs", ["logs" => $logs]);
    }

    public function pesquisa(): View {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("pesquisa");
    }

    public function endereco(): View {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("endereco");
    }

    public function importarExportar(): View {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("importar_exportar");
    }
}
