<?php

use App\Models\Usuario;

describe('testes do home', function () {
    it('testar acesso ao home', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/home')->status())->toBe(200);
    });

    it('testar carregamento da view do home', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/home'))->assertViewIs('home');
    });

    it('testar conteúdo do home', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/home'))->assertSee('Seja BEM VINDO ao Nosso Site!');
    });
});
