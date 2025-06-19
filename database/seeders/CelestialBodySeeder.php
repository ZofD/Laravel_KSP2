<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CelestialBody;

class CelestialBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/celestial_bodies.json');
        $data = json_decode(file_get_contents($path), true);

        foreach ($data as $item) {
            CelestialBody::create($item);
        }
        // CelestialBody::insert($data);
    }
}
