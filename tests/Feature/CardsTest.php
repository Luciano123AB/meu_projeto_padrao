<?php

use App\Models\Usuario;

describe('testes do cards de usuários', function () {
    it('testar acesso ao cards de usuários', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/cards')->status())->toBe(200);
    });

    it('testar carregamento da view do cards de usuários', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/cards'))->assertViewIs('cards');
    });

    it('testar conteúdo do cards de usuários', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/cards'))->assertSee('Informações');
    });
});
