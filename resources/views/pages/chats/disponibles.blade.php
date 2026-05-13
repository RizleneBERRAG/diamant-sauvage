@extends('layouts.site')

@section('title', 'Chatons disponibles | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les chatons Bengal disponibles, réservés ou à venir à la Chatterie du Diamant Sauvage.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chats-disponibles.css') }}">
@endpush

@section('content')

    <section class="available-hero">
        <div class="container available-hero-grid">
            <div>
                <span class="kicker">Chatons disponibles</span>
                <h1>Les petits diamants prêts à rejoindre leur famille.</h1>
                <p>
                    Retrouvez ici les chatons Bengal actuellement disponibles, réservés ou issus des prochaines portées.
                    Chaque adoption est accompagnée avec sérieux, douceur et transparence.
                </p>

                <div class="hero-actions">
                    <a href="#liste-chatons" class="btn btn-gold">Voir les chatons</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline">Nous contacter</a>
                </div>
            </div>

            <div class="available-hero-card">
                <div class="hero-cat-visual">
                    <span>Photo chaton Bengal</span>
                </div>

                <div class="hero-note">
                    <strong>Adoption accompagnée</strong>
                    <p>Conseils, documents, suivi et préparation de l’arrivée du chaton.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="available-intro">
        <div class="container intro-box">
            <div>
                <span class="section-label">Disponibilités</span>
                <h2>Une page claire pour suivre les chatons et les portées.</h2>
            </div>

            <p>
                Les statuts permettent de visualiser rapidement les chatons disponibles, réservés
                ou les prochaines naissances prévues. Chaque fiche pourra ensuite être mise à jour
                facilement avec les photos, le caractère, le sexe, la robe et les informations importantes.
            </p>
        </div>
    </section>

    <section class="available-list" id="liste-chatons">
        <div class="container">

            <div class="list-heading">
                <div>
                    <span class="section-label">Nos chatons</span>
                    <h2>À l’adoption actuellement</h2>
                </div>

                <div class="filters" aria-label="Filtrer les chatons">
                    <button class="filter-btn active" data-filter="all">Tous</button>
                    <button class="filter-btn" data-filter="available">Disponibles</button>
                    <button class="filter-btn" data-filter="reserved">Réservés</button>
                    <button class="filter-btn" data-filter="coming">À venir</button>
                </div>
            </div>

            <div class="kitten-grid">

                <article class="kitten-card" data-status="available">
                    <div class="kitten-image kitten-image-1">
                        <span class="status status-available">Disponible</span>
                    </div>

                    <div class="kitten-info">
                        <div class="kitten-top">
                            <h3>Naya</h3>
                            <span>Femelle</span>
                        </div>

                        <p>
                            Une petite Bengal douce, curieuse et proche de l’humain.
                            Idéale pour une famille présente et attentive.
                        </p>

                        <div class="kitten-tags">
                            <span>Bengal</span>
                            <span>Sociabilisée</span>
                            <span>LOOF</span>
                        </div>

                        <a href="{{ route('contact') }}">Demander des informations</a>
                    </div>
                </article>

                <article class="kitten-card" data-status="reserved">
                    <div class="kitten-image kitten-image-2">
                        <span class="status status-reserved">Réservé</span>
                    </div>

                    <div class="kitten-info">
                        <div class="kitten-top">
                            <h3>Zéphyr</h3>
                            <span>Mâle</span>
                        </div>

                        <p>
                            Un chaton joueur, expressif et très attachant.
                            Il rejoindra bientôt sa future famille.
                        </p>

                        <div class="kitten-tags">
                            <span>Bengal</span>
                            <span>Joueur</span>
                            <span>Réservé</span>
                        </div>

                        <a href="{{ route('contact') }}">Voir la portée</a>
                    </div>
                </article>

                <article class="kitten-card" data-status="available">
                    <div class="kitten-image kitten-image-3">
                        <span class="status status-available">Disponible</span>
                    </div>

                    <div class="kitten-info">
                        <div class="kitten-top">
                            <h3>Opale</h3>
                            <span>Femelle</span>
                        </div>

                        <p>
                            Une petite femelle Bengal au regard intense,
                            vive, observatrice et très proche du quotidien familial.
                        </p>

                        <div class="kitten-tags">
                            <span>Bengal</span>
                            <span>Curieuse</span>
                            <span>Famille</span>
                        </div>

                        <a href="{{ route('contact') }}">Demander des informations</a>
                    </div>
                </article>

                <article class="kitten-card" data-status="coming">
                    <div class="kitten-image kitten-image-4">
                        <span class="status status-coming">À venir</span>
                    </div>

                    <div class="kitten-info">
                        <div class="kitten-top">
                            <h3>Prochaine portée</h3>
                            <span>2026</span>
                        </div>

                        <p>
                            Les futures naissances seront annoncées ici avec les informations
                            sur les parents, les dates et les disponibilités.
                        </p>

                        <div class="kitten-tags">
                            <span>Naissance</span>
                            <span>Réservation</span>
                            <span>Suivi</span>
                        </div>

                        <a href="{{ route('contact') }}">Être informé</a>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <section class="adoption-process">
        <div class="container process-grid">
            <div>
                <span class="section-label">Adoption</span>
                <h2>Un départ préparé avec soin.</h2>
                <p>
                    Chaque chaton rejoint sa famille avec un accompagnement complet, des conseils,
                    les documents nécessaires et une préparation adaptée pour faciliter son arrivée.
                </p>
            </div>

            <div class="process-steps">
                <div>
                    <span>01</span>
                    <strong>Premier échange</strong>
                    <p>Discussion autour de votre mode de vie et de vos attentes.</p>
                </div>

                <div>
                    <span>02</span>
                    <strong>Réservation</strong>
                    <p>Choix du chaton et suivi régulier avec photos et nouvelles.</p>
                </div>

                <div>
                    <span>03</span>
                    <strong>Préparation</strong>
                    <p>Conseils pour l’arrivée, alimentation, matériel et environnement.</p>
                </div>

                <div>
                    <span>04</span>
                    <strong>Départ</strong>
                    <p>Documents, carnet, certificat vétérinaire et accompagnement.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="available-cta">
        <div class="container cta-box">
            <div>
                <span class="section-label">Une question ?</span>
                <h2>Vous souhaitez en savoir plus sur un chaton ?</h2>
                <p>
                    La chatterie vous accompagne pour choisir le chaton qui correspond le mieux
                    à votre foyer et à votre mode de vie.
                </p>
            </div>

            <a href="{{ route('contact') }}" class="btn btn-gold">Contacter la chatterie</a>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/chats-disponibles.js') }}"></script>
@endpush
