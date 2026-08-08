<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class Tema
{
    public function trocarTema(): RedirectResponse {
        if (!Cache::has('tema')) {
            Cache::put('tema', 'escuro');

            return redirect()->back();
        } else {
            if (Cache::get('tema') === 'claro') {
                Cache::put('tema', 'escuro');

                return redirect()->back();
            }
            
            Cache::put('tema', 'claro');

            return redirect()->back();
        }
    }
}
