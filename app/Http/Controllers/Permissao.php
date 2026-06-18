<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\RedirectResponse;

class Permissao
{
    public function permissao($id): RedirectResponse {
        
        $usuario = Usuario::find(Operacoes::decryptId($id));

        session(['id' => $usuario->id]);

        $cor01 = 'success';
        $cor02 = 'danger';

        if (session('tema') == 'escuro') {

            $cor01 = 'secondary';
            $cor02 = 'dark';

        }

        return redirect()->back()->withInput()->with('alertaConfirmacao', [
            'icon' => 'warning',
            'title' => 'Atenção!',
            'text' => 'Tem certeza que deseja alterar a permissão deste usuário?',
            'rota' => 'permissaoConfirmar',
            'cor01' => "$cor01",
            'cor02' => "$cor02"
        ]);
    }

    public function permissaoConfirmar($id): RedirectResponse {
        
        $usuario = Usuario::find($id);

        if ($usuario->permissao == 0) {

            $usuario->permissao = 1;

            $usuario->save();
        } else {

            $usuario->permissao = 0;

            $usuario->save();            
        }
        
        session()->forget('id');

        if ($usuario) {

            $cor = 'info';

            if (session('tema') == 'escuro') {

                $cor = 'secondary';

            }

            return redirect()->back()->withInput()->with('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso!',
                'text' => 'Permissão do usuário alterada com êxito!',
                'cor' => "$cor"
            ]);
        }

        $cor = 'danger';

        if (session('tema') == 'escuro') {

            $cor = 'dark';

        }

        return redirect()->back()->withInput()->with('alerta', [
            'icon' => 'error',
            'title' => 'Erro!',
            'text' => 'Falha ao alterar a permissão do usuário! Tente novamente.',
            'cor' => "$cor"
        ]);
    }
}
