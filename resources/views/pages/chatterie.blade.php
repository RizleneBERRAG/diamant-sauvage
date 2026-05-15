@extends('layouts.site')

@section('title', 'La chatterie | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez la Chatterie du Diamant Sauvage, élevage familial et professionnel de Bengals LOOF situé à Villeneuve-de-Marc en Isère.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chatterie.css') }}">
@endpush

@section('content')

    <section
        class="cattery-hero-video"
        style="--poster-img: url('{{ asset('images/chatterie/chatterie-hero-poster.jpg') }}')"
    >
        <div class="cattery-hero-media">
            <video
                class="js-cattery-hero-video"
                autoplay
                muted
                loop
                playsinline
                webkit-playsinline
                preload="auto"
                poster="{{ asset('images/chatterie/chatterie-hero-poster.jpg') }}"
            >
                <source src="{{ asset('videos/chatterie/chatterie-hero.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="cattery-hero-video-overlay"></div>
        <div class="cattery-hero-video-glow"></div>

        <div class="container cattery-hero-video-inner">
            <div class="cattery-hero-top-badge cattery-reveal">
                <span>Villeneuve-de-Marc · Isère</span>
                <strong>Chatterie familiale de Bengals LOOF</strong>
            </div>

            <div class="cattery-hero-main cattery-reveal delay-1">
                <span class="cattery-kicker">La chatterie</span>

                <h1>
                    Un lieu pensé avec douceur,
                    <em>pour des Bengals d’exception.</em>
                </h1>

                <p>
                    Découvrez un univers élégant, rassurant et soigneusement conçu pour le bien-être,
                    la sociabilisation et l’épanouissement de chaque chaton.
                </p>

                <div class="cattery-hero-actions">
                    <a href="#univers" class="btn btn-gold cattery-scroll">Découvrir la chatterie</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light">Nous contacter</a>
                </div>
            </div>

            <div class="cattery-hero-signals cattery-reveal delay-2">
                <div>
                    <span></span>
                    <strong>Élevage familial</strong>
                    <p>Un cadre calme, humain et attentif.</p>
                </div>

                <div>
                    <span></span>
                    <strong>Espaces soignés</strong>
                    <p>Des installations propres et adaptées.</p>
                </div>

                <div>
                    <span></span>
                    <strong>Bengals sélectionnés</strong>
                    <p>Beauté, santé, caractère et équilibre.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cattery-family" id="univers">
        <div class="container">
            <div class="cattery-family-head cattery-reveal">
                <span class="cattery-kicker cattery-kicker-dark">Qui sommes-nous ?</span>

                <h2>
                    Une chatterie dédiée exclusivement à l’élégance du Bengal.
                </h2>

                <p>
                    À la Chatterie du Diamant Sauvage, nous sommes spécialisés uniquement dans la race Bengal.
                    Chaque chat est sélectionné avec exigence, selon des critères précis de beauté, de santé,
                    de caractère et d’équilibre, afin de préserver toute la noblesse de cette race fascinante.
                </p>
            </div>

            <div class="cattery-family-card cattery-reveal delay-1">
                <div class="cattery-family-image" style="--img: url('{{ asset('images/chatterie/famille-chatterie.jpg') }}')">
                    <img src="{{ asset('images/chatterie/famille-chatterie.jpg') }}" alt="Famille de la Chatterie du Diamant Sauvage avec leurs Bengals">

                    <div class="cattery-family-image-label">
                        <span>Une passion familiale</span>
                        <strong>Bengals sélectionnés avec soin</strong>
                    </div>
                </div>

                <div class="cattery-family-content">
                    <span class="cattery-mini-kicker">Notre histoire</span>

                    <h3>
                        Une passion exigeante, tournée vers la qualité et l’avenir de nos lignées.
                    </h3>

                    <p>
                        Nos Bengals sont issus de sélections rigoureuses, réalisées auprès d’élevages français
                        et étrangers reconnus pour leur sérieux. Cette ouverture nous permet de travailler des lignées
                        de qualité, tout en poursuivant une volonté de développement à l’international.
                    </p>

                    <div class="cattery-family-values">
                        <div>
                            <strong>Spécialisation</strong>
                            <span>Un élevage consacré exclusivement au Bengal, pour mieux connaître, comprendre et valoriser cette race unique.</span>
                        </div>

                        <div>
                            <strong>Sélection</strong>
                            <span>Des chats choisis avec attention selon leur type, leur robe, leur caractère, leur santé et leur équilibre.</span>
                        </div>

                        <div>
                            <strong>Passion</strong>
                            <span>Une équipe investie, disponible pour échanger, conseiller et présenter ses chats avec transparence.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cattery-mission">
        <div class="container">
            <div class="cattery-mission-head cattery-reveal">
                <span class="cattery-kicker cattery-kicker-dark">Notre mission</span>

                <h2>
                    Offrir à chaque Bengal un départ serein, équilibré et entouré.
                </h2>

                <p>
                    Notre priorité est simple : faire grandir des chatons bien dans leurs pattes,
                    proches de l’humain et prêts à rejoindre leur future famille avec confiance.
                </p>
            </div>

            <div class="cattery-mission-layout">
                <article class="cattery-mission-location cattery-reveal delay-1">
                    <span>Sud-est de la France</span>
                    <h3>Villeneuve-de-Marc</h3>
                    <p>
                        La chatterie est située en Isère, à environ 45 minutes de Lyon et de Grenoble.
                    </p>

                    <div class="mission-location-tags">
                        <strong>Isère · 38</strong>
                        <strong>Chambre d’agriculture</strong>
                        <strong>ACCACED</strong>
                    </div>
                </article>

                <article class="cattery-mission-text cattery-reveal delay-2">
                    <span>Une chatterie professionnelle et familiale</span>

                    <p>
                        La Chatterie du Diamant Sauvage est une chatterie déclarée, familiale et professionnelle,
                        portée par une expérience grandissante dans l’élevage félin.
                    </p>

                    <p>
                        Chaque jour, les installations et les conditions de vie sont pensées pour favoriser le confort,
                        la sécurité, l’épanouissement et la sociabilisation des chats.
                    </p>
                </article>
            </div>

            <div class="cattery-mission-cards">
                <article class="cattery-reveal">
                    <span>01</span>
                    <h3>Bien-être avant tout</h3>
                    <p>
                        Les chats sont accompagnés avec attention, dans un cadre sain, propre et adapté à leurs besoins.
                    </p>
                </article>

                <article class="cattery-reveal delay-1">
                    <span>02</span>
                    <h3>Sociabilisation</h3>
                    <p>
                        Les chatons sont habitués à l’humain et au quotidien afin de rejoindre leur famille sereinement.
                    </p>
                </article>

                <article class="cattery-reveal delay-2">
                    <span>03</span>
                    <h3>Familles adoptantes</h3>
                    <p>
                        L’objectif est de confier des chatons ou chats retraités équilibrés, confiants et bien accompagnés.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="cattery-pillars">
        <div class="container">
            <div class="cattery-section-head cattery-reveal">
                <span class="cattery-kicker cattery-kicker-dark">Que proposons-nous ?</span>

                <h2>
                    Des Bengals sélectionnés pour leur beauté, leur équilibre et leur caractère.
                </h2>

                <p>
                    La Chatterie du Diamant Sauvage propose des Bengals issus d’un travail de sélection rigoureux,
                    avec une attention portée à la santé, au bien-être, aux couleurs, aux motifs et à l’harmonie générale de chaque chat.
                </p>
            </div>

            <div class="cattery-pillars-grid">
                <article class="cattery-pillar-card cattery-reveal">

                    <h3>Chats de qualité</h3>

                    <p>
                        Nous élevons des Bengals avec sérieux, dans une démarche attentive à leur santé,
                        leur équilibre, leur sociabilisation et leur bien-être au quotidien.
                    </p>
                </article>

                <article class="cattery-pillar-card cattery-reveal delay-1">

                    <h3>Couleurs travaillées</h3>

                    <p>
                        La chatterie travaille notamment les couleurs snow, silver et brown,
                        avec des robes expressives, élégantes et recherchées.
                    </p>
                </article>

                <article class="cattery-pillar-card cattery-reveal delay-2">

                    <h3>Motifs & looks</h3>

                    <p>
                        Nous développons des Bengals à rosettes fermées, avec un travail autour du paw-print
                        et deux looks distincts afin de proposer des profils variés.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="cattery-spaces">
        <div class="container">
            <div class="cattery-section-head cattery-section-head-light cattery-reveal">
                <span class="cattery-kicker">Les espaces</span>
                <h2>Des installations pensées autour du confort.</h2>
                <p>
                    Adultes, mamans, chatons : chaque espace a son rôle, son ambiance et son niveau d’attention.
                </p>
            </div>

            <div class="cattery-spaces-grid">
                <article class="cattery-space-card cattery-space-large cattery-reveal">
                    <div class="cattery-space-slider" data-cattery-slider>
                        <div class="cattery-space-track">
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/adultes-1.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/adultes-2.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/adultes-3.jpg') }}')"></div>
                        </div>

                        <button class="cattery-slider-btn cattery-slider-prev" type="button" aria-label="Image précédente">‹</button>
                        <button class="cattery-slider-btn cattery-slider-next" type="button" aria-label="Image suivante">›</button>

                        <div class="cattery-slider-dots" aria-hidden="true"></div>
                    </div>

                    <div class="cattery-space-content">
                        <span>Adultes</span>
                        <h3>Box intérieurs & volières extérieures</h3>
                        <p>
                            Les adultes disposent d’espaces intérieurs et extérieurs leur permettant de profiter
                            d’un cadre adapté, confortable et sécurisé tout au long de l’année.
                        </p>
                    </div>
                </article>

                <article class="cattery-space-card cattery-reveal delay-1">
                    <div class="cattery-space-slider" data-cattery-slider>
                        <div class="cattery-space-track">
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/volieres-1.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/volieres-2.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/volieres-3.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/volieres-4.jpg') }}')"></div>

                        </div>

                        <button class="cattery-slider-btn cattery-slider-prev" type="button" aria-label="Image précédente">‹</button>
                        <button class="cattery-slider-btn cattery-slider-next" type="button" aria-label="Image suivante">›</button>

                        <div class="cattery-slider-dots" aria-hidden="true"></div>
                    </div>

                    <div class="cattery-space-content">
                        <span>Extérieur</span>
                        <h3>Volières sécurisées</h3>
                        <p>
                            Des espaces protégés pour observer, grimper, jouer et profiter de stimulations naturelles.
                        </p>
                    </div>
                </article>

                <article class="cattery-space-card cattery-reveal delay-2">
                    <div class="cattery-space-slider" data-cattery-slider>
                        <div class="cattery-space-track">
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-1.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-2.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-3.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-4.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-5.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-6.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-7.jpg') }}')"></div>
                            <div class="cattery-space-slide photo-bg" style="--img: url('{{ asset('images/chatterie/espaces/maternite-8.jpg') }}')"></div>
                        </div>

                        <button class="cattery-slider-btn cattery-slider-prev" type="button" aria-label="Image précédente">‹</button>
                        <button class="cattery-slider-btn cattery-slider-next" type="button" aria-label="Image suivante">›</button>

                        <div class="cattery-slider-dots" aria-hidden="true"></div>
                    </div>

                    <div class="cattery-space-content">
                        <span>Maternité</span>
                        <h3>Espaces séparés pour les mamans</h3>
                        <p>
                            Des pièces dédiées aux mamans et aux bébés pour préserver le calme, la chaleur et la sérénité.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="cattery-care">
        <div class="container cattery-care-grid">
            <div class="cattery-care-visual cattery-reveal">
                <div class="cattery-care-photo photo-bg" style="--img: url('{{ asset('images/chatterie/bien-etre.jpg') }}')"></div>
                <div class="care-badge">
                    <strong>Suivi quotidien</strong>
                    <span>Confort · sécurité · attention</span>
                </div>
            </div>

            <div class="cattery-care-content cattery-reveal delay-1">
                <span class="cattery-kicker cattery-kicker-dark">Au quotidien</span>

                <h2>Une présence attentive, discrète et constante.</h2>

                <p>
                    Le bien-être ne se résume pas à une belle installation. Il se construit chaque jour :
                    observation, hygiène, confort thermique, sociabilisation, jeux, repos et attention portée au comportement de chacun.
                </p>

                <div class="care-list">
                    <div>
                        <strong>Caméras</strong>
                        <span>Surveillance des espaces sensibles</span>
                    </div>

                    <div>
                        <strong>Chauffage</strong>
                        <span>Confort adapté selon les périodes</span>
                    </div>

                    <div>
                        <strong>Socialisation</strong>
                        <span>Chatons habitués à l’humain et au quotidien</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cattery-colors">
        <div class="container">
            <div class="cattery-section-head cattery-reveal">
                <span class="cattery-kicker cattery-kicker-dark">Le travail de sélection</span>
                <h2>Des robes Bengal recherchées et travaillées avec soin.</h2>
                <p>
                    La chatterie travaille notamment des Bengals snow, silver et brown, avec des rosettes fermées et des looks distincts.
                </p>
            </div>

            <div class="cattery-colors-grid">
                <article class="cattery-color-card cattery-reveal">
                    <div class="color-orb color-orb-snow"></div>
                    <span>Snow</span>
                    <p>Une robe lumineuse, douce et contrastée, très élégante.</p>
                </article>

                <article class="cattery-color-card cattery-reveal delay-1">
                    <div class="color-orb color-orb-silver"></div>
                    <span>Silver</span>
                    <p>Un rendu froid, précieux et graphique, avec beaucoup de présence.</p>
                </article>

                <article class="cattery-color-card cattery-reveal delay-2">
                    <div class="color-orb color-orb-brown"></div>
                    <span>Brown</span>
                    <p>Le Bengal sauvage par excellence, chaud, intense et expressif.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="cattery-gallery">
        <div class="container">
            <div class="cattery-section-head cattery-section-head-light cattery-reveal">
                <span class="cattery-kicker">Moments de vie</span>
                <h2>Une immersion dans l’ambiance de la chatterie.</h2>
                <p>
                    Quelques aperçus visuels pour ressentir l’environnement, la douceur et l’attention portée aux chats.
                </p>
            </div>

            <div class="cattery-gallery-grid">
                <figure class="cattery-gallery-item cattery-gallery-tall photo-bg cattery-reveal" style="--img: url('{{ asset('images/chatterie/gallery-3.jpg') }}')"></figure>
                <figure class="cattery-gallery-item photo-bg cattery-reveal delay-1" style="--img: url('{{ asset('images/chatterie/gallery-2.jpg') }}')"></figure>
                <figure class="cattery-gallery-item photo-bg cattery-reveal delay-2" style="--img: url('{{ asset('images/chatterie/gallery-1.jpg') }}')"></figure>
                <figure class="cattery-gallery-item cattery-gallery-wide photo-bg cattery-reveal delay-3" style="--img: url('{{ asset('images/chatterie/gallery-4.jpg') }}')"></figure>
            </div>
        </div>
    </section>

    <section class="cattery-commitments">
        <div class="container">
            <div class="cattery-commitments-shell cattery-reveal">
                <div class="cattery-commitments-intro">
                    <span class="cattery-kicker">Confiance & transparence</span>

                    <h2>
                        Une chatterie sérieuse, identifiable et engagée.
                    </h2>

                    <p>
                        La Chatterie du Diamant Sauvage s’inscrit dans une démarche claire :
                        présenter son travail avec transparence, accompagner les familles avec sérieux
                        et valoriser une sélection Bengal suivie, réfléchie et responsable.
                    </p>
                </div>

                <div class="cattery-commitments-grid">
                    <article>
                        <span>01</span>
                        <h3>Chatterie déclarée</h3>
                        <p>
                            Une activité identifiable, structurée et pensée pour offrir un cadre rassurant aux familles adoptantes.
                        </p>
                    </article>

                    <article>
                        <span>02</span>
                        <h3>Suivi des lignées</h3>
                        <p>
                            Des Bengals sélectionnés avec attention, issus de lignées travaillées en France et à l’étranger.
                        </p>
                    </article>

                    <article>
                        <span>03</span>
                        <h3>Échanges transparents</h3>
                        <p>
                            Des informations claires sur les chats, leur évolution, leur caractère et les conditions d’adoption.
                        </p>
                    </article>

                    <article>
                        <span>04</span>
                        <h3>Accompagnement</h3>
                        <p>
                            Une présence avant l’adoption, mais aussi après le départ du chaton dans sa nouvelle famille.
                        </p>
                    </article>
                </div>

                <div class="cattery-certifications">
                    <span>Références & affiliations</span>

                    <div>
                        <strong>LOOF</strong>
                        <strong>TICA</strong>
                        <strong>Cercle des Félins</strong>
                        <strong>SNPCC</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cattery-final-cta">
        <div class="container">
            <div class="cattery-final-inner cattery-reveal">
                <span class="cattery-kicker">Projet d’adoption</span>

                <h2>Vous souhaitez découvrir les chats ou échanger avec la chatterie ?</h2>

                <p>
                    Chaque adoption mérite un vrai échange. La chatterie vous accompagne pour répondre à vos questions
                    et vous guider vers un projet cohérent.
                </p>

                <div class="cattery-final-actions">
                    <a href="{{ route('chats.index') }}" class="btn btn-gold">Découvrir nos chats</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/chatterie.js') }}"></script>
@endpush
