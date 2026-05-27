@extends('layouts.site')

@section('title', 'Nos femelles Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les femelles Bengal de la Chatterie du Diamant Sauvage : robes, lignées, tests de santé, LOOF et informations détaillées.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chats/chats.css') }}">
@endpush

@section('content')

    @php
        $allCats = collect(config('chats.cats', []))
            ->where('visibility', 'visible')
            ->values();

        $cats = $allCats->where('category', 'female')->values();
        $males = $allCats->where('category', 'male')->values();
        $females = $cats;
        $featured = $cats->where('featured', true)->take(3)->values();

        $statusClasses = [
            'available' => 'is-available',
            'reserved' => 'is-reserved',
            'adoption_pending' => 'is-pending',
            'not_available' => 'is-not-available',
            'to_define' => 'is-to-define',
        ];

        $statusText = [
            'available' => 'Disponible',
            'reserved' => 'Réservé',
            'adoption_pending' => 'En cours d’adoption',
            'not_available' => 'Non disponible',
            'to_define' => 'À définir',
        ];

        $placeholderImages = [
            'images/home/kitten-12.jpg',
            'images/home/gallery-11.jpg',
            'images/home/kitten-13.jpg',
            'images/home/gallery-12.jpg',
            'images/home/kitten-14.jpg',
            'images/home/gallery-13.jpg',
        ];

        $catImage = function ($cat, $loopIndex = 0) use ($placeholderImages) {
            if (!empty($cat['gallery']) && !empty($cat['gallery'][0])) {
                return asset($cat['gallery'][0]);
            }

            return asset($placeholderImages[$loopIndex % count($placeholderImages)]);
        };

        $catAgeLabel = function ($birthDate) {
            if (empty($birthDate) || $birthDate === 'À compléter') {
                return 'Âge à compléter';
            }

            try {
                $birth = \Carbon\Carbon::parse($birthDate)->startOfDay();
                $now = \Carbon\Carbon::now()->startOfDay();

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
            } catch (\Exception $e) {
                return 'Âge à compléter';
            }
        };

        $catPriceLabel = function ($cat) {
            $mode = $cat['price_mode'] ?? 'hidden';

            if ($mode === 'fixed' && !empty($cat['price'])) {
                return number_format((float) $cat['price'], 0, ',', ' ') . ' €';
            }

            if ($mode === 'on_request') {
                return 'Prix sur demande';
            }

            return null;
        };
    @endphp

    <section class="cats-hero">
        <div class="container cats-hero-grid">
            <div class="cats-hero-content">
                <span class="cats-kicker">Femelles Bengal</span>

                <h1>
                    Nos femelles,
                    <em>élégantes et précieuses.</em>
                </h1>

                <p>
                    Découvrez les femelles de la chatterie : leurs robes, leurs lignées,
                    leur suivi santé et les informations essentielles pour mieux les connaître.
                </p>

                <div class="cats-hero-actions">
                    <a href="#cats-list" class="btn btn-gold">Voir les femelles</a>
                    <a href="{{ route('contact') }}" class="btn btn-glass">Demander une information</a>
                </div>
            </div>

            <div class="cats-hero-panel">
                <div class="cats-hero-card">
                    <span>Femelles suivies</span>
                    <strong>{{ $females->count() }}</strong>
                    <p>fiches femelles préparées pour la chatterie</p>
                </div>

                <div class="cats-hero-mini-grid">
                    <div>
                        <span>Total chats</span>
                        <strong>{{ $allCats->count() }}</strong>
                    </div>

                    <div>
                        <span>Mâles</span>
                        <strong>{{ $males->count() }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cats-tabs-section">
        <div class="container">
            <div class="cats-tabs">
                <a href="{{ route('chats.index') }}">
                    Tous nos chats
                    <span>{{ $allCats->count() }}</span>
                </a>

                <a href="{{ route('chats.femelles') }}" class="is-active">
                    Nos femelles
                    <span>{{ $females->count() }}</span>
                </a>

                <a href="{{ route('chats.males') }}">
                    Nos mâles
                    <span>{{ $males->count() }}</span>
                </a>
            </div>
        </div>
    </section>

    <section class="cats-board" id="cats-list">
        <div class="container">
            <div class="cats-board-head">
                <div>
                    <span class="cats-kicker">Nos femelles</span>

                    <h2>Une présentation claire de chaque femelle.</h2>

                    <p>
                        Chaque fiche regroupe les informations essentielles : identité, robe, naissance,
                        LOOF, parents, tests et suivi santé.
                    </p>
                </div>
            </div>

            <div class="cats-grid">
                @foreach($cats as $cat)
                    @php
                        $statusClass = $statusClasses[$cat['availability']] ?? 'is-to-define';
                        $displayStatus = $cat['availability_label'] ?? ($statusText[$cat['availability']] ?? 'À définir');
                        $priceLabel = $catPriceLabel($cat);
                        $ageLabel = $catAgeLabel($cat['birth_date'] ?? null);
                    @endphp

                    <article class="cat-listing-card" data-cat-card data-cat-category="{{ $cat['category'] }}" data-cat-open="{{ $cat['slug'] }}">
                        <div class="cat-card-image">
                            <img src="{{ $catImage($cat, $loop->index) }}" alt="{{ $cat['name'] }}">
                            <span class="cat-status {{ $statusClass }}">{{ $displayStatus }}</span>

                            @if($priceLabel)
                                <strong class="cat-price">{{ $priceLabel }}</strong>
                            @endif
                        </div>

                        <div class="cat-card-content">
                            <div class="cat-card-title-row">
                                <div>
                                    <h3>{{ $cat['short_name'] ?? $cat['name'] }}</h3>
                                    <p>{{ $cat['name'] }}</p>
                                </div>

                                <span>{{ $cat['sex'] }}</span>
                            </div>

                            <div class="cat-card-quick">
                                <div>
                                    <small>Naissance</small>
                                    <strong>{{ $cat['birth_label'] }}</strong>
                                </div>

                                <div>
                                    <small>Âge</small>
                                    <strong>{{ $ageLabel }}</strong>
                                </div>
                            </div>

                            <p class="cat-card-description">{{ $cat['highlight'] }}</p>

                            <div class="cat-card-tags">
                                <span>{{ $cat['coat'] }}</span>
                                <span>Yeux {{ strtolower($cat['eyes']) }}</span>
                            </div>
                        </div>

                        <div class="cat-card-hover">
                            <div>
                                <span>LOOF</span>
                                <strong>{{ $cat['loof'] }}</strong>
                            </div>

                            <div>
                                <span>I-CAD</span>
                                <strong>{{ $cat['icad'] }}</strong>
                            </div>

                            <div>
                                <span>Tests</span>
                                <strong>FIV/FELV : {{ $cat['health']['fiv_felv'] ?? 'À compléter' }}</strong>
                            </div>

                            <button type="button">Voir tous les détails</button>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <div class="cat-modal" id="catModal" aria-hidden="true">
        <div class="cat-modal-backdrop" data-cat-close></div>

        <div class="cat-modal-panel" role="dialog" aria-modal="true" aria-labelledby="catModalTitle">
            <button type="button" class="cat-modal-close" data-cat-close aria-label="Fermer la fiche">×</button>

            @foreach($cats as $cat)
                @php
                    $statusClass = $statusClasses[$cat['availability']] ?? 'is-to-define';
                    $displayStatus = $cat['availability_label'] ?? ($statusText[$cat['availability']] ?? 'À définir');
                    $priceLabel = $catPriceLabel($cat);
                    $ageLabel = $catAgeLabel($cat['birth_date'] ?? null);
                @endphp

                <article class="cat-modal-content" data-cat-modal-content="{{ $cat['slug'] }}">
                    <figure>
                        <img src="{{ $catImage($cat, $loop->index) }}" alt="{{ $cat['name'] }}">
                    </figure>

                    <div class="cat-modal-info">
                        <span class="cat-status {{ $statusClass }}">{{ $displayStatus }}</span>

                        <h3 id="catModalTitle">{{ $cat['name'] }}</h3>

                        <p>{{ $cat['description'] }}</p>

                        <div class="cat-modal-price">
                            <span>Prix</span>
                            <strong>{{ $priceLabel ?: 'Non affiché' }}</strong>
                        </div>

                        <div class="cat-modal-grid">
                            <div><small>Sexe</small><strong>{{ $cat['sex'] }}</strong></div>
                            <div><small>Naissance</small><strong>{{ $cat['birth_label'] }}</strong></div>
                            <div><small>Âge</small><strong>{{ $ageLabel }}</strong></div>
                            <div><small>Robe</small><strong>{{ $cat['coat'] }}</strong></div>
                            <div><small>Yeux</small><strong>{{ $cat['eyes'] }}</strong></div>
                            <div><small>LOOF</small><strong>{{ $cat['loof'] }}</strong></div>
                            <div><small>I-CAD</small><strong>{{ $cat['icad'] }}</strong></div>
                        </div>

                        <div class="cat-modal-family">
                            <div>
                                <span>Père</span>
                                <strong>{{ $cat['parents']['father'] ?? 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>Mère</span>
                                <strong>{{ $cat['parents']['mother'] ?? 'À compléter' }}</strong>
                            </div>
                        </div>

                        <div class="cat-modal-health">
                            <h4>Suivi santé</h4>
                            <div><span>HCM</span><strong>{{ $cat['health']['hcm'] ?? 'À compléter' }}</strong></div>
                            <div><span>PKD</span><strong>{{ $cat['health']['pkd'] ?? 'À compléter' }}</strong></div>
                            <div><span>FIV/FELV</span><strong>{{ $cat['health']['fiv_felv'] ?? 'À compléter' }}</strong></div>
                            <div><span>PRA-b</span><strong>{{ $cat['health']['pra_b'] ?? 'À compléter' }}</strong></div>
                            <div><span>PKDef</span><strong>{{ $cat['health']['pkdef'] ?? 'À compléter' }}</strong></div>

                            @if(!empty($cat['health']['parents_tests']))
                                <div><span>Parents</span><strong>{{ $cat['health']['parents_tests'] }}</strong></div>
                            @endif
                        </div>

                        <a href="{{ route('contact') }}" class="btn btn-gold">Demander des informations</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('catModal');
            const openButtons = document.querySelectorAll('[data-cat-open]');
            const closeButtons = document.querySelectorAll('[data-cat-close]');
            const modalContents = document.querySelectorAll('[data-cat-modal-content]');

            function openModal(slug) {
                modalContents.forEach((content) => {
                    content.classList.toggle('is-active', content.dataset.catModalContent === slug);
                });

                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('modal-open');
            }

            function closeModal() {
                modal.classList.remove('is-open');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('modal-open');
            }

            openButtons.forEach((element) => {
                element.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    openModal(element.dataset.catOpen);
                });
            });

            closeButtons.forEach((button) => button.addEventListener('click', closeModal));

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                    closeModal();
                }
            });
        });
    </script>

@endsection
