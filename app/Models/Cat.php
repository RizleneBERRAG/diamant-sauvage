<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Cat extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'category',
        'sex',
        'birth_date',
        'icad',
        'loof',
        'coat',
        'eyes',
        'availability',
        'availability_label',
        'visibility',
        'price_mode',
        'price',
        'highlight',
        'description',
        'father_name',
        'mother_name',
        'health_hcm',
        'health_pkd',
        'health_fiv_felv',
        'health_pra_b',
        'health_pkdef',
        'health_parents_tests',
        'featured',
        'sort_order',
        'pedigree_note',
        'pedigree_pdf',
        'father_photo',
        'mother_photo',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (Cat $cat) {
            if (blank($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });

        static::updating(function (Cat $cat) {
            if (blank($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(CatImage::class)->orderBy('sort_order');
    }

    public function mainImage()
    {
        return $this->hasOne(CatImage::class)
            ->orderByDesc('is_main')
            ->orderBy('sort_order');
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->short_name ?: $this->name;
    }

    public function getAvailabilityTextAttribute(): string
    {
        if ($this->availability_label) {
            return $this->availability_label;
        }

        return match ($this->availability) {
            'available' => 'Disponible',
            'reserved' => 'Réservé',
            'adoption_pending' => 'En cours d’adoption',
            'not_available' => 'Non disponible',
            default => 'À définir',
        };
    }

    public function getPriceTextAttribute(): ?string
    {
        if ($this->price_mode === 'fixed' && $this->price) {
            return number_format((float) $this->price, 0, ',', ' ') . ' €';
        }

        if ($this->price_mode === 'on_request') {
            return 'Prix sur demande';
        }

        return null;
    }

    public function getBirthLabelAttribute(): string
    {
        return $this->birth_date
            ? $this->birth_date->translatedFormat('d F Y')
            : 'À compléter';
    }

    public function getAgeLabelAttribute(): string
    {
        if (!$this->birth_date) {
            return 'Âge à compléter';
        }

        $birth = $this->birth_date->copy()->startOfDay();
        $now = now()->startOfDay();

        if ($birth->greaterThan($now)) {
            return 'À naître';
        }

        $years = (int) floor($birth->diffInYears($now));
        $months = (int) floor($birth->copy()->addYears($years)->diffInMonths($now));

        if ($years >= 1 && $months > 0) {
            return $years . ' an' . ($years > 1 ? 's' : '') . ' et ' . $months . ' mois';
        }

        if ($years >= 1) {
            return $years . ' an' . ($years > 1 ? 's' : '');
        }

        $monthsOnly = (int) floor($birth->diffInMonths($now));

        return max(1, $monthsOnly) . ' mois';
    }

    public function getMainImagePathAttribute(): ?string
    {
        $main = $this->mainImage;

        if ($main) {
            return $main->path;
        }

        return $this->images->first()?->path;
    }
}
