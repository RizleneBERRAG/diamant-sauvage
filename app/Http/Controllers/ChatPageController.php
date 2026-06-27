<?php

namespace App\Http\Controllers;

use App\Models\Cat;

class ChatPageController extends Controller
{
    public function index()
    {
        return $this->renderCatsPage(
            mode: 'all',
            title: 'Tous nos chats',
            subtitle: 'présentés avec élégance.',
            kicker: 'Bengals du Diamant Sauvage',
            description: 'Découvrez les Bengals de la chatterie : leurs robes, leurs lignées, leur suivi santé et les informations essentielles pour mieux les connaître.',
            button: 'Voir les fiches'
        );
    }

    public function femelles()
    {
        return $this->renderCatsPage(
            mode: 'female',
            title: 'Nos femelles',
            subtitle: 'élégantes et précieuses.',
            kicker: 'Femelles Bengal',
            description: 'Découvrez les femelles de la chatterie : leurs robes, leurs lignées, leur suivi santé et les informations essentielles pour mieux les connaître.',
            button: 'Voir les femelles'
        );
    }

    public function males()
    {
        return $this->renderCatsPage(
            mode: 'male',
            title: 'Nos mâles',
            subtitle: 'puissants et expressifs.',
            kicker: 'Mâles Bengal',
            description: 'Découvrez les mâles de la chatterie : leurs robes, leurs lignées, leur suivi santé et les informations essentielles pour mieux les connaître.',
            button: 'Voir les mâles'
        );
    }

    public function disponibles()
    {
        return $this->renderCatsPage(
            mode: 'available',
            title: 'Chats disponibles',
            subtitle: 'prêts à rejoindre leur famille.',
            kicker: 'Adoptions ouvertes',
            description: 'Découvrez uniquement les Bengals actuellement disponibles à l’adoption, avec leurs informations essentielles, leurs photos et leur statut à jour.',
            button: 'Voir les chats disponibles'
        );
    }

    private function renderCatsPage(
        string $mode,
        string $title,
        string $subtitle,
        string $kicker,
        string $description,
        string $button
    ) {
        $allCats = Cat::with(['images', 'mainImage'])
            ->where('visibility', 'visible')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $males = $allCats->where('category', 'male')->values();
        $females = $allCats->where('category', 'female')->values();
        $availableCats = $allCats->where('availability', 'available')->values();

        $cats = match ($mode) {
            'female' => $females,
            'male' => $males,
            'available' => $availableCats,
            default => $allCats,
        };

        $featured = $cats->where('featured', true)->take(3)->values();

        return view('pages.chats.index', compact(
            'mode',
            'title',
            'subtitle',
            'kicker',
            'description',
            'button',
            'allCats',
            'cats',
            'males',
            'females',
            'availableCats',
            'featured'
        ));
    }
}
