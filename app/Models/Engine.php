<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    /** @use HasFactory<\Database\Factories\EngineFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $fillable = [
        'name',
        'image',
        'trustAtmo',
        'trustVacu',
        'ispAtmo',
        'ispVacu',
        'weight',
        'size',
        'fuel',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'trustAtmo' => 'float',
        'trustVacu' => 'float',
        'ispAtmo'   => 'float',
        'ispVacu'   => 'float',
        'weight'    => 'integer',
    ];

    /**
     * Get the rockets that use this engine.
     *
     * @return HasMany<Rocket>
     */
    public function rocketsUsedWithEngine(): HasMany
    {
        return $this->hasMany(Rocket::class, 'engine_id');
    }

    /**
     * Get the rocket that use this booster.
     *
     * @return HasMany<Rocket>
     */
    public function rocketsUsedWithBooster(): HasMany
    {
        return $this->hasMany(Rocket::class, 'booster_id');
    }

    /**
     * Get the rockets that use this engine or booster.
     *
     * @return Collection<Rocket>
     */
    public function allRocketsUsedIn(): Collection
    {
        return $this->rocketsUsedWithEngine->merge($this->rocketsUsedWithBooster);
        return $this->hasMany(Rocket::class, 'engine_id')
            ->orWhere('booster_id', $this->id);
    }
}
