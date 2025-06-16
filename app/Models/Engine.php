<?php

namespace App\Models;

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
}
