<?php

namespace Database\Factories;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => 1,
            'pagina' => 'Dashboard',
            'data_hora' => Carbon::now()
        ];
    }
}
