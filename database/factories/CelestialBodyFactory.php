<?php

namespace Database\Factories;

use App\Models\CelestialBody;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CelestialBody>
 */
class CelestialBodyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = CelestialBody::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'has_atmosphere' => $this->faker->boolean(20), // 20% szans na atmosferę
            'surfaceGravity' => $this->faker->randomFloat(2, 0.1, 17), // np. od 0.1g do 25g
            'image' => $this->faker->imageUrl(640, 480, 'space', true, 'planet'), // lub własne ścieżki
            'description' => $this->faker->paragraph(3),
        ];
    }
}
