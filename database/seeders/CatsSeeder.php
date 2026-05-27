<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Seeder;

class CatsSeeder extends Seeder
{
    public function run(): void
    {
        $cats = config('chats.cats', []);

        foreach ($cats as $cat) {
            Cat::updateOrCreate(
                ['slug' => $cat['slug']],
                [
                    'name' => $cat['name'],
                    'short_name' => $cat['short_name'] ?? null,
                    'category' => $cat['category'] ?? 'female',
                    'sex' => $cat['sex'] ?? null,
                    'birth_date' => $cat['birth_date'] ?? null,

                    'icad' => $cat['icad'] ?? null,
                    'loof' => $cat['loof'] ?? null,
                    'coat' => $cat['coat'] ?? null,
                    'eyes' => $cat['eyes'] ?? null,

                    'availability' => $cat['availability'] ?? 'to_define',
                    'availability_label' => $cat['availability_label'] ?? null,
                    'visibility' => $cat['visibility'] ?? 'visible',

                    'price_mode' => $cat['price_mode'] ?? 'hidden',
                    'price' => $cat['price'] ?? null,

                    'highlight' => $cat['highlight'] ?? null,
                    'description' => $cat['description'] ?? null,

                    'father_name' => $cat['parents']['father'] ?? null,
                    'mother_name' => $cat['parents']['mother'] ?? null,

                    'health_hcm' => $cat['health']['hcm'] ?? null,
                    'health_pkd' => $cat['health']['pkd'] ?? null,
                    'health_fiv_felv' => $cat['health']['fiv_felv'] ?? null,
                    'health_pra_b' => $cat['health']['pra_b'] ?? null,
                    'health_pkdef' => $cat['health']['pkdef'] ?? null,
                    'health_parents_tests' => $cat['health']['parents_tests'] ?? null,

                    'featured' => $cat['featured'] ?? false,
                    'sort_order' => $cat['sort_order'] ?? 0,
                ]
            );
        }
    }
}
