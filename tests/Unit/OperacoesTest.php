<?php

use App\Services\Operacoes;
use Illuminate\Support\Facades\Crypt;

describe('testes do Operacoes', function () {
    it('testar validação de CPF', function () {
        
        $cpf = preg_replace('/\D/', '', '121.098.019-30');
        $resultado = Operacoes::validarCpf($cpf);

        expect($resultado)->toBeTrue();
    });

    it('testar decriptografia de ID', function () {
        
        $id = Crypt::encrypt(1);
        $resultado = Operacoes::decryptId($id);

        expect($resultado)->toBe(1);
    });

    it('testar salvamento de log', function () {
        
        $id = 1;
        $resultado = Operacoes::salvarLog($id, 'Home');
        
        expect($resultado)->toBeNull();
    });
});