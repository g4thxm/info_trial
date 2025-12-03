<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dojo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Files>
 */
class FilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => fake()->word(),
            'size' => fake()->numberBetween(1, 23),
            'type' => fake()->fileExtension(),
            'dojo_id' => Dojo::inRandomOrder()->first()->id
        ];
    }
}
