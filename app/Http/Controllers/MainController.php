<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Boot;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class MainController
{
    public function login() {
        if (!session("boot")) {
            Boot::comandos();
        }

        return view("login");
    }
    
    public function cadastro() {
        return view("cadastro");
    }

    public function update($id) {
        Operacoes::salvarLog(session("usuario.id"));

        $id = Operacoes::decryptId($id);
        $usuario = Usuario::find($id);

        return view("update", ["usuario" => $usuario]);
    }

    public function home() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("home");
    }

    public function tabela() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("tabela", ["usuarios" => $usuarios]);
    }

    public function cards() {

        $id = session("usuario.id");
        
        Operacoes::salvarLog($id);

        $usuarios = Usuario::all()->whereNull("deleted_at")
                                  ->whereNotInStrict("usuario", "Administrador");

        return view("cards", ["usuarios" => $usuarios]);
    }

    public function dashboard() {

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

    public function logs($id) {

        $id = Operacoes::decryptId($id);
        $logs = Usuario::find($id)->logs()->whereNull("deleted_at")->get()->toArray();

        return view("logs", ["logs" => $logs]);
    }

    public function pesquisa() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("pesquisa");
    }

    public function endereco() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("endereco");
    }

    public function importarExportar() {

        $id = session("usuario.id");

        Operacoes::salvarLog($id);

        return view("importar_exportar");
    }
}
