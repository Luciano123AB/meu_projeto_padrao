<?php

use App\Models\Usuario;

describe('testes do cadastro', function () {
    it('testar acesso ao cadastro', function () {
        expect($this->get('/cadastro')->status())->toBe(200);
    });

    it('testar carregamento da view do cadastro', function () {
        expect($this->get('/cadastro'))->assertViewIs('auth.cadastro');
    });

    it('testar conteúdo do cadastro', function () {
        expect($this->get('/cadastro'))->assertSee('CADASTRO');
    });

    it('testar cadastro do usuário', function () {

        $usuario = Usuario::factory()->create();
        $resultado = $this->post('/cadastro-submit', [
            'nome_completo' => $usuario->nome_completo,
            'usuario' => $usuario->usuario,
            'email' => $usuario->email,
            'cpf' => $usuario->cpf,
            'senha' => $usuario->senha,
            'confirmar_senha' => $usuario->senha,
            'data_nascimento' => $usuario->data_nascimento,
            'celular' => $usuario->celular,
            'genero' => $usuario->genero,
            'foto' => $usuario->foto
        ]);

        expect($resultado->status())->toBe(302);
    });
});
