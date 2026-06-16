<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Croquette extends Model
{
    protected $fillable = [
        'tag',
        'title',
        'description',
        'image',
        'image_alt',
        'protein',
        'fat',
        'taurine',
        'composition',
        'analytical_components',
        'nutritional_additives',
        'technological_additives',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
