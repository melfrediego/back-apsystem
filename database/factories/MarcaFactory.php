<?php

namespace Database\Factories;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marca>
 */
class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->company(),
            'descricao' => fake()->paragraph(),
            'ativo' => fake()->randomElement(['S', 'N']),
            'destaque' => fake()->randomElement(['S', 'N']),
            'logo' => 'logos/default-logo.jpg', // Altere para o caminho adequado ou deixe vazio se não quiser incluir uma imagem
            'seo_url' => 'https://www.lojaana.com',
        ];
    }
}
