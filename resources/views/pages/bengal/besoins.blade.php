@extends('layouts.site')

@section('title', 'Besoins et alimentation du Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les besoins essentiels du Bengal, son alimentation, son rythme de repas et les croquettes utilisées ou recommandées à la Chatterie du Diamant Sauvage.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bengal/besoins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bengal/besoins-mobile.css') }}">
@endpush

@section('content')

    @php
        $croquetteSection = \App\Models\CroquetteSection::first();

        $croquettes = \App\Models\Croquette::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $defaultCroquetteLabel = 'À la chatterie';
        $defaultCroquetteTitle = 'Les croquettes utilisées et recommandées chez nous.';
        $defaultCroquetteDescription = 'Les gammes présentées ici peuvent évoluer selon l’âge, les besoins et la sensibilité de chaque chat. Elles sont affichées sous forme de cartes pour consulter facilement les informations essentielles et, lorsqu’elle est renseignée, la composition complète.';
    @endphp

    <section class="bengal-needs-hero">
        <div class="bengal-needs-hero-bg" style="--img: url('{{ asset('images/home/cat-detail-1.jpg') }}')"></div>
        <div class="bengal-needs-hero-overlay"></div>

        <div class="container bengal-needs-hero-inner">
            <div class="bengal-needs-hero-content">
                <span class="bengal-needs-kicker">Le Bengal au quotidien</span>

                <h1>
                    Besoins & alimentation
                    <em>d’un Bengal équilibré.</em>
                </h1>

                <p>
                    Le Bengal est un chat actif, intelligent, proche de l’humain et plein d’énergie.
                    Son environnement, son alimentation et son rythme de vie jouent un rôle essentiel dans
                    son bien-être, sa santé et son équilibre.
                </p>

                <div class="bengal-needs-hero-actions">
                    <a href="#besoins" class="btn btn-gold">Découvrir ses besoins</a>
                    <a href="#alimentation" class="btn btn-glass">Voir l’alimentation</a>
                </div>
            </div>

            <div class="bengal-needs-hero-card">
                <span>À retenir</span>

                <div>
                    <strong>Énergie</strong>
                    <p>Un chat joueur, vif et demandeur de stimulation.</p>
                </div>

                <div>
                    <strong>Présence</strong>
                    <p>Un Bengal très proche de son humain, souvent appelé “chat-chien”.</p>
                </div>

                <div>
                    <strong>Nutrition</strong>
                    <p>Une alimentation haut de gamme, stable et adaptée à sa sensibilité digestive.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bengal-needs-intro" id="besoins">
        <div class="container bengal-needs-intro-grid">
            <div class="bengal-needs-intro-content">
                <span class="bengal-needs-label">Son environnement</span>

                <h2>
                    Un Bengal a besoin d’espace, de hauteur et d’attention.
                </h2>

                <p>
                    Arbre à chat, emplacements en hauteur pour se reposer ou s’isoler, couchages,
                    griffoir, bac à litière, gamelles, eau fraîche, croquettes et jouets : son quotidien
                    doit être pensé pour répondre à son énergie et à sa curiosité.
                </p>

                <p>
                    Le Bengal apprécie particulièrement l’attention de son humain. Très joueur et proche
                    de sa famille, il peut aussi mieux vivre avec un compagnon si votre emploi du temps
                    est irrégulier.
                </p>
            </div>

            <div class="bengal-needs-intro-visual">
                <img src="{{ asset('images/le-bengal/besoins/gallery-13.jpg') }}" alt="Bengal dans son environnement">
            </div>
        </div>
    </section>

    <section class="bengal-needs-essentials">
        <div class="container">
            <div class="bengal-needs-section-head">
                <span class="bengal-needs-label">Les indispensables</span>
                <h2>Les essentiels pour accueillir un Bengal sereinement.</h2>
                <p>
                    Une sélection simple, claire et rassurante pour comprendre ce dont un Bengal a besoin
                    dans son environnement quotidien.
                </p>
            </div>

            <div class="needs-slider" data-needs-slider>
                <div class="needs-card-grid needs-track">
                    <article class="need-card">
                        <span>01</span>
                        <h3>Arbre à chat</h3>
                        <p>Un grand arbre à chat ou plusieurs espaces en hauteur pour grimper, observer et s’isoler.</p>
                    </article>

                    <article class="need-card">
                        <span>02</span>
                        <h3>Griffoir</h3>
                        <p>Un griffoir solide, le plus grand possible, pour répondre à son besoin naturel de faire ses griffes.</p>
                    </article>

                    <article class="need-card">
                        <span>03</span>
                        <h3>Couchages</h3>
                        <p>Des zones calmes et confortables pour se reposer, dormir et se sentir en sécurité.</p>
                    </article>

                    <article class="need-card">
                        <span>04</span>
                        <h3>Litière</h3>
                        <p>Un bac à litière ou une maison de toilette propre, accessible et adaptée à son confort.</p>
                    </article>

                    <article class="need-card">
                        <span>05</span>
                        <h3>Gamelles & eau</h3>
                        <p>Des gamelles propres, de l’eau fraîche toujours disponible et une alimentation stable.</p>
                    </article>

                    <article class="need-card">
                        <span>06</span>
                        <h3>Jouets</h3>
                        <p>Des jouets variés pour stimuler son instinct, son intelligence et son besoin d’activité.</p>
                    </article>

                    <article class="need-card need-card-highlight">
                        <span>07</span>
                        <h3>Attention humaine</h3>
                        <p>Un Bengal aime interagir avec sa famille. Il a besoin d’échanges, de présence et de stimulation.</p>
                    </article>

                    <article class="need-card need-card-highlight">
                        <span>08</span>
                        <h3>Compagnon possible</h3>
                        <p>Si votre rythme est irrégulier, un copain peut l’aider à mieux vivre les moments de solitude.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="bengal-food-editorial" id="alimentation">
        <div class="container bengal-food-grid">
            <div class="bengal-food-visual">
                <img src="{{ asset('images/le-bengal/besoins/kitten-8.jpg') }}" alt="Bengal et alimentation">
            </div>

            <div class="bengal-food-content">
                <span class="bengal-needs-label">Alimentation</span>

                <h2>
                    Une alimentation de qualité influence sa santé, son énergie et son apparence.
                </h2>

                <p>
                    L’alimentation est très importante car ce que vous donnez à votre chat a une influence
                    sur sa santé et son apparence. Elle doit être adaptée et de qualité.
                </p>

                <p>
                    À la chatterie, nous privilégions des croquettes très haut de gamme. Le chat peut manger
                    en plusieurs petites prises : par nature, il ne prend pas un seul repas, il grignote plutôt
                    plusieurs fois dans la journée.
                </p>

                <div class="food-note">
                    <strong>Conseil important</strong>
                    <p>
                        Évitez de limiter brutalement ses repas à 1 ou 2 prises par jour : cela peut causer
                        du stress, de l’anxiété ou des troubles du comportement chez certains chats.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bengal-food-rules">
        <div class="container">
            <div class="bengal-needs-section-head">
                <span class="bengal-needs-label">Bonnes pratiques</span>
                <h2>Les règles d’or pour préserver son équilibre digestif.</h2>
            </div>

            <div class="food-rules-grid">
                <article>
                    <span>◆</span>
                    <h3>Repas fractionnés</h3>
                    <p>Le Bengal peut grignoter plusieurs fois par jour. Son alimentation doit rester accessible et adaptée.</p>
                </article>

                <article>
                    <span>◆</span>
                    <h3>Eau fraîche</h3>
                    <p>Il doit toujours avoir de l’eau fraîche à sa portée, surtout avec une alimentation à base de croquettes.</p>
                </article>

                <article>
                    <span>◆</span>
                    <h3>Transition progressive</h3>
                    <p>Les changements alimentaires doivent se faire doucement afin d’éviter les troubles digestifs.</p>
                </article>

                <article>
                    <span>◆</span>
                    <h3>Attention aux restes</h3>
                    <p>Évitez les restes, l’excès de friandises et les changements brusques de régime alimentaire.</p>
                </article>
            </div>

            <div class="bengal-food-warning">
                <p>
                    Actif et musclé, le Bengal a besoin d’une alimentation riche en protéines, vitamines et minéraux.
                    Les acides gras insaturés contribuent à préserver l’éclat et la douceur de son pelage.
                    Cette race pouvant avoir une digestion sensible, la stabilité alimentaire est essentielle,
                    notamment chez les jeunes chats.
                </p>
            </div>
        </div>
    </section>

    <section class="bengal-products-section">
        <div class="container">
            <div class="bengal-needs-section-head section-head-light">
                <span class="bengal-needs-label">
                    {{ $croquetteSection?->label ?: $defaultCroquetteLabel }}
                </span>

                <h2>
                    {{ $croquetteSection?->title ?: $defaultCroquetteTitle }}
                </h2>

                <p>
                    {{ $croquetteSection?->description ?: $defaultCroquetteDescription }}
                </p>
            </div>

            <div class="food-products-grid">
                @forelse($croquettes as $croquette)
                    <article class="food-product-card {{ $croquette->is_featured ? 'food-product-featured' : '' }}">
                        <div class="food-product-top">
                            <figure class="food-pack-image">
                                @if($croquette->image)
                                    <img
                                        src="{{ asset('storage/' . $croquette->image) }}"
                                        alt="{{ $croquette->image_alt ?: $croquette->title }}"
                                    >
                                @else
                                    <img
                                        src="{{ asset('images/le-bengal/besoins/croquettes-chaton.jpg') }}"
                                        alt="{{ $croquette->title }}"
                                    >
                                @endif
                            </figure>

                            <div>
                                @if($croquette->tag)
                                    <span class="food-product-tag">{{ $croquette->tag }}</span>
                                @endif

                                <h3>{{ $croquette->title }}</h3>

                                @if($croquette->description)
                                    <p>{{ $croquette->description }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="food-stats">
                            @if($croquette->protein)
                                <div>
                                    <strong>{{ $croquette->protein }}</strong>
                                    <span>Protéines</span>
                                </div>
                            @endif

                            @if($croquette->fat)
                                <div>
                                    <strong>{{ $croquette->fat }}</strong>
                                    <span>Matières grasses</span>
                                </div>
                            @endif

                            @if($croquette->taurine)
                                <div>
                                    <strong>{{ $croquette->taurine }}</strong>
                                    <span>Taurine mg/kg</span>
                                </div>
                            @endif
                        </div>

                        <details class="food-details">
                            <summary>Voir la composition complète</summary>

                            <div class="food-detail-content">
                                @if($croquette->composition)
                                    <h4>Composition</h4>
                                    <p>{{ $croquette->composition }}</p>
                                @endif

                                @if($croquette->analytical_components)
                                    <h4>Constituants analytiques</h4>
                                    <p>{!! nl2br(e($croquette->analytical_components)) !!}</p>
                                @endif

                                @if($croquette->nutritional_additives)
                                    <h4>Additifs nutritionnels</h4>
                                    <p>{!! nl2br(e($croquette->nutritional_additives)) !!}</p>
                                @endif

                                @if($croquette->technological_additives)
                                    <h4>Additifs technologiques</h4>
                                    <p>{!! nl2br(e($croquette->technological_additives)) !!}</p>
                                @endif
                            </div>
                        </details>
                    </article>
                @empty
                    <article class="food-product-card food-product-empty">
                        <div class="food-product-top">
                            <div>
                                <span class="food-product-tag">Informations à venir</span>
                                <h3>Aucune gamme affichée pour le moment.</h3>
                                <p>
                                    Les recommandations alimentaires peuvent être ajoutées ou masquées depuis le tableau de bord.
                                    Lorsqu’une gamme est active, elle apparaît automatiquement dans cette section.
                                </p>
                            </div>
                        </div>
                    </article>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bengal-needs-final">
        <div class="container">
            <div class="bengal-needs-final-box">
                <span class="bengal-needs-label">Préparer son arrivée</span>

                <h2>Un Bengal bien préparé, c’est un chat plus serein dans sa nouvelle famille.</h2>

                <p>
                    Nous accompagnons chaque adoption avec attention afin que les familles puissent accueillir
                    leur chaton dans les meilleures conditions : matériel, alimentation, rythme de vie, conseils
                    et suivi après le départ.
                </p>

                <div class="bengal-needs-final-actions">
                    <a href="{{ route('bengal.arrivee') }}" class="btn btn-gold">Préparer son arrivée</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('[data-needs-slider] .needs-track').forEach((track) => {
                    if (track.dataset.cloned === 'true') return;

                    const cards = Array.from(track.children);

                    cards.forEach((card) => {
                        const clone = card.cloneNode(true);
                        clone.setAttribute('aria-hidden', 'true');
                        track.appendChild(clone);
                    });

                    track.dataset.cloned = 'true';
                });
            });
        </script>
    @endpush
@endsection
