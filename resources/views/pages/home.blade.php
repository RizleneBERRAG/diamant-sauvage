@extends('layouts.site')

@section('title', 'Chatterie du Diamant Sauvage | Bengal LOOF d’exception')
@section('description', 'Chatterie du Diamant Sauvage, élevage familial de Bengal LOOF. Découvrez nos Bengal, nos chatons disponibles, nos reproducteurs et notre accompagnement à l’adoption.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
@endpush

@section('content')

    <section class="luxury-hero">
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>

        <div class="container luxury-hero-grid">
            <div class="hero-content reveal-up">
                <span class="luxury-kicker">Chatterie Bengal LOOF</span>

                <h1>
                    Le Bengal d’exception,
                    <em>entre puissance sauvage et élégance précieuse.</em>
                </h1>

                <p>
                    Élevés avec passion dans un cadre familial, nos Bengal sont sélectionnés pour leur beauté,
                    leur santé, leur caractère et cette présence unique qui fait toute la noblesse de la race.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('chats.disponibles') }}" class="btn btn-gold magnetic-btn">
                        Découvrir les chatons
                    </a>

                    <a href="{{ route('chatterie') }}" class="btn btn-glass magnetic-btn">
                        L’univers de la chatterie
                    </a>
                </div>

                <div class="hero-signature">
                    <span></span>
                    <p>Bengal LOOF · Sélection · Santé · Sociabilisation</p>
                </div>
            </div>

            <div class="hero-visual reveal-scale">
                <div class="main-cat-card tilt-card">
                    <div class="cat-image photo-bg" style="--img: url('{{ asset('images/home/hero-bengal.jpg') }}')">
                        <span>Diamant Sauvage</span>

                        <div class="hero-info-strip">
                            <div class="hero-info-item">
                                <small>LOOF</small>
                                <strong>Lignées suivies</strong>
                            </div>

                            <div class="hero-info-divider"></div>

                            <div class="hero-info-item">
                                <small>Suivi</small>
                                <strong>Adoption accompagnée</strong>
                            </div>

                            <div class="hero-info-divider"></div>

                            <div class="hero-info-item">
                                <small>Élevage</small>
                                <strong>Familial & professionnel</strong>
                            </div>
                        </div>
                    </div>

                    <div class="cat-card-footer">
                        <div>
                            <strong>Bengal d’exception</strong>
                            <small>Beauté, caractère & élégance</small>
                        </div>
                        <span class="mini-diamond">◆</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $ribbonImages = [
            ['file' => 'kitten-1.jpg', 'alt' => 'Chat Bengal'],
            ['file' => 'kitten-2.jpg', 'alt' => 'Chatons Bengal'],
            ['file' => 'kitten-3.jpg', 'alt' => 'Jeune Bengal'],
            ['file' => 'kitten-4.jpg', 'alt' => 'Bengal dans son espace'],
            ['file' => 'gallery-1.jpg', 'alt' => 'Bengal'],
            ['file' => 'gallery-2.jpg', 'alt' => 'Chat Bengal'],
            ['file' => 'kitten-5.jpg', 'alt' => 'Chat Bengal'],
            ['file' => 'kitten-6.jpg', 'alt' => 'Chatons Bengal'],
            ['file' => 'kitten-7.jpg', 'alt' => 'Jeune Bengal'],
            ['file' => 'kitten-8.jpg', 'alt' => 'Bengal dans son espace'],
            ['file' => 'gallery-3.jpg', 'alt' => 'Bengal'],
            ['file' => 'gallery-4.jpg', 'alt' => 'Chat Bengal'],
        ];
    @endphp

    <section class="image-ribbon">
        <div class="ribbon-track">
            @foreach(array_merge($ribbonImages, $ribbonImages) as $image)
                <figure class="ribbon-photo smart-image">
                    <img src="{{ asset('images/home/' . $image['file']) }}" alt="{{ $image['alt'] }}">
                </figure>
            @endforeach
        </div>
    </section>

    <section class="luxury-intro">
        <div class="container intro-grid">
            <div class="reveal-up">
                <span class="section-label">La chatterie</span>
                <h2>Une chatterie familiale, professionnelle et passionnée en Isère.</h2>
            </div>

            <div class="intro-text reveal-up delay-1">
                <p>
                    La Chatterie du Diamant Sauvage est spécialisée dans le Bengal, avec une sélection attentive
                    portée sur la robe, le contraste, le caractère, la santé et l’équilibre de chaque chat.
                </p>

                <p>
                    Les chatons grandissent dans un environnement suivi, avec une attention particulière donnée
                    à leur sociabilisation, leur bien-être et leur préparation à rejoindre une famille sérieuse.
                </p>
            </div>
        </div>
    </section>

    <section class="kitten-showcase">
        <div class="container">
            <div class="section-heading section-heading-center reveal-up">
                <span class="section-label">Chatons Bengal</span>
                <h2>Nos chatons, élevés avec passion et douceur.</h2>
                <p>
                    Découvrez nos chatons actuellement proposés à l’adoption, leurs photos, leur caractère, leur évolution et toutes les informations utiles pour préparer leur arrivée.
                </p>
            </div>

            <div class="kitten-editorial-grid">

                <a href="{{ route('chats.disponibles') }}" class="kitten-editorial-card kitten-editorial-card-large reveal-up tilt-card">
                    <img src="{{ asset('images/home/kitten-1.jpg') }}" alt="Chaton Bengal disponible">

                    <div class="kitten-editorial-overlay"></div>

                    <div class="kitten-editorial-content">
                        <span class="kitten-status">Disponible</span>
                        <h3>Chatons Bengal disponibles</h3>
                        <p>
                            Découvrez nos chatons actuellement proposés à l’adoption, leurs photos, leur caractère, leur évolution et toutes les informations utiles pour préparer leur arrivée.
                        </p>
                        <strong>Voir les disponibilités</strong>
                    </div>
                </a>

                <div class="kitten-editorial-column">

                    <a href="{{ route('chats.disponibles') }}" class="kitten-editorial-card reveal-up delay-1 tilt-card">
                        <img src="{{ asset('images/home/kitten-2.jpg') }}" alt="Portées Bengal à venir">

                        <div class="kitten-editorial-overlay"></div>

                        <div class="kitten-editorial-content">
                            <span>Naissances</span>
                            <h3>Portées à venir</h3>
                            <p>Suivez nos prochaines naissances, les mariages prévus et les possibilités de réservation auprès de la chatterie.</p>
                        </div>
                    </a>

                    <a href="{{ route('chats.disponibles') }}" class="kitten-editorial-card reveal-up delay-2 tilt-card">
                        <img src="{{ asset('images/home/kitten-3.jpg') }}" alt="Évolution des chatons Bengal">

                        <div class="kitten-editorial-overlay"></div>

                        <div class="kitten-editorial-content">
                            <span>Suivi</span>
                            <h3>Évolution des chatons</h3>
                            <p>De leurs premiers jours à leur départ, suivez l’évolution de nos petits Bengals à travers leurs photos, leurs découvertes et leurs progrès.</p>
                        </div>
                    </a>

                </div>

            </div>

        </div>
    </section>

    <section class="luxury-navigation">
        <div class="container">
            <div class="navigation-premium-head reveal-up">
                <span class="section-label">Navigation premium</span>
                <h2>Explorez l’univers du Diamant Sauvage.</h2>
                <p>
                    Chaque espace du site a été pensé pour guider les familles avec élégance :
                    découvrir la chatterie, rencontrer les reproducteurs, suivre les portées et préparer une adoption en confiance.
                </p>
            </div>

            <div class="premium-nav-layout">

                <a href="{{ route('chatterie') }}" class="premium-nav-card premium-nav-card-large reveal-up tilt-card">
                    <img src="{{ asset('images/home/gallery-1.jpg') }}" alt="La chatterie du Diamant Sauvage">

                    <div class="premium-nav-overlay"></div>

                    <div class="premium-nav-content">
                        <span>01 · La chatterie</span>
                        <h3>Un élevage familial, passionné et exigeant.</h3>
                        <p>
                            Découvrez l’histoire, les valeurs, l’environnement et le sérieux de la Chatterie du Diamant Sauvage.
                        </p>
                        <strong>Découvrir la chatterie</strong>
                    </div>
                </a>

                <div class="premium-nav-grid">

                    <a href="{{ route('chats.femelles') }}" class="premium-nav-card reveal-up delay-1 tilt-card">
                        <img src="{{ asset('images/home/gallery-2.jpg') }}" alt="Femelles Bengal">

                        <div class="premium-nav-overlay"></div>

                        <div class="premium-nav-content">
                            <span>02 · Nos reines</span>
                            <h3>Nos femelles</h3>
                            <p>Caractère, robe, tests, lignée et photos.</p>
                            <strong>Voir les femelles</strong>
                        </div>
                    </a>

                    <a href="{{ route('chats.males') }}" class="premium-nav-card reveal-up delay-2 tilt-card">
                        <img src="{{ asset('images/home/cat-detail-1.jpg') }}" alt="Mâles Bengal">

                        <div class="premium-nav-overlay"></div>

                        <div class="premium-nav-content">
                            <span>03 · Prestige</span>
                            <h3>Nos mâles</h3>
                            <p>Une présentation élégante des reproducteurs.</p>
                            <strong>Voir les mâles</strong>
                        </div>
                    </a>

                    <a href="{{ route('chats.disponibles') }}" class="premium-nav-card premium-nav-card-gold reveal-up delay-3 tilt-card">
                        <img src="{{ asset('images/home/kitten-1.jpg') }}" alt="Chatons Bengal disponibles">

                        <div class="premium-nav-overlay"></div>

                        <div class="premium-nav-content">
                            <span>04 · Adoption</span>
                            <h3>Chatons disponibles</h3>
                            <p>Disponibilités, portées à venir et demandes d’adoption.</p>
                            <strong>Voir les chatons</strong>
                        </div>
                    </a>

                    <a href="{{ route('contact') }}" class="premium-nav-card premium-nav-card-dark reveal-up delay-3 tilt-card">
                        <img src="{{ asset('images/home/kitten-6.jpg') }}" alt="Chatons Bengal disponibles">
                        <div class="premium-nav-overlay"></div>

                        <div class="premium-nav-content">
                            <span>05 · Contact</span>
                            <h3>Une question ?</h3>
                            <p>Échangez avec la chatterie pour préparer votre projet d’adoption.</p>
                            <strong>Contacter la chatterie</strong>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <section class="bengal-world">
        <div class="container bengal-world-grid">
            <div class="bengal-world-content reveal-up">
                <span class="section-label">Le Bengal</span>
                <h2>Une race fascinante, vive, expressive et profondément attachante.</h2>
                <p>
                    Le Bengal séduit par son allure de petit léopard, ses rosettes, son contraste,
                    son intelligence et son tempérament très interactif. C’est un chat élégant,
                    joueur, curieux et proche de l’humain.
                </p>

                <div class="bengal-tags">
                    <span>Brown</span>
                    <span>Snow</span>
                    <span>Silver</span>
                    <span>Charcoal</span>
                    <span>Glitter</span>
                    <span>Rosettes</span>
                </div>

                <a href="{{ route('bengal.origines') }}" class="btn btn-gold magnetic-btn">Découvrir la race</a>
            </div>

            <div class="bengal-world-visual reveal-scale">
                <div class="bengal-detail-card photo-bg" style="--img: url('{{ asset('images/home/cat-detail-1.jpg') }}')">
                    <div>
                        <strong>Beauté sauvage</strong>
                        <span>Contraste, robe et élégance naturelle</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="visual-story">
        <div class="container visual-story-grid">
            <div class="story-content reveal-up">
                <span class="section-label">Expérience adoptant</span>
                <h2>Un parcours d’adoption rassurant, clair et bienveillant.</h2>
                <p>
                    Nous attachons une grande importance à offrir à chaque famille un accompagnement sérieux et transparent.
                    De la première prise de contact jusqu’au départ du chaton, chaque étape est pensée pour garantir confiance, sérénité et bien-être.
                </p>

                <div class="story-points">
                    <div>
                        <strong>Premier contact</strong>
                        <span>Un échange simple et bienveillant pour comprendre votre projet, répondre à vos questions et vous orienter vers le chaton qui vous correspond.</span>
                    </div>

                    <div>
                        <strong>Suivi & préparation</strong>
                        <span>Nous vous informons à chaque étape : évolution du chaton, soins, socialisation, documents et conditions de départ.</span>
                    </div>

                    <div>
                        <strong>Départ & accompagnement</strong>
                        <span>Le jour du départ, tout est préparé avec soin, et nous restons disponibles pour vous conseiller même après l’adoption.</span>
                    </div>
                </div>
            </div>

            <div class="story-gallery reveal-scale">
                <div class="story-img story-img-large photo-bg" style="--img: url('{{ asset('images/home/gallery-3.jpg') }}')"></div>
                <div class="story-img photo-bg" style="--img: url('{{ asset('images/home/gallery-4.jpg') }}')"></div>
                <div class="story-img photo-bg" style="--img: url('{{ asset('images/home/gallery-5.jpg') }}')"></div>
            </div>
        </div>
    </section>

    <section class="home-gallery">
        <div class="container">
            <div class="section-heading reveal-up">
                <span class="section-label">Galerie</span>
                <h2>Des instants précieux à découvrir en images.</h2>
                <p>
                    À travers chaque image, découvrez l’élégance, le regard, les robes et les attitudes uniques de nos Bengals, élevés dans un environnement doux et attentionné.                </p>
            </div>

            <div class="gallery-masonry">
                <div class="gallery-photo gallery-photo-tall photo-bg reveal-up" style="--img: url('{{ asset('images/home/gallery-1.jpg') }}')"></div>
                <div class="gallery-photo photo-bg reveal-up delay-1" style="--img: url('{{ asset('images/home/gallery-2.jpg') }}')"></div>
                <div class="gallery-photo photo-bg reveal-up delay-2" style="--img: url('{{ asset('images/home/gallery-3.jpg') }}')"></div>
                <div class="gallery-photo gallery-photo-wide photo-bg reveal-up delay-3" style="--img: url('{{ asset('images/home/gallery-4.jpg') }}')"></div>
                <div class="gallery-photo photo-bg reveal-up" style="--img: url('{{ asset('images/home/gallery-6.jpg') }}')"></div>
                <div class="gallery-photo photo-bg reveal-up delay-1" style="--img: url('{{ asset('images/home/kitten-6.jpg') }}')"></div>
            </div>
        </div>
    </section>

    <section class="soft-credentials">
        <div class="container credentials-box reveal-up">
            <div class="credentials-text">
                <span class="section-label">Références & sérieux</span>
                <h2>Des garanties discrètes, mais essentielles.</h2>
                <p>
                    La Chatterie du Diamant Sauvage s’inscrit dans une démarche sérieuse autour du Bengal :
                    suivi des lignées, sélection attentive, santé, sociabilisation et accompagnement des familles.
                </p>
            </div>

            <div class="credentials-icons">
                @php
                    $organizations = [
                        [
                            'name' => 'LOOF',
                            'logo' => 'images/organizations/loof.png',
                            'alt' => 'Logo LOOF',
                            'text' => 'Traçabilité, race et suivi généalogique.'
                        ],
                        [
                            'name' => 'TICA',
                            'logo' => 'images/organizations/tica.png',
                            'alt' => 'Logo TICA',
                            'text' => 'Référence internationale du monde félin.'
                        ],
                        [
                            'name' => 'CFE',
                            'logo' => 'images/organizations/cfe.png',
                            'alt' => 'Logo CFE',
                            'text' => 'Engagement, sérieux et passion féline.'
                        ],
                    ];
                @endphp

                @foreach($organizations as $organization)
                    <article class="lux-icon-card">
                        <div class="lux-icon lux-icon-image">
                            <img src="{{ asset($organization['logo']) }}" alt="{{ $organization['alt'] }}">
                        </div>

                        <h3>{{ $organization['name'] }}</h3>
                        <p>{{ $organization['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="luxury-cta">
        <div class="container cta-inner reveal-up">
            <span class="section-label">Contact</span>
            <h2>Vous rêvez d’accueillir un Bengal d’exception ?</h2>
            <p>
                Nous serons ravis d’échanger avec vous, de répondre à vos questions et de
                vous accompagner dans votre projet d’adoption avec sérieux, bienveillance et passion.
            </p>

            <a href="{{ route('contact') }}" class="btn btn-gold magnetic-btn">Contacter la chatterie</a>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
