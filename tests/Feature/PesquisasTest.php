<?php

use App\Models\Usuario;
use Carbon\Carbon;

describe('testes do pesquisa de usuários', function () {
    it('testar acesso ao pesquisa de usuários', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/pesquisa')->status())->toBe(200);
    });

    it('testar carregamento da view do pesquisa de usuários', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/pesquisa'))->assertViewIs('pesquisa');
    });

    it('testar conteúdo do pesquisa de usuários', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/pesquisa'))->assertSee('Digite um nome de usuário:');
    });

    it('testar pesquisa de usuário pelo nome', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->post('/pesquisa-usuario', [
            'usuario' => $usuario->usuario
        ]);

        expect($resultado->status())->toBe(302);
    });

    it('testar pesquisa de usuário pela data de nascimento', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->post('/pesquisa/data-nascimento', [
            'data_nascimento' => $usuario->data_nascimento
        ]);

        expect($resultado->status())->toBe(302);
    });

    it('testar pesquisa de usuário pelo status', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->post('/pesquisa-status', [
            'permissao' => $usuario->permissao
        ]);

        expect($resultado->status())->toBe(302);
    });

    it('testar pesquisa de usuário pela data inicial/final', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->post('/pesquisa/data-inicial-final', [
            'data_inicial' => Carbon::parse($usuario->data_nascimento)->format('d/m/Y'),
            'data_final' => Carbon::now()->format('d/m/Y')
        ]);

        expect($resultado->status())->toBe(302);
    });

    it('testar pesquisa de usuário pelo mês', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->post('/pesquisa-mes', [
            'mes' => '12'
        ]);

        expect($resultado->status())->toBe(302);
    });

    it('testar pesquisa de usuário pelo mês inicial/final', function () {
        
        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->post('/pesquisa/mes-inicial-final', [
            'mes_inicial' => Carbon::parse($usuario->data_nascimento)->format('d/m/Y'),
            'mes_final' => Carbon::now()->format('d/m/Y')
        ]);

        expect($resultado->status())->toBe(302);
    });
});
