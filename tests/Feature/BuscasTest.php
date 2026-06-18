<?php

use App\Models\Usuario;

describe('testes do buscar endereço', function () {
    it('testar acesso ao buscar endereço', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/endereco')->status())->toBe(200);
    });

    it('testar carregamento da view do buscar endereço', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/endereco'))->assertViewIs('endereco');
    });

    it('testar conteúdo do buscar endereço', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/endereco'))->assertSee('Busca de CEP');
    });

    it('testar busca de endereço pelo CEP', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->get('/cep', [
            'cep' => '97010-040'
        ]);

        expect($resultado->status())->toBe(302);
    });

    it('testar busca de endereço pelo CNPJ', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->get('/cnpj', [
            'cnpj' => '03.486.598/0001-69'
        ]);

        expect($resultado->status())->toBe(302);
    });
});
