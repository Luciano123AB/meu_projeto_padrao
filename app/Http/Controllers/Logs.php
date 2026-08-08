<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class Logs
{
    public function limparLogs($id): RedirectResponse {

        $logs = Usuario::find(Operacoes::decryptId($id));

        $logs->logs()->delete();

        if ($logs) {

            $cor = 'info';

            if (Cache::get('tema') === 'escuro') {

                $cor = 'secondary';

            }

            return redirect()->back()->withInput()->with('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso!',
                'text' => 'Logs limpos com êxito!',
                'cor' => "$cor"
            ]);
        }

        $cor = 'danger';

        if (Cache::get('tema') === 'escuro') {

            $cor = 'dark';

        }

        return redirect()->back()->withInput()->with('alerta', [
            'icon' => 'error',
            'title' => 'Erro!',
            'text' => 'Falha ao limpar os logs! Tente novamente.',
            'cor' => "$cor"
        ]);
    }

    public function limparLog($id): RedirectResponse {

        $log = Log::find(Operacoes::decryptId($id));

        $log->delete();

        if ($log) {

            $cor = 'info';

            if (Cache::get('tema') === 'escuro') {

                $cor = 'secondary';

            }

            return redirect()->back();
        }

        $cor = 'danger';

        if (Cache::get('tema') === 'escuro') {

            $cor = 'dark';

        }

        return redirect()->back()->withInput()->with('alerta', [
            'icon' => 'error',
            'title' => 'Erro!',
            'text' => 'Falha ao limpar os logs! Tente novamente.',
            'cor' => "$cor"
        ]);
    }
}
