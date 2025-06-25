<?php

namespace Database\Factories;

use App\Models\Stage;
use App\Models\Engine;
use App\Models\CelestialBody;
use App\Models\Rocket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stage>
 */
class StageFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Stage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $environment_zone = $this->faker->randomElement(['vacuum', 'atmosphere']);
        $booster = $environment_zone === 'atmosphere'
            ? $this->faker->optional()->randomElement([Engine::factory()->create()->id, null])
            : null;

        // This is temporary, larter i'll probably use service to calculate
        // parameters based on engine and environment
        return [
            'name' => $this->faker->word . ' Stage',
            'description' => $this->faker->sentence(3),
            'version' => $this->faker->randomFloat(2, 1.0, 3,0),
            'rocket_id' => Rocket::factory(),
            'stage_position' => 1,
            'engine_id' => Engine::factory(),
            'engine_count' => $this->faker->numberBetween(1, 6),
            'booster_id' => $booster,
            'booster_count' => $booster === null ? 0 : $this->faker->numberBetween(1, 6),
            'environment_zone' => $environment_zone,
            'celestial_body_id' => CelestialBody::factory(),
            'required_delta_v' => $this->faker->numberBetween(300, 10000),
            'twr' => $this->faker->randomFloat(2, 0.5, 3.0),
            'dry_mass' => $this->faker->randomFloat(2, 1000, 50000),
            'wet_mass' => $this->faker->randomFloat(2, 5000, 200000),
            'fuel_mass' => $this->faker->randomFloat(2, 1000, 150000),
            'cargo_mass' => $this->faker->numberBetween(100, 10000),
            'trust' => $this->faker->randomFloat(2, 1000, 5000),
        ];
    }

    /**
     * Indicate that the stage is a booster.
     * @param  array $rocket
     * @param  int   $position
     *
     * @return static
     */
    public function withRocket(array $rocket, int $position): static
    {
        return $this->state([
            'rocket_id' => $rocket['id'],
            'stage_position' => $position,
        ]);
    }
}
