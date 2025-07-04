<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rocket extends Model
{
    /** @use HasFactory<\Database\Factories\RocketFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
}
