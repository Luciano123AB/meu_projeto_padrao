<?php

use App\Models\Usuario;

describe('testes da dashboard', function () {
    it('testar acesso à dashboard', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/dashboard')->status())->toBe(200);
    });

    it('testar carregamento da view da dashboard', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/dashboard'))->assertViewIs('dashboard');
    });

    it('testar conteúdo da dashboard', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/dashboard'))->assertSee('Total de Usuários');
    });
});
