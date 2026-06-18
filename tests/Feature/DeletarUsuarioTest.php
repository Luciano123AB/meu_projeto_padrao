<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Crypt;

describe('testes do deletar usuário', function () {
    it('testar deleção do usuário', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->get('/deletar/' . Crypt::encrypt($usuario->id));

        if ($resultado->status() == 302) {

            $resultado_confirmar = $this->get('/deletar-confirmar/' . Crypt::encrypt($usuario->id));

            expect($resultado_confirmar->status())->toBe(302);
        }
    });
});
