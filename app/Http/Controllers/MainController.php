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

    public function home(): View {

        $pagina = 'Home';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        return view('home')->with('pagina', $pagina);
    }

    public function update($id): View {

        $pagina = 'Atualização';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        $usuario = Usuario::find(Operacoes::decryptId($id));

        return view('auth.update', ['usuario' => $usuario])->with('pagina', $pagina);
    }

    public function mudarSenha(): View {

        $pagina = 'Redefinir Senha';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        return view('auth.mudar_senha')->with('pagina', $pagina);
    }

    public function tabela(): View {

        $pagina = 'Tabela';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        $usuarios = Usuario::all()->whereNull('deleted_at')
                                  ->whereNotInStrict('usuario', 'Administrador');

        return view('tabela', ['usuarios' => $usuarios])->with('pagina', $pagina);
    }

    public function cards(): View {

        $pagina = 'Cards';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        $usuarios = Usuario::all()->whereNull('deleted_at')
                                  ->whereNotInStrict('usuario', 'Administrador');

        return view('cards', ['usuarios' => $usuarios])->with('pagina', $pagina);
    }

    public function dashboard(): View {

        $pagina = 'Dashboard';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

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
        ])->with('pagina', $pagina);
    }

    public function logs($id): View {

        $logs = Usuario::find(Operacoes::decryptId($id))->logs()->whereNull('deleted_at')->get()->toArray();

        return view('logs', ['logs' => $logs])->with('pagina', 'Logs');
    }

    public function pesquisa(): View {

        $pagina = 'Pesquisas';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        return view('pesquisa')->with('pagina', $pagina);
    }

    public function endereco(): View {

        $pagina = 'Localização';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        return view('endereco')->with('pagina', $pagina);
    }

    public function importarExportar(): View {

        $pagina = 'Importar / Exportar';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

        return view('importar_exportar')->with('pagina', $pagina);
    }

    public function arquivos(): View {

        $pagina = 'Arquivos';

        Operacoes::salvarLog(Auth::user()->id, $pagina);

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

        return view('arquivos', compact('dados_arquivos'))->with('pagina', $pagina);
    }
}
