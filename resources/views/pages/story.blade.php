@extends('layouts.site')

@section('title', 'Notre histoire | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez l’histoire de la Chatterie du Diamant Sauvage et la page dédiée à Kiara.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/histoire-chatterie.css') }}">
@endpush

@section('content')

    @php
        $storyPhotos = collect(glob(public_path('images/hommage/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE));

        $storyPhotos = $storyPhotos->sort()->map(function ($path) {
            return asset('images/hommage/' . rawurlencode(basename(str_replace('\\', '/', $path))));
        })->values();

        if ($storyPhotos->isEmpty()) {
            $storyPhotos = collect([
                asset('images/home/hero-bengal.jpg'),
                asset('images/home/gallery-11.jpg'),
                asset('images/home/kitten11.jpg'),
            ]);
        }
    @endphp

    <section class="story-hero">
        <div class="story-hero__glow story-hero__glow--one"></div>
        <div class="story-hero__glow story-hero__glow--two"></div>

        <div class="container story-hero__grid">
            <div class="story-hero__content">
                <span class="story-kicker">Notre histoire</span>

                <h1>
                    L’histoire d’une chatterie née d’un premier diamant.
                </h1>

                <p>
                    Avant les lignées, les portées, les rencontres et les familles, il y a eu Kiara.
                    Une présence fondatrice, une évidence, celle qui a donné une âme au Diamant Sauvage.
                </p>

                <div class="story-hero__actions">
                    <a href="#kiara" class="btn btn-gold">Découvrir Kiara</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light">Échanger avec la chatterie</a>
                </div>
            </div>

            <div class="story-hero__portrait">
                <figure>
                    <img src="{{ $storyPhotos->first() }}" alt="Kiara, première Bengal du Diamant Sauvage">
                </figure>

                <div class="story-hero__card">
                    <span>À l’origine</span>
                    <strong>Kiara</strong>
                    <p>16 avril 2015 — 10 juin 2026</p>
                </div>
            </div>
        </div>
    </section>

    <section class="story-intro" id="kiara">
        <div class="container story-intro__grid">
            <div class="story-intro__sticky">
                <span class="story-kicker story-kicker--dark">Kiara</span>
                <h2>Notre premier diamant.</h2>
            </div>

            <div class="story-intro__text">
                <p>
                    Kiara a été la première Bengal de la chatterie, celle avec qui l’aventure a commencé.
                    Elle n’a pas seulement été un chat : elle a été une présence, une inspiration, une force douce
                    qui a donné envie de construire quelque chose de beau, de sérieux et de profondément humain.
                </p>

                <p>
                    C’est à travers elle que la passion pour le Bengal s’est affirmée. Son regard, son caractère,
                    son élégance et sa place dans la maison ont marqué le début d’un projet devenu une véritable histoire.
                </p>

                <blockquote>
                    Plus qu’une présence, elle restera une force, une confidente,
                    une étoile fondatrice et l’âme précieuse du Diamant Sauvage.
                </blockquote>
            </div>
        </div>
    </section>

    <section class="story-gallery" aria-label="Souvenirs de Kiara">
        <div class="container">
            <div class="story-section-head">
                <span class="story-kicker story-kicker--dark">Souvenirs</span>
                <h2>Des instants gardés comme des éclats précieux.</h2>
            </div>

            <div class="story-gallery__grid">
                @foreach($storyPhotos->take(8) as $index => $photo)
                    <figure class="story-gallery__item story-gallery__item--{{ ($index % 4) + 1 }}">
                        <img src="{{ $photo }}" alt="Souvenir de Kiara {{ $index + 1 }}">
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <section class="story-values">
        <div class="container">
            <div class="story-section-head story-section-head--center">
                <span class="story-kicker">Ce qu’elle a transmis</span>
                <h2>Une manière d’élever, de choisir et d’accompagner.</h2>
            </div>

            <div class="story-values__grid">
                <article>
                    <span>01</span>
                    <h3>La passion du Bengal</h3>
                    <p>
                        Kiara a révélé cette fascination pour une race élégante, vive, expressive
                        et profondément attachante.
                    </p>
                </article>

                <article>
                    <span>02</span>
                    <h3>Le respect du vivant</h3>
                    <p>
                        Chaque chat est suivi avec attention, dans une logique de bien-être,
                        de santé et d’équilibre.
                    </p>
                </article>

                <article>
                    <span>03</span>
                    <h3>L’accompagnement humain</h3>
                    <p>
                        Une adoption n’est jamais un simple départ : c’est une rencontre,
                        une confiance et une continuité.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="story-timeline">
        <div class="container story-timeline__grid">
            <div class="story-timeline__content">
                <span class="story-kicker story-kicker--dark">Le chemin</span>

                <h2>De Kiara au Diamant Sauvage.</h2>

                <p>
                    La chatterie s’est construite petit à petit, autour d’une exigence simple :
                    préserver la beauté du Bengal tout en respectant son caractère,
                    son équilibre et son histoire.
                </p>
            </div>

            <div class="story-timeline__steps">
                <div>
                    <strong>2015</strong>
                    <span>Kiara entre dans la vie de la chatterie.</span>
                </div>

                <div>
                    <strong>Naissance du projet</strong>
                    <span>La passion devient une volonté de construire un élevage familial sérieux.</span>
                </div>

                <div>
                    <strong>Aujourd’hui</strong>
                    <span>Le Diamant Sauvage poursuit son histoire avec la même exigence et la même tendresse.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="story-final">
        <div class="container">
            <div class="story-final__card">
                <span class="story-kicker">Hommage</span>

                <h2>
                    Kiara restera l’étoile fondatrice du Diamant Sauvage.
                </h2>

                <p>
                    Cette page lui est dédiée, comme une trace douce et durable de ce qu’elle a représenté.
                    Son histoire continue à travers chaque choix, chaque naissance, chaque famille accompagnée
                    et chaque Bengal élevé avec respect.
                </p>

                <a href="{{ route('chats.index') }}" class="btn btn-gold">
                    Découvrir nos Bengal
                </a>
            </div>
        </div>
    </section>

@endsection
