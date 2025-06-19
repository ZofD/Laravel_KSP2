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
     * Get the stages that use this engine.
     *
     * @return HasMany<Stage>
     */
    public function stagesUsedWithEngine(): HasMany
    {
        return $this->hasMany(Stage::class, 'engine_id');
    }

    /**
     * Get the stage that use this booster.
     *
     * @return HasMany<Stage>
     */
    public function stagesUsedWithBooster(): HasMany
    {
        return $this->hasMany(Stage::class, 'booster_id');
    }

    /**
     * Get the stages that use this engine or booster.
     *
     * @return Collection<Stage>
     */
    public function allStagesUsedIn(): Collection
    {
        return $this->stagesUsedWithEngine->merge($this->stagesUsedWithBooster);
        return $this->hasMany(Stage::class, 'engine_id')
            ->orWhere('booster_id', $this->id);
    }
}
