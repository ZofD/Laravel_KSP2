<?php

namespace Database\Factories;

use App\Models\Engine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Engine>
 */
class EngineFactory extends Factory
{

    protected $model = Engine::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word . ' Engine',
            'image' => 'engines/' . $this->faker->imageUrl(640, 480, 'engine', true, 'engine'),
            'trustAtmo' => $this->faker->randomFloat(2, 100, 1000), // kN
            'trustVacu' => $this->faker->randomFloat(2, 100, 1200), // kN
            'ispAtmo' => $this->faker->randomFloat(2, 250, 350),
            'ispVacu' => $this->faker->randomFloat(2, 300, 450),
            'weight' => $this->faker->numberBetween(500, 5000), // kg
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'fuel' => $this->faker->randomElement(['Metaloks', 'Booster', 'Monopropellant', 'Xenon', 'Nuclear']),
        ];
    }
}
