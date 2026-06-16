<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatImage extends Model
{
    protected $fillable = [
        'cat_id',
        'path',
        'alt',
        'original_name',
        'is_main',
        'sort_order',
        'position_x',
        'position_y',
        'zoom',
    ];

    protected $casts = [
        'is_main' => 'boolean',
        'sort_order' => 'integer',
        'position_x' => 'integer',
        'position_y' => 'integer',
        'zoom' => 'decimal:2',
    ];

    public function cat(): BelongsTo
    {
        return $this->belongsTo(Cat::class);
    }
}
