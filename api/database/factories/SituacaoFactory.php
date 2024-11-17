<?php

namespace Database\Factories;

use App\Models\Situacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Situacao>
 */
class SituacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => mb_substr(fake()->word(), 0, 100),
        ];
    }
}
