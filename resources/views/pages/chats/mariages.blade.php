@extends('layouts.site')

@section('title', 'Mariages à venir | Chatterie du Diamant Sauvage')

@section('description', 'Découvrez les mariages à venir de la Chatterie du Diamant Sauvage, les parents, les dates estimées et les couleurs possibles des futurs chatons Bengal.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chats/mariages.css') }}">
@endpush

@section('content')

    <section class="matings-hero">
        <div class="container matings-hero-grid">
            <div>
                <span class="matings-kicker">Naissances à venir</span>

                <h1>
                    Mariages
                    <em>à venir</em>
                </h1>

                <p>
                    Retrouvez ici les mariages prévus ou en cours à la chatterie, avec les parents,
                    les dates estimées et les couleurs possibles des futurs chatons.
                </p>
            </div>

            <div class="matings-hero-card">
                <span>Suivi transparent</span>
                <strong>Chaque mariage est présenté avec soin.</strong>
                <p>
                    Les informations sont mises à jour selon l’évolution du mariage, la confirmation de gestation
                    et les prévisions de naissance.
                </p>
            </div>
        </div>
    </section>

    <section class="matings-section">
        <div class="container">
            <div class="matings-section-head">
                <span class="matings-kicker">Planning</span>

                <h2>Les prochains mariages de la chatterie.</h2>

                <p>
                    Ces informations sont données à titre indicatif et peuvent évoluer selon la nature,
                    la confirmation de gestation et le bien-être des parents.
                </p>
            </div>

            <div class="matings-grid">
                @forelse($matings as $mating)
                    <article class="mating-card">
                        <div class="mating-status">
                            {{ $mating->status_label }}
                        </div>

                        <div class="mating-parents">
                            <div class="mating-parent">
                                @if($mating->father_photo)
                                    <figure>
                                        <img src="{{ asset('storage/' . $mating->father_photo) }}" alt="Photo du père {{ $mating->father_name }}">
                                    </figure>
                                @else
                                    <div class="mating-parent-placeholder">P</div>
                                @endif

                                <span>Père</span>
                                <strong>{{ $mating->father_name }}</strong>
                            </div>

                            <div class="mating-link-symbol">
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

                                <span>Mère</span>
                                <strong>{{ $mating->mother_name }}</strong>
                            </div>
                        </div>

                        <div class="mating-content">
                            <h3>{{ $mating->display_title }}</h3>

                            <p class="mating-origin">
                                Issue du mariage de {{ $mating->father_name }} et {{ $mating->mother_name }}.
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
                                    <span>Arrivée potentielle</span>
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
