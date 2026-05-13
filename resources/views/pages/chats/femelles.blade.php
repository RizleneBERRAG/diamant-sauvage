@extends('layouts.site')

@section('title', 'Nos femelles Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les femelles Bengal de la Chatterie du Diamant Sauvage : lignées, robes, caractère, tests santé et présentation.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/femelles.css') }}">
@endpush

@section('content')

    <section class="females-hero">
        <div class="container females-hero-grid">
            <div>
                <span class="kicker">Nos femelles</span>
                <h1>Des femelles Bengal sélectionnées avec exigence et passion.</h1>
                <p>
                    Chaque femelle de la chatterie est choisie pour sa beauté, son équilibre,
                    son tempérament et son rôle dans un programme d’élevage responsable.
                </p>

                <div class="hero-actions">
                    <a href="#femelles" class="btn btn-gold">Découvrir nos femelles</a>
                    <a href="{{ route('chats.disponibles') }}" class="btn btn-outline">Voir les chatons</a>
                </div>
            </div>

            <div class="hero-female-card">
                <div class="hero-female-photo">
                    <span>Photo femelle Bengal</span>
                </div>

                <div class="hero-floating-card">
                    <strong>Beauté · Santé · Caractère</strong>
                    <p>Une présentation claire pour comprendre chaque lignée.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="female-intro">
        <div class="container female-intro-grid">
            <div>
                <span class="section-label">Sélection</span>
                <h2>Des profils présentés avec clarté, élégance et transparence.</h2>
            </div>

            <div class="female-intro-text">
                <p>
                    Cette page permet de mettre en valeur chaque femelle avec ses informations essentielles :
                    robe, pedigree, tests, caractère, photos et rôle dans la chatterie.
                </p>
                <p>
                    L’objectif est d’aider les familles à mieux comprendre le sérieux du travail d’élevage,
                    tout en offrant une expérience visuelle plus moderne et rassurante.
                </p>
            </div>
        </div>
    </section>

    <section class="female-trust">
        <div class="container trust-grid">
            <div class="trust-item">
                <span>01</span>
                <strong>LOOF</strong>
                <p>Des informations claires sur l’inscription et les lignées.</p>
            </div>

            <div class="trust-item">
                <span>02</span>
                <strong>Tests santé</strong>
                <p>Une mise en avant propre des tests et suivis importants.</p>
            </div>

            <div class="trust-item">
                <span>03</span>
                <strong>Caractère</strong>
                <p>Une présentation humaine du tempérament de chaque femelle.</p>
            </div>

            <div class="trust-item">
                <span>04</span>
                <strong>Photos</strong>
                <p>Une galerie élégante pour valoriser la beauté des Bengal.</p>
            </div>
        </div>
    </section>

    <section class="female-list" id="femelles">
        <div class="container">
            <div class="list-heading">
                <div>
                    <span class="section-label">Femelles de la chatterie</span>
                    <h2>Nos reines Bengal</h2>
                </div>

                <p>
                    Les informations ci-dessous sont des exemples de présentation. Elles seront ensuite
                    remplacées par les vraies femelles, leurs photos et leurs détails.
                </p>
            </div>

            <div class="female-grid">

                <article class="female-card"
                         data-name="Uma"
                         data-robe="Brown spotted tabby"
                         data-status="Femelle reproductrice"
                         data-tests="PK-def, PRA-b, FIV/FELV"
                         data-character="Douce, observatrice et très proche de l’humain"
                         data-description="Uma est une femelle élégante, équilibrée et très expressive. Elle représente parfaitement l’esprit de la chatterie : beauté, douceur et présence.">

                    <div class="female-photo female-photo-1">
                        <span class="female-chip">Reproductrice</span>
                    </div>

                    <div class="female-content">
                        <div class="female-top">
                            <h3>Uma</h3>
                            <span>Brown spotted</span>
                        </div>

                        <p>
                            Une femelle élégante, proche de l’humain, avec un tempérament doux
                            et une très belle expression Bengal.
                        </p>

                        <div class="female-tags">
                            <span>LOOF</span>
                            <span>Testée</span>
                            <span>Douce</span>
                        </div>

                        <button type="button" class="female-more">Voir la fiche</button>
                    </div>
                </article>

                <article class="female-card"
                         data-name="Athéna"
                         data-robe="Seal tabby mink"
                         data-status="Femelle reproductrice"
                         data-tests="PK-def, PRA-b, FIV/FELV"
                         data-character="Curieuse, câline et très sociable"
                         data-description="Athéna est une femelle au regard intense, avec une présence douce et un caractère très attachant. Elle aime participer à la vie de la maison.">

                    <div class="female-photo female-photo-2">
                        <span class="female-chip">Reproductrice</span>
                    </div>

                    <div class="female-content">
                        <div class="female-top">
                            <h3>Athéna</h3>
                            <span>Seal mink</span>
                        </div>

                        <p>
                            Une femelle lumineuse, curieuse et très sociable, habituée au quotidien
                            familial et au contact humain.
                        </p>

                        <div class="female-tags">
                            <span>LOOF</span>
                            <span>Sociable</span>
                            <span>Mink</span>
                        </div>

                        <button type="button" class="female-more">Voir la fiche</button>
                    </div>
                </article>

                <article class="female-card"
                         data-name="Nala"
                         data-robe="Black silver spotted"
                         data-status="Femelle en observation"
                         data-tests="Tests à compléter"
                         data-character="Joueuse, vive et très expressive"
                         data-description="Nala est une jeune femelle pleine d’énergie, avec un très beau contraste et un caractère joueur. Elle est présentée ici comme exemple de fiche évolutive.">

                    <div class="female-photo female-photo-3">
                        <span class="female-chip female-chip-soft">En observation</span>
                    </div>

                    <div class="female-content">
                        <div class="female-top">
                            <h3>Nala</h3>
                            <span>Silver spotted</span>
                        </div>

                        <p>
                            Une jeune femelle vive, joueuse et expressive, avec une très belle présence
                            et un contraste marqué.
                        </p>

                        <div class="female-tags">
                            <span>Silver</span>
                            <span>Joueuse</span>
                            <span>Évolutive</span>
                        </div>

                        <button type="button" class="female-more">Voir la fiche</button>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <section class="female-focus">
        <div class="container focus-box">
            <div>
                <span class="section-label">Présentation premium</span>
                <h2>Une fiche claire pour chaque femelle.</h2>
                <p>
                    Chaque profil pourra contenir une galerie photo, les informations de santé,
                    le pedigree, la robe, le caractère, les portées associées et les liens vers les chatons.
                </p>
            </div>

            <div class="focus-list">
                <div><span></span> Galerie photos élégante</div>
                <div><span></span> Tests santé visibles</div>
                <div><span></span> Description du caractère</div>
                <div><span></span> Portées associées</div>
            </div>
        </div>
    </section>

    <div class="female-modal" id="femaleModal" aria-hidden="true">
        <div class="female-modal-overlay" data-close="true"></div>

        <div class="female-modal-panel">
            <button type="button" class="modal-close" data-close="true">×</button>

            <span class="modal-kicker">Fiche femelle</span>
            <h2 id="modalName">Nom</h2>

            <div class="modal-info-grid">
                <div>
                    <span>Robe</span>
                    <strong id="modalRobe">-</strong>
                </div>

                <div>
                    <span>Statut</span>
                    <strong id="modalStatus">-</strong>
                </div>

                <div>
                    <span>Tests</span>
                    <strong id="modalTests">-</strong>
                </div>

                <div>
                    <span>Caractère</span>
                    <strong id="modalCharacter">-</strong>
                </div>
            </div>

            <p id="modalDescription"></p>

            <a href="{{ route('contact') }}" class="btn btn-gold">Demander plus d’informations</a>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/femelles.js') }}"></script>
@endpush
