<?php

namespace App\Services;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

class Operacoes
{
    public static function validarCpf($cpf) {

        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        $cpf_array = str_split($cpf);
        $soma1 = 0;

        for ($i = 0; $i < 9; $i++) {
            $soma1 += $cpf_array[$i] * (10 - $i);
        }

        $resto1 = $soma1 % 11;
        $digito1 = $resto1 < 2 ? 0 : 11 - $resto1;
        $soma2 = 0;

        for ($i = 0; $i < 10; $i++) {
            $soma2 += $cpf_array[$i] * (11 - $i);
        }

        $resto2 = $soma2 % 11;
        $digito2 = $resto2 < 2 ? 0 : 11 - $resto2;

        if ($cpf_array[9] == $digito1 && $cpf_array[10] == $digito2) {
            return true;
        } else {
            return false;
        }
    }

    public static function decryptId($value) {
        try {
            
            $value = Crypt::decrypt($value);
            
        } catch (DecryptException $e) {
            return redirect()->route("home");
        }

        return $value;
    }

    public static function salvarLog($id) {
        
        $pagina = Route::currentRouteName();
        $log = new Log();
        $log->usuario_id = $id;
        $log->pagina = "$pagina";
        $log->data_hora = Carbon::now();        

        $log->save();
    }
}