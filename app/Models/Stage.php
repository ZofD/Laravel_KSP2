<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /** @use HasFactory<\Database\Factories\StageFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $fillable = [
        'name',
        'description',
        'version',
        'rocket_id',
        'stage_position',
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
        'rocket_id'         => 'integer',
        'stage_position'    => 'integer',
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
     * Get the engine associated with the stage.
     *
     * @return BelongsTo<Engine, Stage>
     */
    public function engine(): BelongsTo
    {
        return $this->belongsTo(Engine::class, 'engine_id');
    }

    /**
     * Get the booster engine associated with the stage.
     *
     * @return BelongsTo<Engine, Stage>
     */
    public function booster(): BelongsTo
    {
        return $this->belongsTo(Engine::class, 'booster_id');
    }

    /**
     * Get the rocket associated with the stage.
     *
     * @return BelongsTo<Rocket, Stage>
     */
    public function rocket(): BelongsTo
    {
        return $this->belongsTo(Rocket::class, 'rocket_id');
    }

    /**
     * Get the celestial body associated with the stage.
     *
     * @return BelongsTo<CelestialBody, Stage>
     */
    public function celestialBody(): BelongsTo
    {
        return $this->belongsTo(CelestialBody::class, 'celestial_body_id');
    }
}
