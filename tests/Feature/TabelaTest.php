<?php

use App\Models\Usuario;

describe('testes do tabela de usuários', function () {
    it('testar acesso ao tabela de usuários', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/tabela')->status())->toBe(200);
    });

    it('testar carregamento da view do tabela de usuários', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/tabela'))->assertViewIs('tabela');
    });

    it('testar conteúdo do tabela de usuários', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/tabela'))->assertSee('Nome');
    });
});
