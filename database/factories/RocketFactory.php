<?php

namespace Database\Factories;

use App\Models\Rocket;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rocket>
 */
class RocketFactory extends Factory
{

    protected $model = Rocket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
        ];
    }

    public function withStages(): array
    {
        $rocket = $this->definition();
        foreach ($this->faker()->numberBetween(1, 4) as $count) {
            Stage::factory()->withRocket($rocket, $count)->create();
        }

        return $rocket;
    }
}
