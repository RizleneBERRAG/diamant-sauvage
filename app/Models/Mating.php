<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mating extends Model
{
    protected $fillable = [
        'title',
        'father_name',
        'mother_name',
        'father_photo',
        'mother_photo',
        'mating_start_date',
        'mating_end_date',
        'expected_birth_date',
        'status',
        'expected_colors',
        'description',
        'is_visible',
        'sort_order',
    ];

    protected $casts = [
        'mating_start_date' => 'date',
        'mating_end_date' => 'date',
        'expected_birth_date' => 'date',
        'is_visible' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getDisplayTitleAttribute(): string
    {
        return $this->title ?: $this->father_name . ' × ' . $this->mother_name;
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'planned' => 'Mariage prévu',
            'in_progress' => 'Mariage en cours',
            'confirmed' => 'Gestation confirmée',
            'born' => 'Chatons nés',
            'closed' => 'Archivé',
            default => 'Mariage en cours',
        };
    }

    public function getMatingDateLabelAttribute(): string
    {
        if ($this->mating_start_date && $this->mating_end_date) {
            return 'Du ' . $this->mating_start_date->translatedFormat('d F Y')
                . ' au ' . $this->mating_end_date->translatedFormat('d F Y');
        }

        if ($this->mating_start_date) {
            return $this->mating_start_date->translatedFormat('d F Y');
        }

        return 'Date à confirmer';
    }

    public function getExpectedBirthLabelAttribute(): string
    {
        return $this->expected_birth_date
            ? $this->expected_birth_date->translatedFormat('d F Y')
            : 'Arrivée estimée à confirmer';
    }
}
