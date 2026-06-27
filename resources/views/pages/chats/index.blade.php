@extends('layouts.site')

@section('title', $title . ' Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les Bengals de la Chatterie du Diamant Sauvage : mâles, femelles, chats disponibles, lignées, robes, tests de santé, LOOF et informations détaillées.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chats/chats.css') }}">
@endpush

@section('content')

    @php
        $statusClasses = [
            'available' => 'is-available',
            'reserved' => 'is-reserved',
            'adoption_pending' => 'is-pending',
            'not_available' => 'is-not-available',
            'to_define' => 'is-to-define',
        ];

        $placeholderImages = [
            'images/home/kitten-12.jpg',
            'images/home/gallery-11.jpg',
            'images/home/kitten-13.jpg',
            'images/home/gallery-12.jpg',
            'images/home/kitten-14.jpg',
            'images/home/gallery-13.jpg',
        ];

        $catMainImage = function ($cat) {
            return $cat->mainImage ?: $cat->images->first();
        };

        $catImage = function ($cat, $loopIndex = 0) use ($placeholderImages, $catMainImage) {
            $mainImage = $catMainImage($cat);

            return $mainImage
                ? asset('storage/' . $mainImage->path)
                : asset($placeholderImages[$loopIndex % count($placeholderImages)]);
        };

        $imageCropStyle = function ($image) {
            $x = $image->position_x ?? 50;
            $y = $image->position_y ?? 50;
            $zoom = $image->zoom ?? 1;

            return "
                object-position: {$x}% {$y}%;
                transform-origin: {$x}% {$y}%;
                transform: scale({$zoom});
            ";
        };

        $pageLabel = match ($mode) {
            'female' => 'Nos femelles',
            'male' => 'Nos mâles',
            'available' => 'Chats disponibles',
            default => 'Toutes les fiches',
        };

        $pageHeading = match ($mode) {
            'female' => 'Une présentation claire de chaque femelle.',
            'male' => 'Des mâles présentés avec précision.',
            'available' => 'Les Bengals actuellement ouverts à l’adoption.',
            default => 'Un espace clair pour consulter chaque chat.',
        };

        $emptyTitle = $mode === 'available'
            ? 'Aucun chat disponible pour le moment.'
            : 'Aucune fiche visible pour le moment.';

        $emptyText = $mode === 'available'
            ? 'Les Bengals marqués comme disponibles depuis le tableau de bord apparaîtront ici automatiquement.'
            : 'Les chats ajoutés et rendus visibles depuis le tableau de bord apparaîtront ici.';
    @endphp

    <section class="cats-hero">
        <div class="container cats-hero-grid">
            <div class="cats-hero-content">
                <span class="cats-kicker">{{ $kicker }}</span>

                <h1>
                    {{ $title }},
                    <em>{{ $subtitle }}</em>
                </h1>

                <p>{{ $description }}</p>

                <div class="cats-hero-actions">
                    <a href="#cats-list" class="btn btn-gold">{{ $button }}</a>
                    <a href="{{ route('contact') }}" class="btn btn-glass">Demander une information</a>
                </div>
            </div>

            <div class="cats-hero-panel cats-hero-video-panel">
                <div class="cats-video-frame">
                    <video autoplay muted loop playsinline preload="metadata" poster="{{ asset('images/home/gallery-11.jpg') }}">
                        <source src="{{ asset('videos/chats-hero.mp4') }}" type="video/mp4">
                    </video>

                    <div class="cats-video-overlay"></div>

                    <div class="cats-video-badge top">
                        <span>Chatterie familiale</span>
                        <strong>Bengal LOOF</strong>
                    </div>

                    <div class="cats-video-badge bottom">
                        <span>Découverte</span>
                        <strong>Photos · robe · suivi · caractère</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cats-tabs-section">
        <div class="container">
            <nav class="cats-tabs" aria-label="Navigation des chats">
                <a href="{{ route('chats.index') }}" class="{{ $mode === 'all' ? 'is-active' : '' }}">
                    Tous nos chats
                    <span>{{ $allCats->count() }}</span>
                </a>

                <a href="{{ route('chats.femelles') }}" class="{{ $mode === 'female' ? 'is-active' : '' }}">
                    Nos femelles
                    <span>{{ $females->count() }}</span>
                </a>

                <a href="{{ route('chats.males') }}" class="{{ $mode === 'male' ? 'is-active' : '' }}">
                    Nos mâles
                    <span>{{ $males->count() }}</span>
                </a>

                <a href="{{ route('chats.disponibles') }}" class="{{ $mode === 'available' ? 'is-active' : '' }}">
                    Disponibles
                    <span>{{ $availableCats->count() }}</span>
                </a>
            </nav>
        </div>
    </section>

    @if($featured->isNotEmpty())
        <section class="cats-featured">
            <div class="container">
                <div class="cats-section-head">
                    <span class="cats-kicker">Mise en avant</span>

                    <h2>Quelques profils à découvrir.</h2>

                    <p>
                        Une sélection de Bengals mis en avant par la chatterie, avec leurs informations principales
                        et leur fiche détaillée accessible en un clic.
                    </p>
                </div>

                <div class="cats-featured-grid">
                    @foreach($featured as $cat)
                        @php
                            $statusClass = $statusClasses[$cat->availability] ?? 'is-to-define';
                            $mainImageModel = $catMainImage($cat);
                        @endphp

                        <article class="featured-cat-card">
                            <figure>
                                <img
                                    src="{{ $catImage($cat, $loop->index) }}"
                                    alt="{{ $cat->name }}"
                                    style="{{ $imageCropStyle($mainImageModel) }}"
                                >
                            </figure>

                            <div class="featured-cat-content">
                                <span class="cat-status {{ $statusClass }}">
                                    {{ $cat->availability_text }}
                                </span>

                                <h3>{{ $cat->display_name }}</h3>

                                <p>
                                    {{ $cat->highlight ?: 'Informations à compléter depuis le tableau de bord.' }}
                                </p>

                                <div class="featured-cat-meta">
                                    <div>
                                        <small>Sexe</small>
                                        <strong>{{ $cat->sex ?: 'À compléter' }}</strong>
                                    </div>

                                    <div>
                                        <small>Robe</small>
                                        <strong>{{ $cat->coat ?: 'À compléter' }}</strong>
                                    </div>

                                    <div>
                                        <small>LOOF</small>
                                        <strong>{{ $cat->loof ?: 'À compléter' }}</strong>
                                    </div>
                                </div>

                                <button type="button" class="cat-open-btn" data-cat-open="{{ $cat->slug }}">
                                    Voir la fiche
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="cats-board" id="cats-list">
        <div class="container">
            <div class="cats-board-head">
                <div>
                    <span class="cats-kicker">{{ $pageLabel }}</span>

                    <h2>{{ $pageHeading }}</h2>

                    <p>
                        Chaque fiche regroupe les informations essentielles : identité, robe, naissance,
                        LOOF, parents, tests, suivi santé, statut et photos.
                    </p>
                </div>

                @if($mode === 'all')
                    <div class="cats-filter-ui" aria-label="Filtres rapides">
                        <button type="button" class="is-active" data-cat-filter="all">Tous</button>
                        <button type="button" data-cat-filter="female">Femelles</button>
                        <button type="button" data-cat-filter="male">Mâles</button>
                    </div>
                @endif
            </div>

            <div class="cats-grid">
                @forelse($cats as $cat)
                    @php
                        $statusClass = $statusClasses[$cat->availability] ?? 'is-to-define';
                        $mainImageModel = $catMainImage($cat);
                    @endphp

                    <article
                        class="cat-listing-card"
                        data-cat-card
                        data-cat-category="{{ $cat->category }}"
                        data-cat-open="{{ $cat->slug }}"
                    >
                        <div class="cat-card-image">
                            <img
                                src="{{ $catImage($cat, $loop->index) }}"
                                alt="{{ $cat->name }}"
                                style="{{ $imageCropStyle($mainImageModel) }}"
                            >

                            <span class="cat-status {{ $statusClass }}">
                                {{ $cat->availability_text }}
                            </span>

                            @if($cat->price_text)
                                <strong class="cat-price">{{ $cat->price_text }}</strong>
                            @endif
                        </div>

                        <div class="cat-card-content">
                            <div class="cat-card-title-row">
                                <div>
                                    <h3>{{ $cat->display_name }}</h3>
                                    <p>{{ $cat->name }}</p>
                                </div>

                                <span>{{ $cat->sex ?: 'À compléter' }}</span>
                            </div>

                            <div class="cat-card-quick">
                                <div>
                                    <small>Naissance</small>
                                    <strong>{{ $cat->birth_label }}</strong>
                                </div>

                                <div>
                                    <small>Âge</small>
                                    <strong>{{ $cat->age_label }}</strong>
                                </div>
                            </div>

                            <p class="cat-card-description">
                                {{ $cat->highlight ?: 'Informations à compléter depuis le tableau de bord.' }}
                            </p>

                            <div class="cat-card-tags">
                                <span>{{ $cat->coat ?: 'Robe à compléter' }}</span>
                                <span>Yeux {{ $cat->eyes ? strtolower($cat->eyes) : 'à compléter' }}</span>
                            </div>
                        </div>

                        <div class="cat-card-hover">
                            <div>
                                <span>LOOF</span>
                                <strong>{{ $cat->loof ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>I-CAD</span>
                                <strong>{{ $cat->icad ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>Tests</span>
                                <strong>FIV/FELV : {{ $cat->health_fiv_felv ?: 'À compléter' }}</strong>
                            </div>

                            <button type="button">
                                Voir tous les détails
                            </button>
                        </div>
                    </article>
                @empty
                    <div class="cats-empty">
                        <h3>{{ $emptyTitle }}</h3>
                        <p>{{ $emptyText }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="cats-admin-teaser">
        <div class="container cats-admin-card">
            <div>
                <span class="cats-kicker">Une adoption sereine</span>

                <h2>Des Bengals présentés avec soin, pour une rencontre évidente.</h2>

                <p>
                    Chaque fiche a été pensée pour transmettre l’essentiel avec élégance :
                    le tempérament du chat, sa robe, son suivi, ses origines et son évolution.
                    L’objectif est simple : permettre une découverte douce, rassurante et fidèle
                    à l’esprit de la chatterie.
                </p>
            </div>

            <div class="admin-preview">
                <div class="admin-preview-top">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="admin-preview-body">
                    <div>
                        <small>Découverte</small>
                        <strong>En douceur</strong>
                    </div>

                    <div>
                        <small>Informations</small>
                        <strong>Claires</strong>
                    </div>

                    <div>
                        <small>Contact</small>
                        <strong>Privilégié</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="cat-modal" id="catModal" aria-hidden="true">
        <div class="cat-modal-backdrop" data-cat-close></div>

        <div class="cat-modal-panel" role="dialog" aria-modal="true">
            <button type="button" class="cat-modal-close" data-cat-close aria-label="Fermer la fiche">
                ×
            </button>

            @foreach($cats as $cat)
                @php
                    $statusClass = $statusClasses[$cat->availability] ?? 'is-to-define';
                    $mainImageModel = $catMainImage($cat);
                @endphp

                <article class="cat-modal-content" data-cat-modal-content="{{ $cat->slug }}">
                    <div class="cat-modal-gallery">
                        <figure class="cat-modal-main-image">
                            <img
                                src="{{ $catImage($cat, $loop->index) }}"
                                alt="{{ $cat->name }}"
                                data-main-gallery="{{ $cat->slug }}"
                                style="{{ $imageCropStyle($mainImageModel) }}"
                            >
                        </figure>

                        @if($cat->images->isNotEmpty())
                            <div class="cat-modal-thumbs">
                                @foreach($cat->images as $image)
                                    <button
                                        type="button"
                                        class="{{ $loop->first ? 'is-active' : '' }}"
                                        data-gallery-thumb="{{ $cat->slug }}"
                                        data-gallery-src="{{ asset('storage/' . $image->path) }}"
                                        data-gallery-x="{{ $image->position_x ?? 50 }}"
                                        data-gallery-y="{{ $image->position_y ?? 50 }}"
                                        data-gallery-zoom="{{ $image->zoom ?? 1 }}"
                                        aria-label="Voir la photo {{ $loop->iteration }} de {{ $cat->display_name }}"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $image->path) }}"
                                            alt="{{ $image->alt ?: $cat->name }}"
                                            style="{{ $imageCropStyle($image) }}"
                                        >
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="cat-modal-info">
                        <span class="cat-status {{ $statusClass }}">
                            {{ $cat->availability_text }}
                        </span>

                        <h3>{{ $cat->name }}</h3>

                        <p>
                            {{ $cat->description ?: 'Description à compléter depuis le tableau de bord.' }}
                        </p>

                        <div class="cat-modal-price">
                            <span>Prix</span>
                            <strong>{{ $cat->price_text ?: 'Non affiché' }}</strong>
                        </div>

                        <div class="cat-modal-grid">
                            <div>
                                <small>Sexe</small>
                                <strong>{{ $cat->sex ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <small>Naissance</small>
                                <strong>{{ $cat->birth_label }}</strong>
                            </div>

                            <div>
                                <small>Âge</small>
                                <strong>{{ $cat->age_label }}</strong>
                            </div>

                            <div>
                                <small>Robe</small>
                                <strong>{{ $cat->coat ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <small>Yeux</small>
                                <strong>{{ $cat->eyes ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <small>LOOF</small>
                                <strong>{{ $cat->loof ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <small>I-CAD</small>
                                <strong>{{ $cat->icad ?: 'À compléter' }}</strong>
                            </div>
                        </div>

                        <div class="cat-modal-family">
                            <div>
                                <span>Père</span>
                                <strong>{{ $cat->father_name ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>Mère</span>
                                <strong>{{ $cat->mother_name ?: 'À compléter' }}</strong>
                            </div>
                        </div>

                        @php
                            $pedigreeMention = $cat->pedigree_note;

                            if (!$pedigreeMention && ($cat->father_name || $cat->mother_name)) {
                                $pedigreeMention = 'Issue du mariage de '
                                    . ($cat->father_name ?: 'père à compléter')
                                    . ' et '
                                    . ($cat->mother_name ?: 'mère à compléter')
                                    . '.';
                            }

                            $hasPedigreeBlock = $pedigreeMention
                                || $cat->pedigree_pdf
                                || $cat->father_photo
                                || $cat->mother_photo;
                        @endphp

                        @if($hasPedigreeBlock)
                            <section class="cat-modal-pedigree">
                                <div class="cat-modal-pedigree-head">
                                    <span>Origines & pedigree</span>
                                    <h4>Une lignée présentée avec transparence.</h4>

                                    @if($pedigreeMention)
                                        <p>{{ $pedigreeMention }}</p>
                                    @endif
                                </div>

                                @if($cat->father_photo || $cat->mother_photo || $cat->father_name || $cat->mother_name)
                                    <div class="cat-modal-parents-showcase">
                                        <article>
                                            @if($cat->father_photo)
                                                <figure>
                                                    <img src="{{ asset('storage/' . $cat->father_photo) }}" alt="Photo du père {{ $cat->father_name }}">
                                                </figure>
                                            @else
                                                <div class="cat-parent-placeholder">P</div>
                                            @endif

                                            <div>
                                                <span>Père</span>
                                                <strong>{{ $cat->father_name ?: 'À compléter' }}</strong>
                                            </div>
                                        </article>

                                        <article>
                                            @if($cat->mother_photo)
                                                <figure>
                                                    <img src="{{ asset('storage/' . $cat->mother_photo) }}" alt="Photo de la mère {{ $cat->mother_name }}">
                                                </figure>
                                            @else
                                                <div class="cat-parent-placeholder">M</div>
                                            @endif

                                            <div>
                                                <span>Mère</span>
                                                <strong>{{ $cat->mother_name ?: 'À compléter' }}</strong>
                                            </div>
                                        </article>
                                    </div>
                                @endif

                                @if($cat->pedigree_pdf)
                                    <a
                                        href="{{ asset('storage/' . $cat->pedigree_pdf) }}"
                                        target="_blank"
                                        rel="noopener"
                                        class="cat-pedigree-link"
                                    >
                                        Voir le pedigree PDF
                                        <span>↗</span>
                                    </a>
                                @endif
                            </section>
                        @endif

                        <div class="cat-modal-health">
                            <h4>Suivi santé</h4>

                            <div>
                                <span>HCM</span>
                                <strong>{{ $cat->health_hcm ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>PKD</span>
                                <strong>{{ $cat->health_pkd ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>FIV/FELV</span>
                                <strong>{{ $cat->health_fiv_felv ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>PRA-b</span>
                                <strong>{{ $cat->health_pra_b ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <span>PKDef</span>
                                <strong>{{ $cat->health_pkdef ?: 'À compléter' }}</strong>
                            </div>

                            @if($cat->health_parents_tests)
                                <div>
                                    <span>Parents</span>
                                    <strong>{{ $cat->health_parents_tests }}</strong>
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('contact') }}" class="btn btn-gold">
                            Demander des informations
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('catModal');
            const cards = document.querySelectorAll('[data-cat-card]');
            const filterButtons = document.querySelectorAll('[data-cat-filter]');
            const openButtons = document.querySelectorAll('.cat-open-btn[data-cat-open]');
            const closeButtons = document.querySelectorAll('[data-cat-close]');
            const modalContents = document.querySelectorAll('[data-cat-modal-content]');
            const galleryThumbs = document.querySelectorAll('[data-gallery-thumb]');

            function openModal(slug) {
                if (!modal) return;

                modalContents.forEach((content) => {
                    content.classList.toggle('is-active', content.dataset.catModalContent === slug);
                });

                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('modal-open');
            }

            function closeModal() {
                if (!modal) return;

                modal.classList.remove('is-open');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('modal-open');
            }

            filterButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const filter = button.dataset.catFilter;

                    filterButtons.forEach((item) => item.classList.remove('is-active'));
                    button.classList.add('is-active');

                    cards.forEach((card) => {
                        const shouldShow = filter === 'all' || card.dataset.catCategory === filter;
                        card.classList.toggle('is-hidden', !shouldShow);
                    });
                });
            });

            openButtons.forEach((button) => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();

                    openModal(button.dataset.catOpen);
                });
            });

            cards.forEach((card) => {
                card.addEventListener('click', () => {
                    openModal(card.dataset.catOpen);
                });
            });

            closeButtons.forEach((button) => {
                button.addEventListener('click', closeModal);
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && modal?.classList.contains('is-open')) {
                    closeModal();
                }
            });

            galleryThumbs.forEach((thumb) => {
                thumb.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();

                    const slug = thumb.dataset.galleryThumb;
                    const src = thumb.dataset.gallerySrc;
                    const x = thumb.dataset.galleryX || '50';
                    const y = thumb.dataset.galleryY || '50';
                    const zoom = thumb.dataset.galleryZoom || '1';
                    const mainImage = document.querySelector(`[data-main-gallery="${slug}"]`);

                    if (!mainImage || !src) return;

                    mainImage.src = src;
                    mainImage.style.objectPosition = `${x}% ${y}%`;
                    mainImage.style.transformOrigin = `${x}% ${y}%`;
                    mainImage.style.transform = `scale(${zoom})`;

                    document
                        .querySelectorAll(`[data-gallery-thumb="${slug}"]`)
                        .forEach((item) => item.classList.remove('is-active'));

                    thumb.classList.add('is-active');
                });
            });
        });
    </script>

@endsection
