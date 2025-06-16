<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rocket extends Model
{
    /** @use HasFactory<\Database\Factories\RocketFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $fillable = [
        'name',
        'engine_id',
        'engine_count',
        'booster_id',
        'booster_count',
        'environment_zone',
        'celestial_body_id',
        'required_delta_v',
        'twr',
        'dry_mass',
        'wet_mass',
        'fuel_mass',
        'cargo_mass',
        'trust',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'engine_id'         => 'integer',
        'engine_count'      => 'integer',
        'booster_id'        => 'integer',
        'booster_count'     => 'integer',
        'required_delta_v'  => 'integer',
        'twr'               => 'float',
        'dry_mass'          => 'float',
        'wet_mass'          => 'float',
        'fuel_mass'         => 'float',
        'cargo_mass'        => 'integer',
        'trust'             => 'float',
    ];

    /**
     * Get the engine associated with the rocket.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Engine, Rocket>
     */
    public function engine()
    {
        return $this->belongsTo(Engine::class, 'engine_id');
    }

    /**
     * Get the booster engine associated with the rocket.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Engine, Rocket>
     */  
    public function booster()
    {
        return $this->belongsTo(Engine::class, 'booster_id');
    }

    /**
     * Get the celestial body associated with the rocket.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<CelestialBody, Rocket>
     */
    public function celestialBody()
    {
        return $this->belongsTo(CelestialBody::class, 'celestial_body_id');
    }
}
