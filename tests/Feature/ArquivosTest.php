<?php

use App\Models\Usuario;

describe('testes do arquivos', function () {
    it('testar acesso ao arquivos', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/arquivos')->status())->toBe(200);
    });

    it('testar carregamento da view do arquivos', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/arquivos'))->assertViewIs('arquivos');
    });

    it('testar conteúdo do arquivos', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/arquivos'))->assertSee('Tamanho(Kb)');
    });
});
