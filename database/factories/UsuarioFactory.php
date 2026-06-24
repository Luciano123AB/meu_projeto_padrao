<?php

namespace Database\Factories;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_completo' => $this->faker->name(),
            'usuario' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'senha' => Hash::make('@24032004ABcd123'),
            'cpf' => '123.456.789-' . $this->faker->unique()->numberBetween(0, 99),
            'data_nascimento' => $this->faker->date(),
            'celular' => '(55)99999-' . $this->faker->unique()->numberBetween(0, 9999),
            'genero' => $this->faker->randomElement([
                'Masculino',
                'Feminino',
                'Outro'
            ]),
            'foto' => 'vazio.png',
            'permissao' => 0,
            'created_at' => Carbon::now()
        ];
    }
}
