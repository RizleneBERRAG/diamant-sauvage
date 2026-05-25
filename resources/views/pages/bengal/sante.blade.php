@extends('layouts.site')

@section('title', 'Santé du Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Suivi vétérinaire, prévention, maladies génétiques, tests ADN et engagement santé pour les Bengal de la Chatterie du Diamant Sauvage.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bengal/sante.css') }}">
@endpush

@section('content')

    <section class="sante-hero">
        <div class="container sante-hero-grid">
            <div class="sante-hero-content">
                <span class="sante-eyebrow">Santé du Bengal</span>

                <h1>
                    Prévenir avec sérieux,
                    <span>élever avec confiance.</span>
                </h1>

                <p>
                    La santé du Bengal se construit avec un suivi vétérinaire régulier, une prévention adaptée,
                    une attention particulière au transit et une sélection responsable des reproducteurs.
                </p>

                <div class="sante-hero-actions">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Poser une question</a>
                    <a href="#dossier-sante" class="btn btn-glass">Voir le dossier santé</a>
                </div>
            </div>

            <div class="sante-hero-visual">
                <figure class="sante-portrait-card">
                    <img src="{{ asset('images\le-bengal\sante/cat-detail-1.jpg') }}" alt="Bengal de la Chatterie du Diamant Sauvage">
                </figure>

                <div class="sante-health-card">
                    <div class="sante-health-card-head">
                        <span>Carnet santé</span>
                        <strong>Bengal LOOF</strong>
                    </div>

                    <div class="sante-health-card-lines">
                        <div>
                            <small>Suivi</small>
                            <b>Visite annuelle</b>
                        </div>

                        <div>
                            <small>Prévention</small>
                            <b>Vaccins & antiparasitaires</b>
                        </div>

                        <div>
                            <small>Sélection</small>
                            <b>Tests ADN reproducteurs</b>
                        </div>
                    </div>
                </div>

                <div class="sante-hero-seal">
                    <strong>Suivi</strong>
                    <span>responsable</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sante-keyword-ribbon" aria-label="Points clés santé">
        <div class="sante-keyword-track">
            <span>Suivi vétérinaire</span>
            <span>Vaccination</span>
            <span>Dépistage</span>
            <span>Tests ADN</span>
            <span>Transit sensible</span>
            <span>Prévention</span>
            <span>Sélection responsable</span>
            <span>Bien-être</span>
            <span>Vie intérieure</span>
            <span>Reproducteurs suivis</span>

            <span aria-hidden="true">Suivi vétérinaire</span>
            <span aria-hidden="true">Vaccination</span>
            <span aria-hidden="true">Dépistage</span>
            <span aria-hidden="true">Tests ADN</span>
            <span aria-hidden="true">Transit sensible</span>
            <span aria-hidden="true">Prévention</span>
            <span aria-hidden="true">Sélection responsable</span>
            <span aria-hidden="true">Bien-être</span>
            <span aria-hidden="true">Vie intérieure</span>
            <span aria-hidden="true">Reproducteurs suivis</span>
        </div>
    </section>

    <section class="sante-record-section" id="dossier-sante">
        <div class="container">
            <div class="sante-record-heading">
                <span class="sante-label">Dossier santé</span>
                <h2>Les points essentiels à surveiller, sans noyer la lecture.</h2>
                <p>
                    Une page santé doit être claire, rassurante et utile. Ici, chaque point est présenté comme une fiche
                    de suivi, pour comprendre rapidement ce qui compte vraiment dans la santé d’un Bengal.
                </p>
            </div>

            <div class="sante-record-grid">
                <article class="sante-record-main">
                    <span class="record-number">01</span>

                    <div>
                        <small>Suivi vétérinaire</small>
                        <h3>Une visite annuelle reste indispensable.</h3>
                        <p>
                            Elle permet de réaliser les rappels de vaccins, de contrôler l’état général du chat et
                            d’adapter les traitements nécessaires selon son âge, son mode de vie et son environnement.
                        </p>
                    </div>
                </article>

                <article class="sante-record-small">
                    <span>02</span>
                    <h3>Vaccins</h3>
                    <p>Les rappels protègent le chat et suivent un rythme défini avec le vétérinaire.</p>
                </article>

                <article class="sante-record-small">
                    <span>03</span>
                    <h3>Antiparasitaires</h3>
                    <p>Interne ou externe, le traitement doit toujours être adapté au profil du chat.</p>
                </article>

                <article class="sante-record-small">
                    <span>04</span>
                    <h3>Observation</h3>
                    <p>Appétit, transit, énergie et comportement sont de bons indicateurs du quotidien.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="sante-transit-editorial">
        <div class="container sante-transit-grid">
            <div class="sante-transit-copy">
                <span class="sante-label">Transit sensible</span>

                <h2>Le Bengal peut avoir une digestion délicate.</h2>

                <p>
                    Le stress, une transition alimentaire trop rapide, un changement d’environnement ou certains déséquilibres
                    peuvent perturber sa flore intestinale.
                </p>

                <p>
                    En cas de besoin, des probiotiques ou des solutions adaptées peuvent soutenir le confort digestif.
                    Les traitements comme Panacur, Milbemax ou tout autre vermifuge doivent toujours être utilisés
                    selon les conseils du vétérinaire.
                </p>

                <div class="sante-soft-tags">
                    <span>Transition douce</span>
                    <span>Routine stable</span>
                    <span>Conseil vétérinaire</span>
                </div>
            </div>

            <figure class="sante-transit-image">
                <img src="{{ asset('images\le-bengal\sante/gallery-13.jpg') }}" alt="Bengal calme et attentif">
            </figure>
        </div>
    </section>

    <section class="sante-surveillance" id="maladies">
        <div class="container">
            <div class="surveillance-head">
                <span class="sante-label">Surveillance santé</span>

                <h2>
                    Les maladies importantes à connaître chez le Bengal.
                </h2>

                <p>
                    Une présentation claire, sérieuse et rassurante des principaux points de vigilance.
                    L’objectif n’est pas d’inquiéter, mais de comprendre pourquoi le dépistage,
                    la prévention et la sélection des reproducteurs sont essentiels.
                </p>
            </div>

            <div class="surveillance-ledger">
                <article class="surveillance-row">
                    <div class="surveillance-index">01</div>

                    <div class="surveillance-main">
                        <span>Maladies virales</span>
                        <h3>FIV / FeLV</h3>
                        <p>
                            Le FIV se transmet principalement par morsure et peut rester silencieux pendant plusieurs années.
                            Le FeLV, aussi appelé leucose féline, se transmet par les sécrétions comme la salive,
                            l’urine, les matières fécales, l’allaitement ou la gestation.
                        </p>
                    </div>

                    <div class="surveillance-side">
                        <strong>Prévention</strong>
                        <p>Dépistage, vigilance sanitaire et vaccination pour le FeLV.</p>
                    </div>
                </article>

                <article class="surveillance-row">
                    <div class="surveillance-index">02</div>

                    <div class="surveillance-main">
                        <span>Maladie héréditaire</span>
                        <h3>PK-Def</h3>
                        <p>
                            La carence en pyruvate kinase peut provoquer une destruction précoce des globules rouges
                            et entraîner une anémie plus ou moins importante selon les chats.
                        </p>
                    </div>

                    <div class="surveillance-side">
                        <strong>Lecture ADN</strong>
                        <div class="surveillance-tags">
                            <small>N/N indemne</small>
                            <small>N/K porteur sain</small>
                            <small>K/K atteint</small>
                        </div>
                    </div>
                </article>

                <article class="surveillance-row">
                    <div class="surveillance-index">03</div>

                    <div class="surveillance-main">
                        <span>Vision</span>
                        <h3>PRA-b</h3>
                        <p>
                            La PRA-b correspond à une dégénérescence progressive des photorécepteurs rétiniens.
                            Elle peut provoquer une perte de vision nocturne, puis diurne, jusqu’à la cécité totale.
                        </p>
                    </div>

                    <div class="surveillance-side">
                        <strong>Lecture ADN</strong>
                        <div class="surveillance-tags">
                            <small>N/N indemne</small>
                            <small>N/PRA porteur</small>
                            <small>PRA/PRA atteint</small>
                        </div>
                    </div>
                </article>

                <article class="surveillance-row">
                    <div class="surveillance-index">04</div>

                    <div class="surveillance-main">
                        <span>Cardiaque & rénal</span>
                        <h3>HCM / PKD</h3>
                        <p>
                            La HCM touche le muscle cardiaque, tandis que la PKD se caractérise par le développement
                            de kystes, notamment sur les reins et parfois le foie. Ces maladies étant évolutives,
                            un suivi régulier reste important.
                        </p>
                    </div>

                    <div class="surveillance-side">
                        <strong>Suivi conseillé</strong>
                        <p>Contrôles vétérinaires réguliers et échographies selon les recommandations.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="sante-genetic-lab" id="genetique">
        <div class="container sante-genetic-layout">
            <div class="sante-genetic-copy">
                <span class="sante-label">Tests ADN</span>

                <h2>Le test ADN donne une information précieuse pour toute la vie du chat.</h2>

                <p>
                    Pour certaines maladies héréditaires comme le PK-Def ou la PRA-b, le test ADN permet de connaître
                    le statut du chat. Ce test ne se réalise qu’une seule fois dans la vie de l’animal.
                </p>

                <p>
                    Un porteur sain n’est pas malade, mais peut transmettre la mutation à une partie de sa descendance.
                    Les mariages doivent donc être réfléchis avec des reproducteurs compatibles.
                </p>
            </div>

            <div class="sante-lab-card">
                <div class="lab-row lab-head">
                    <span>Statut</span>
                    <span>Interprétation</span>
                </div>

                <div class="lab-row">
                    <strong>N/N</strong>
                    <span>Indemne et non porteur</span>
                </div>

                <div class="lab-row">
                    <strong>N/K ou N/PRA</strong>
                    <span>Porteur sain, à marier avec un chat indemne</span>
                </div>

                <div class="lab-row">
                    <strong>K/K ou PRA/PRA</strong>
                    <span>Chat atteint par la maladie concernée</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sante-care-section">
        <div class="container sante-care-grid">
            <figure class="sante-care-image">
                <img src="{{ asset('images\le-bengal\sante/kitten-8.jpg') }}" alt="Jeune Bengal">
            </figure>

            <div class="sante-care-copy">
                <span class="sante-label">Cadre de vie</span>

                <h2>Un environnement stable participe aussi à sa santé.</h2>

                <p>
                    Un chat avec de bons gènes, un suivi régulier et un environnement adapté limite davantage certains risques.
                    Une vie en intérieur, une routine stable et une observation attentive peuvent améliorer son confort
                    et sa qualité de vie.
                </p>

                <div class="sante-care-points">
                    <div>
                        <strong>Vie intérieure</strong>
                        <span>Moins de risques extérieurs</span>
                    </div>

                    <div>
                        <strong>Routine</strong>
                        <span>Moins de stress au quotidien</span>
                    </div>

                    <div>
                        <strong>Observation</strong>
                        <span>Réagir rapidement aux changements</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sante-serment" id="engagement">
        <div class="container">
            <div class="serment-card">
                <div class="serment-content">
                    <span class="sante-label">Notre engagement</span>

                    <h2>
                        Élever avec sérieux, sélectionner avec conscience.
                    </h2>

                    <p>
                        À la Chatterie du Diamant Sauvage, la santé fait partie d’une démarche globale :
                        connaître les lignées, observer les chats, respecter leur rythme et accompagner chaque adoption
                        avec transparence.
                    </p>

                    <div class="serment-actions">
                        <a href="{{ route('contact') }}" class="btn btn-gold">Échanger avec nous</a>
                        <a href="{{ route('chats.disponibles') }}" class="btn btn-outline-light">Voir les chatons</a>
                    </div>
                </div>

                <div class="serment-values">
                    <div>
                        <small>01</small>
                        <strong>Suivi</strong>
                        <span>Une attention régulière portée à l’état général de nos chats.</span>
                    </div>

                    <div>
                        <small>02</small>
                        <strong>Sélection</strong>
                        <span>Des reproducteurs choisis avec sérieux et responsabilité.</span>
                    </div>

                    <div>
                        <small>03</small>
                        <strong>Confiance</strong>
                        <span>Une adoption accompagnée avec clarté, douceur et disponibilité.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
