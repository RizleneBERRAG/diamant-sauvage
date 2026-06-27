@extends('layouts.site')

@section('title', 'Mariages à venir | Chatterie du Diamant Sauvage')

@section('description', 'Découvrez les mariages à venir de la Chatterie du Diamant Sauvage, les parents, les dates estimées et les couleurs possibles des futurs chatons Bengal.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chats/mariages.css') }}">
@endpush

@section('content')

    @php
        $visibleMatingsCount = $matings->count();

        $statusClasses = [
            'planned' => 'is-planned',
            'in_progress' => 'is-progress',
            'confirmed' => 'is-confirmed',
            'born' => 'is-born',
            'closed' => 'is-closed',
        ];
    @endphp

    <section class="matings-hero">
        <div class="matings-hero-glow"></div>

        <div class="container matings-hero-grid">
            <div class="matings-hero-content">
                <span class="matings-kicker">Naissances à venir</span>

                <h1>
                    Mariages
                    <em>à venir</em>
                </h1>

                <p>
                    Suivez les unions prévues ou en cours à la chatterie : parents, dates estimées,
                    couleurs possibles et évolution du projet de portée.
                </p>

                <div class="matings-hero-actions">
                    <a href="#matings-list" class="btn btn-gold">Voir les mariages</a>
                    <a href="{{ route('contact') }}" class="btn btn-glass">Poser une question</a>
                </div>
            </div>

            <aside class="matings-hero-card" aria-label="Informations sur les mariages à venir">
                <span>Suivi transparent</span>
                <strong>{{ $visibleMatingsCount }}</strong>
                <p>
                    {{ $visibleMatingsCount > 1 ? 'mariages visibles actuellement' : 'mariage visible actuellement' }}
                </p>

                <div class="matings-hero-note">
                    <small>Les informations peuvent évoluer selon la nature, la confirmation de gestation et le bien-être des parents.</small>
                </div>
            </aside>
        </div>
    </section>

    <section class="matings-section" id="matings-list">
        <div class="container">
            <div class="matings-section-head">
                <span class="matings-kicker">Planning</span>

                <h2>Les prochains mariages de la chatterie.</h2>

                <p>
                    Chaque fiche présente les parents, les dates estimées et les informations importantes pour suivre
                    les futures portées avec clarté.
                </p>
            </div>

            <div class="matings-grid">
                @forelse($matings as $mating)
                    @php
                        $statusClass = $statusClasses[$mating->status] ?? 'is-progress';
                    @endphp

                    <article class="mating-card {{ $statusClass }}">
                        <div class="mating-status">
                            {{ $mating->status_label }}
                        </div>

                        <div class="mating-parents-panel">
                            <div class="mating-parents">
                                <div class="mating-parent">
                                    @if($mating->father_photo)
                                        <figure>
                                            <img src="{{ asset('storage/' . $mating->father_photo) }}" alt="Photo du père {{ $mating->father_name }}">
                                        </figure>
                                    @else
                                        <div class="mating-parent-placeholder">P</div>
                                    @endif

                                    <div class="mating-parent-info">
                                        <span>Père</span>
                                        <strong>{{ $mating->father_name }}</strong>
                                    </div>
                                </div>

                                <div class="mating-link-symbol" aria-hidden="true">
                                    ×
                                </div>

                                <div class="mating-parent">
                                    @if($mating->mother_photo)
                                        <figure>
                                            <img src="{{ asset('storage/' . $mating->mother_photo) }}" alt="Photo de la mère {{ $mating->mother_name }}">
                                        </figure>
                                    @else
                                        <div class="mating-parent-placeholder">M</div>
                                    @endif

                                    <div class="mating-parent-info">
                                        <span>Mère</span>
                                        <strong>{{ $mating->mother_name }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mating-content">
                            <span class="mating-small-label">Projet de portée</span>

                            <h3>{{ $mating->display_title }}</h3>

                            <p class="mating-origin">
                                Union de {{ $mating->father_name }} et {{ $mating->mother_name }}.
                            </p>

                            @if($mating->description)
                                <p class="mating-description">
                                    {{ $mating->description }}
                                </p>
                            @endif

                            <div class="mating-dates">
                                <div>
                                    <span>Date de saillie</span>
                                    <strong>{{ $mating->mating_date_label }}</strong>
                                </div>

                                <div>
                                    <span>Naissance estimée</span>
                                    <strong>{{ $mating->expected_birth_label }}</strong>
                                </div>
                            </div>

                            @if($mating->expected_colors)
                                <div class="mating-colors">
                                    <span>Couleurs possibles</span>
                                    <p>{!! nl2br(e($mating->expected_colors)) !!}</p>
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="matings-empty">
                        <span class="matings-kicker">À venir</span>
                        <h3>Aucun mariage annoncé pour le moment.</h3>
                        <p>
                            Les prochains mariages seront présentés ici dès que la chatterie les annoncera.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
