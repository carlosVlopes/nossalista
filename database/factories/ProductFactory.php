<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria' => $this->faker->randomElement(['Cozinha & Mesa', 'Quarto & Aconchego', 'Sala & Casa', 'Banho & Bem-estar']),
            'nome' => $this->faker->words(3, true),
            'descricao' => $this->faker->sentence(),
            'imagem' => null,
            'link' => $this->faker->optional()->url(),
            'status' => ProductStatus::Disponivel,
            'ordem' => $this->faker->numberBetween(1, 100),
        ];
    }

    public function reservado(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => ProductStatus::Reservado,
        ]);
    }

    public function oculto(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => ProductStatus::Oculto,
        ]);
    }
}
