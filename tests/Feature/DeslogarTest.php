<?php

use App\Models\Usuario;

describe('teste do deslogue', function () {
    it('testar deslogue do usuário', function () {

        $usuario = Usuario::factory()->create();
        
        $this->actingAs($usuario);

        $resultado = $this->get('/logout');

        expect($resultado->status())->toBe(302);
    });
});
