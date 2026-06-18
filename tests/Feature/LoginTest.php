<?php

use App\Models\Usuario;

describe('testes do login', function () {
    it('testar acesso ao login', function () {
        expect($this->get('/')->status())->toBe(200);
    });

    it('testar carregamento da view do login', function () {
        expect($this->get('/'))->assertViewIs('auth.login');
    });

    it('testar conteúdo do login', function () {
        expect($this->get('/'))->assertSee('LOGIN');
    });

    it('testar login do usuário', function () {

        $usuario = Usuario::factory()->create();
        $resultado = $this->post('/login-submit', [
            'usuario' => $usuario->usuario,
            'senha' => $usuario->senha
        ]);

        expect($resultado->status())->toBe(302);
    });
});
