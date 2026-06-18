<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Crypt;

describe('testes do editar', function () {
    it('testar acesso ao editar', function () {

        $usuario = Usuario::factory()->create();

        $this->actingAs($usuario);

        expect($this->get('/update/' . Crypt::encrypt($usuario->id))->status())->toBe(200);
    });

    it('testar carregamento da view do editar', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/update/' . Crypt::encrypt($usuario->id)))->assertViewIs('auth.update');
    });

    it('testar conteúdo do editar', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        expect($this->get('/update/' . Crypt::encrypt($usuario->id)))->assertSee('ATUALIZAR');
    });

    it('testar edição do usuário', function () {

        $usuario = Usuario::factory()->create();

        $this->actingAs($usuario);

        $resultado = $this->post('/update-submit', [
            'nome_completo' => $usuario->nome_completo,
            'usuario' => $usuario->usuario,
            'email' => $usuario->email,
            'celular' => $usuario->celular,
            'foto' => $usuario->foto
        ]);

        expect($resultado->status())->toBe(302);
    });
});
