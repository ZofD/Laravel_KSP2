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

        if (!$data) {
            dd('Błąd dekodowania JSON', json_last_error_msg());
        }

        // Debug: ile rekordów i przykładowy rekord
        info('Liczba rekordów: ' . count($data));
        info('Pierwszy rekord:', $data[0] ?? []);

        CelestialBody::insert($data);
    }
}
