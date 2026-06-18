<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Boot;
use App\Services\Operacoes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MainController
{
    public function login(): View {
        if (Boot::testarConexao() == false) {
            Boot::criarPovoarBanco();
        }

        if (!is_dir(base_path('node_modules'))) {
            Boot::dependencias();
        }

        return view('auth.login')->with('pagina', 'Login');
    }
    
    public function cadastro(): View {
        return view('auth.cadastro')->with('pagina', 'Cadastro');
    }

    public function update($id): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuario = Usuario::find(Operacoes::decryptId($id));

        return view('auth.update', ['usuario' => $usuario])->with('pagina', 'Atualização');
    }

    public function mudarSenha(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view('auth.mudar_senha')->with('pagina', 'Redefinir Senha');
    }

    public function home(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view('home')->with('pagina', 'Home');
    }

    public function tabela(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuarios = Usuario::all()->whereNull('deleted_at')
                                  ->whereNotInStrict('usuario', 'Administrador');

        return view('tabela', ['usuarios' => $usuarios])->with('pagina', 'Tabela');
    }

    public function cards(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuarios = Usuario::all()->whereNull('deleted_at')
                                  ->whereNotInStrict('usuario', 'Administrador');

        return view('cards', ['usuarios' => $usuarios])->with('pagina', 'Cards');
    }

    public function dashboard(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $usuarios = Usuario::where('usuario', '!=', 'Administrador')->get();
        $permitidos = $usuarios->where('permissao', 1)->count();
        $negados = $usuarios->where('permissao', 0)->count();
        $total = $usuarios->count();

        return view('dashboard', [
            'total' => $total,
            'permitidos' => $permitidos,
            'negados' => $negados,
            'porcentagemPermitidos' => $total > 0 ? round(($permitidos / $total) * 100) : 0,
            'porcentagemNegados' => $total > 0 ? round(($negados / $total) * 100) : 0
        ])->with('pagina', 'Dashboard');
    }

    public function logs($id): View {

        $logs = Usuario::find(Operacoes::decryptId($id))->logs()->whereNull('deleted_at')->get()->toArray();

        return view('logs', ['logs' => $logs])->with('pagina', 'Logs');
    }

    public function pesquisa(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view('pesquisa')->with('pagina', 'Pesquisas');
    }

    public function endereco(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view('endereco')->with('pagina', 'Localização');
    }

    public function importarExportar(): View {
        Operacoes::salvarLog(Auth::user()->id);

        return view('importar_exportar')->with('pagina', 'Importar/Exportar');
    }

    public function arquivos(): View {
        Operacoes::salvarLog(Auth::user()->id);

        $disco = Storage::disk('arquivos');
        $arquivos = $disco->allFiles();
        $dados_arquivos = [];

        foreach ($arquivos as $arquivo) {
            $dados_arquivos[] = [
                'arquivo' => $arquivo,
                'nome' => basename($arquivo),
                'tamanho' => round($disco->size($arquivo) / 1024, 2),
                'tipo' => $disco->mimeType($arquivo),
                'data' => Carbon::createFromTimestamp($disco->lastModified($arquivo))->format('d-m-Y H:i:s')
            ];
        }

        return view('arquivos', compact('dados_arquivos'))->with('pagina', 'Arquivos');
    }
}
