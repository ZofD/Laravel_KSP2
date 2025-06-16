<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CelestialBody extends Model
{
    /** @use HasFactory<\Database\Factories\CelestialBodyFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $fillable = [
        'name',
        'has_atmosphere',
        'surfaceGravity',
        'image',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'has_atmosphere' => 'boolean',
        'surfaceGravity' => 'float',
    ];
}
