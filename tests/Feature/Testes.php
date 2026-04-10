<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class Testes extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;

    public function test_cria_usuario_com_sucesso()
    {
        $dados = [
            'nome_completo' => 'Luciano Silva',
            'usuario' => 'luciano123',
            'email' => 'luciano@email.com',
            'senha' => Hash::make('123456'),
            'cpf' => '123.456.789-00',
            'data_nascimento' => '1995-05-10',
            'celular' => '(51)99999-9999',
            'genero' => 'Masculino',
            'foto' => null,
            'permissao' => 0,
            'ultimo_acesso' => now(),
        ];

        DB::table('usuarios')->insert($dados);

        $this->assertDatabaseHas('usuarios', [
            'email' => 'luciano@email.com',
            'usuario' => 'luciano123',
        ]);
    }
}