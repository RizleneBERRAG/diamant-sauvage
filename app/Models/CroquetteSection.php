<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CroquetteSection extends Model
{
    protected $fillable = [
        'label',
        'title',
        'description',
    ];
}
