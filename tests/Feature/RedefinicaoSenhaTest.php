<?php

use App\Models\Usuario;

describe('testes do redefinir de senha', function () {
    it('testar acesso ao redefinir senha', function () {

        $usuario = Usuario::factory()->create();

        $this->actingAs($usuario);

        expect($this->get('/mudar-senha')->status())->toBe(200);
    });

    it('testar carregamento da view do redefinir senha', function () {
        
        $usuario = Usuario::factory()->create();

        $this->actingAs($usuario);

        expect($this->get('/mudar-senha'))->assertViewIs('auth.mudar_senha');
    });

    it('testar conteúdo do redefinir senha', function () {
        
        $usuario = Usuario::factory()->create();

        $this->actingAs($usuario);

        expect($this->get('/mudar-senha'))->assertSee('ATUALIZAR SENHA');
    });

    it('testar redefinição de senha', function () {
        
        $usuario = Usuario::factory()->create();

        $this->actingAs($usuario);

        $resultado = $this->post('/mudar-senha-submit', [
            'senha_atual' => $usuario->senha,
            'nova_senha' => $usuario->senha,
            'confirmar_senha' => $usuario->senha
        ]);

        expect($resultado->status())->toBe(302);
    });
});
