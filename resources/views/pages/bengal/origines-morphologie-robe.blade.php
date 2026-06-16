@extends('layouts.site')

@section('title', 'Origines, morphologie & robe | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les origines du Bengal, sa morphologie, ses robes et les caractéristiques qui font tout le charme de cette race fascinante.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/origines-morphologie-robe.css') }}">
@endpush

@section('content')

    <section class="bengal-page">

        <!-- HERO -->
        <section class="bengal-hero">
            <div class="bengal-hero-media">
                <img src="{{ asset('images/le-bengal/hero-bengal.jpg') }}" alt="Chat Bengal au regard intense">
            </div>

            <div class="bengal-hero-overlay"></div>

            <div class="container bengal-hero-inner">
                <div class="bengal-hero-copy bengal-reveal">
                    <span class="bengal-kicker">Le Bengal</span>

                    <h1>
                        Origines, morphologie
                        <em>& robe</em>
                    </h1>

                    <p>
                        Une race singulière, au charme sauvage et à l’élégance très travaillée,
                        reconnue pour son allure de petit léopard, son tempérament vif
                        et la richesse de ses robes.
                    </p>

                    <div class="bengal-hero-actions">
                        <a href="#origines" class="btn btn-gold">Découvrir ses origines</a>
                        <a href="#robes" class="btn btn-dark-outline">Explorer les robes</a>
                    </div>
                </div>

                <div class="bengal-hero-panel bengal-reveal delay-1">
                    <div class="bengal-hero-panel-card">
                        <span>Race</span>
                        <strong>Bengal</strong>
                        <p>Une apparence sauvage dans un cadre domestique.</p>
                    </div>

                    <div class="bengal-hero-panel-card">
                        <span>Silhouette</span>
                        <strong>Musclée & athlétique</strong>
                        <p>Une morphologie harmonieuse, puissante et élégante.</p>
                    </div>

                    <div class="bengal-hero-panel-card">
                        <span>Signature</span>
                        <strong>Rosettes & contrastes</strong>
                        <p>Des robes expressives, lumineuses et très recherchées.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- INTRO ATLAS -->
        <section class="bengal-atlas-intro" id="origines">
            <div class="container">
                <div class="atlas-intro-grid">
                    <div class="atlas-intro-content bengal-reveal">
                        <span class="bengal-kicker bengal-kicker-dark">Origines du Bengal</span>

                        <h2>
                            Une race fascinante, née d’un héritage sauvage et d’un vrai travail de sélection.
                        </h2>

                        <p>
                            L’histoire du Bengal débute en 1963. La race est issue d’un croisement entre
                            un chat léopard asiatique et un chat domestique. L’objectif était d’obtenir
                            un chat apprivoisé, proche de l’humain, tout en conservant l’apparence spectaculaire
                            d’un petit léopard.
                        </p>

                        <p>
                            Le Bengal a ensuite été reconnu par la TICA en 1983, puis par le LOOF en 1997.
                            À partir des 4e et 5e générations, les Bengals sont considérés comme domestiques
                            et peuvent rejoindre des familles.
                        </p>
                    </div>

                    <div class="atlas-date-stack bengal-reveal delay-1">
                        <article>
                            <span>1963</span>
                            <strong>Début de l’histoire moderne</strong>
                            <p>Premiers croisements à l’origine de la race Bengal.</p>
                        </article>

                        <article>
                            <span>1983</span>
                            <strong>Reconnaissance TICA</strong>
                            <p>La race commence à s’inscrire dans les standards félins internationaux.</p>
                        </article>

                        <article>
                            <span>1997</span>
                            <strong>Reconnaissance LOOF</strong>
                            <p>Le Bengal est reconnu officiellement en France.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- ORIGINES VISUELLES -->
        <section class="bengal-origin-duo">
            <div class="container">
                <div class="origin-duo-grid">
                    <article class="origin-duo-card origin-duo-dark bengal-reveal">
                        <div class="origin-duo-number">01</div>
                        <span>Origines sauvages</span>
                        <h3>Le chat léopard asiatique</h3>
                        <p>
                            Le Bengal possède un héritage sauvage grâce au chat léopard asiatique,
                            dont il conserve l’allure graphique, le regard intense, la robe contrastée
                            et cette présence très particulière.
                        </p>
                    </article>

                    <article class="origin-duo-card bengal-reveal delay-1">
                        <div class="origin-duo-number">02</div>
                        <span>Sélection domestique</span>
                        <h3>Un compagnon proche de l’humain</h3>
                        <p>
                            Le travail des éleveurs a permis de stabiliser un tempérament domestique :
                            un chat gentil, curieux, joueur, très intelligent, souvent proche de sa famille
                            et très interactif au quotidien.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <!-- MORPHOLOGIE STANDARD -->
        <section class="bengal-standard-section" id="morphologie">
            <div class="container">
                <div class="bengal-section-head bengal-reveal">
                    <span class="bengal-kicker bengal-kicker-dark">Morphologie</span>

                    <h2>
                        Un corps puissant, une silhouette souple et un look sauvage maîtrisé.
                    </h2>

                    <p>
                        Le Bengal est un chat de moyenne à grande taille. Il est fort, musclé,
                        souple et élégant. Sa structure robuste, son ossature solide et sa démarche
                        féline donnent cette impression de puissance contrôlée.
                    </p>
                </div>

                <div class="standard-layout">
                    <div class="standard-text-card bengal-reveal">
                        <h3>La construction du Bengal</h3>

                        <div class="standard-text-list">
                            <p>
                                La femelle pèse généralement entre 2,5 et 6 kg, tandis que le mâle
                                peut atteindre environ 5 à 7 kg.
                            </p>

                            <p>
                                Sa tête paraît plutôt petite par rapport au corps. La face est plus longue
                                que large, avec un nez large, un museau bien fourni et des joues marquées.
                            </p>

                            <p>
                                Les yeux sont grands, expressifs et légèrement inclinés. Les oreilles sont
                                plutôt petites, larges à la base et arrondies au sommet.
                            </p>

                            <p>
                                Ses pattes arrière sont légèrement plus développées, ce qui renforce
                                son allure agile, bondissante et athlétique.
                            </p>
                        </div>
                    </div>

                    <div class="standard-visuals bengal-reveal delay-1">
                        <figure>
                            <img src="{{ asset('images/le-bengal/standard-tete.jpg') }}" alt="Standard de la tête du Bengal">
                            <figcaption>Standard de tête</figcaption>
                        </figure>

                        <figure>
                            <img src="{{ asset('images/le-bengal/standard-corps.jpg') }}" alt="Standard du corps du Bengal">
                            <figcaption>Standard du corps</figcaption>
                        </figure>
                    </div>
                </div>

                <div class="morphology-points">
                    <article class="bengal-reveal">
                        <span>01</span>
                        <h3>Corps musclé</h3>
                        <p>Une structure solide, athlétique, mais toujours souple et harmonieuse.</p>
                    </article>

                    <article class="bengal-reveal delay-1">
                        <span>02</span>
                        <h3>Regard expressif</h3>
                        <p>Des yeux intenses, bien ouverts, qui renforcent la présence du Bengal.</p>
                    </article>

                    <article class="bengal-reveal delay-2">
                        <span>03</span>
                        <h3>Look sauvage</h3>
                        <p>Un équilibre entre allure de félin miniature et caractère domestique.</p>
                    </article>

                    <article class="bengal-reveal delay-3">
                        <span>04</span>
                        <h3>Caractère vivant</h3>
                        <p>Un chat curieux, intelligent, joueur, proche de l’humain et très interactif.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- CARACTÈRE -->
        <section class="bengal-character-section">
            <div class="container">
                <div class="character-panel bengal-reveal">
                    <div>
                        <span class="bengal-kicker">Tempérament</span>

                        <h2>
                            Un chat expressif, curieux et très attachant.
                        </h2>

                        <p>
                            Le Bengal peut être très proche de l’humain, parfois même pot de colle.
                            C’est un chat intelligent, joueur, coquin et très communicatif. Certains
                            rapportent la balle, jouent à cache-cache, aiment l’eau ou deviennent
                            de véritables compagnons de jeu pour les enfants.
                        </p>
                    </div>

                    <div class="character-tags">
                        <span>Affectueux</span>
                        <span>Curieux</span>
                        <span>Joueur</span>
                        <span>Intelligent</span>
                        <span>Expressif</span>
                        <span>Proche de l’humain</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ROBES -->
        <section class="bengal-coat-section">
            <div class="container">
                <div class="coat-head cattery-reveal">
                    <span class="cattery-kicker">Robe du Bengal</span>
                    <h2>Brown, Snow, Silver, Blue, Charcoal : des robes à forte personnalité.</h2>
                    <p>
                        La robe du Bengal fait partie de ses signatures les plus fascinantes.
                        Couleurs, contrastes, motifs et qualité des rosettes participent pleinement à son identité visuelle.
                    </p>
                </div>

                <div class="coat-showcase cattery-reveal delay-1">
                    <div class="coat-reference-card">
                        <div class="coat-reference-top">
                            <span class="coat-reference-badge">Planche de référence</span>
                            <a href="{{ asset('images/le-bengal/robes-bengal.jpg') }}" target="_blank" class="coat-reference-link">
                                Voir en grand
                            </a>
                        </div>

                        <div class="coat-reference-image">
                            <img src="{{ asset('images/le-bengal/robes-bengal.jpg') }}" alt="Planche des robes du Bengal">
                        </div>
                    </div>

                    <div class="coat-cards">
                        <article class="coat-card coat-card-brown">
                            <div class="coat-card-orb"></div>
                            <span class="coat-card-label">Robe</span>
                            <h3>Brown</h3>
                            <p>
                                La robe emblématique du Bengal. Très contrastée, chaude et intense,
                                elle met en valeur un effet léopard très recherché.
                            </p>
                        </article>

                        <article class="coat-card coat-card-snow">
                            <div class="coat-card-orb"></div>
                            <span class="coat-card-label">Robe</span>
                            <h3>Snow</h3>
                            <p>
                                Une robe lumineuse et délicate, appréciée pour sa douceur visuelle.
                                On y retrouve des nuances plus claires et très élégantes.
                            </p>
                        </article>

                        <article class="coat-card coat-card-silver">
                            <div class="coat-card-orb"></div>
                            <span class="coat-card-label">Robe</span>
                            <h3>Silver</h3>
                            <p>
                                Très graphique et spectaculaire, le silver séduit par son contraste froid,
                                son rendu net et sa présence visuelle.
                            </p>
                        </article>

                        <article class="coat-card coat-card-blue">
                            <div class="coat-card-orb"></div>
                            <span class="coat-card-label">Robe</span>
                            <h3>Blue</h3>
                            <p>
                                Plus rare et subtile, la robe blue propose des reflets gris bleutés
                                avec une élégance singulière et raffinée.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- MOTIFS -->
        <section class="bengal-pattern-section">
            <div class="container">
                <div class="pattern-grid">
                    <div class="pattern-content bengal-reveal">
                        <span class="bengal-kicker bengal-kicker-dark">Motifs & patterns</span>

                        <h2>
                            Les motifs donnent toute la dimension graphique du Bengal.
                        </h2>

                        <p>
                            Le Bengal peut présenter différents motifs : spotted, rosettes ou marbled.
                            Les rosettes sont particulièrement recherchées pour leur effet léopard.
                            Le marbled offre un rendu plus fluide, plus artistique, tandis que certains motifs
                            mélangent plusieurs influences visuelles.
                        </p>

                        <div class="pattern-tags">
                            <span>Spotted</span>
                            <span>Rosettes</span>
                            <span>Marbled</span>
                            <span>Sparble</span>
                            <span>Contraste</span>
                            <span>Jet black</span>
                        </div>
                    </div>

                    <div class="pattern-images">
                        <figure class="bengal-reveal delay-1">
                            <img src="{{ asset('images/le-bengal/patterns-bengal.jpg') }}" alt="Motifs du Bengal">
                            <figcaption>Lecture des motifs</figcaption>
                        </figure>

                        <figure class="pattern-dark bengal-reveal delay-2">
                            <img src="{{ asset('images/le-bengal/rosettes-bengal.jpg') }}" alt="Détails des rosettes du Bengal">
                            <figcaption>Détails des rosettes</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHARCOAL / MELANISTIC -->
        <section class="bengal-gene-section">
            <div class="container">
                <div class="gene-grid">
                    <article class="gene-card gene-dark bengal-reveal">
                        <span>Charcoal / Double APB</span>
                        <h2>Un style sauvage, profond et très contrasté.</h2>
                        <p>
                            Les gènes charcoal ou double APB donnent une apparence très typée,
                            avec un contraste marqué, un marquage impressionnant et une allure plus sauvage.
                            Ils peuvent se combiner avec les robes brown, snow ou silver.
                        </p>
                    </article>

                    <article class="gene-card bengal-reveal delay-1">
                        <span>Melanistic / Smoke</span>
                        <h2>Une allure de petite panthère.</h2>
                        <p>
                            Les Bengals melanistic ou smoke donnent une impression encore plus sauvage.
                            Les rosettes peuvent apparaître par transparence lorsque l’animal se déplace,
                            créant un rendu discret, sombre et très sophistiqué.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <!-- GLITTER -->
        <section class="bengal-glitter-section">
            <div class="container">
                <div class="glitter-grid">
                    <div class="glitter-content bengal-reveal">
                        <span class="bengal-kicker bengal-kicker-dark">Le Glitter</span>

                        <h2>
                            Un voile lumineux, presque pailleté, propre au charme du Bengal.
                        </h2>

                        <p>
                            Le golden glitter est une particularité très appréciée chez le Bengal.
                            Il donne au pelage un effet brillant, comme si le poil captait la lumière.
                            Ce phénomène est lié à la structure du poil, qui reflète la lumière
                            et crée cet aspect scintillant.
                        </p>
                    </div>

                    <figure class="glitter-image bengal-reveal delay-1">
                        <img src="{{ asset('images/le-bengal/glitter-bengal.jpg') }}" alt="Effet glitter sur la robe du Bengal">
                    </figure>
                </div>
            </div>
        </section>

        <!-- FUZZY -->
        <!-- FUZZY -->
        <section class="bengal-fuzzy-section">
            <div class="container">

                <div class="fuzzy-premium-head bengal-reveal">
                    <div>
                        <span class="bengal-kicker">Le Fuzzy</span>

                        <h2>
                            Une phase naturelle où la robe du chaton se transforme.
                        </h2>
                    </div>

                    <p>
                        Chez le Bengal, le fuzzy est une étape normale de croissance. Le pelage devient plus duveteux,
                        les motifs paraissent moins nets, puis le contraste revient progressivement avec l’âge.
                    </p>
                </div>

                <div class="fuzzy-premium-grid">
                    <article class="fuzzy-premium-card bengal-reveal">
                        <figure>
                            <img src="{{ asset('images/le-bengal/fuzzy-avant.jpg') }}" alt="Chaton Bengal avant la période fuzzy">
                        </figure>

                        <div class="fuzzy-premium-content">
                            <span>01</span>
                            <h3>Avant</h3>
                            <p>
                                Les motifs sont déjà visibles, la robe commence à se dessiner et le contraste apparaît.
                            </p>
                        </div>
                    </article>

                    <article class="fuzzy-premium-card fuzzy-premium-card-featured bengal-reveal delay-1">
                        <figure>
                            <img src="{{ asset('images/le-bengal/fuzzy-pendant.jpg') }}" alt="Chaton Bengal pendant la période fuzzy">
                        </figure>

                        <div class="fuzzy-premium-content">
                            <span>02</span>
                            <h3>Pendant</h3>
                            <p>
                                Le poil devient plus flou, plus dense, comme un voile naturel qui adoucit les motifs.
                            </p>
                        </div>
                    </article>

                    <article class="fuzzy-premium-card bengal-reveal delay-2">
                        <figure>
                            <img src="{{ asset('images/le-bengal/fuzzy-apres.jpg') }}" alt="Bengal après la période fuzzy">
                        </figure>

                        <div class="fuzzy-premium-content">
                            <span>03</span>
                            <h3>Après</h3>
                            <p>
                                La robe se révèle à nouveau, avec un contraste plus lisible et des motifs mieux définis.
                            </p>
                        </div>
                    </article>
                </div>

            </div>
        </section>

        <!-- FINAL CTA -->
        <section class="bengal-final-cta">
            <div class="container">
                <div class="bengal-final-inner bengal-reveal">
                    <span class="bengal-kicker">Le Bengal</span>

                    <h2>
                        Une race qui se lit dans chaque détail : corps, robe, regard et caractère.
                    </h2>

                    <p>
                        Le Bengal ne se résume pas à sa couleur. Son charme vient de l’équilibre entre
                        son héritage, sa morphologie, son tempérament, la qualité de sa robe
                        et le travail de sélection réalisé au fil des générations.
                    </p>

                    <div class="bengal-final-actions">
                        <a href="{{ route('chatterie') }}" class="btn btn-gold">Découvrir la chatterie</a>
                        <a href="{{ route('contact') }}" class="btn btn-dark-outline">Nous contacter</a>
                    </div>
                </div>
            </div>
        </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/origines-morphologie-robe.js') }}"></script>
@endpush
