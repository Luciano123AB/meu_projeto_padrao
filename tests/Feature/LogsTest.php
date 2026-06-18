<?php

use App\Models\Log;
use App\Models\Usuario;
use Illuminate\Support\Facades\Crypt;

describe('testes do logs', function () {
    it('testar acesso ao logs', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/logs/' . Crypt::encrypt($usuario->id))->status())->toBe(200);
    });

    it('testar carregamento da view do logs', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/logs/' . Crypt::encrypt($usuario->id)))->assertViewIs('logs');
    });

    it('testar conteúdo do logs', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/logs/' . Crypt::encrypt($usuario->id)))->assertSee('Página');
    });

    it('testar exclusão do log', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);
        
        Log::factory()->create();

        $resultado = $this->get('/limpar-log/' . Crypt::encrypt(1));

        expect($resultado->status())->toBe(302);
    });

    it('testar limpeza dos logs', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->get('/limpar-logs/' . Crypt::encrypt(1));

        expect($resultado->status())->toBe(302);
    });
});
