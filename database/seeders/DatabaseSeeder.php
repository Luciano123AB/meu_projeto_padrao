<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nome_completo' => 'Admin',
                'usuario' => 'Administrador',
                'email' => 'admin@gmail.com',
                'senha' => Hash::make('@24032004ABcd123'),
                'cpf' => '000.000.000-00',
                'data_nascimento' => '2025-01-01',
                'celular' => '(99)99999-9999',
                'genero' => 'Masculino',
                'foto' => 'vazio.png',
                'permissao' => 1,
                'created_at' => Carbon::now()
            ]
        ]);

        Usuario::factory(10)->create();
    }
}
