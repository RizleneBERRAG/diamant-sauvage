@extends('layouts.site')

@section('title', 'Reproduction et sevrage du Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez les étapes de la reproduction, de la gestation, du sevrage et du départ des chatons Bengal à la Chatterie du Diamant Sauvage.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bengal/reproduction.css') }}">
@endpush

@section('content')

    <section class="repro-hero">
        <div class="container repro-hero-grid">
            <div class="repro-hero-content">
                <span class="repro-eyebrow">Reproduction & sevrage</span>

                <h1>
                    De la naissance
                    <span>aux premiers pas dans sa famille.</span>
                </h1>

                <p>
                    Chez le Bengal, chaque étape compte : la préparation de la femelle, la gestation,
                    la naissance, l’allaitement, le sevrage et l’apprentissage auprès de la mère.
                </p>

                <div class="repro-hero-actions">
                    <a href="#cycle" class="btn btn-gold">Découvrir les étapes</a>
                    <a href="#tarifs" class="btn btn-glass">Voir les tarifs</a>
                </div>
            </div>

            <div class="repro-hero-gallery">
                <figure class="repro-photo repro-photo-main">
                    <img src="{{ asset('images/home/kitten-14.jpg') }}" alt="Chaton Bengal">
                </figure>

                <figure class="repro-photo repro-photo-small repro-photo-one">
                    <img src="{{ asset('images/home/kitten-12.jpg') }}" alt="Jeune chaton Bengal">
                </figure>

                <figure class="repro-photo repro-photo-small repro-photo-two">
                    <img src="{{ asset('images/home/gallery-11.jpg') }}" alt="Bengal dans son environnement">
                </figure>

                <div class="repro-birth-card">
                    <span>Cycle de vie</span>
                    <strong>Naître · apprendre · grandir</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="repro-journey" aria-label="Parcours de reproduction">
        <div class="container">
            <div class="repro-journey-head">
                <span class="repro-label">Parcours du chaton</span>

                <h2>
                    Une évolution suivie, étape par étape.
                </h2>
            </div>

            <div class="repro-journey-grid">
                <article class="repro-journey-card is-large">
                    <span>01</span>
                    <h3>Préparer</h3>
                    <p>
                        Suivi vétérinaire, maturité de la femelle, choix du bon moment et respect de son rythme.
                    </p>

                    <div>
                        <small>Préparation</small>
                        <small>Saillie</small>
                    </div>
                </article>

                <article class="repro-journey-card">
                    <span>02</span>
                    <h3>Naître</h3>
                    <p>
                        Une gestation surveillée, une naissance accompagnée et un environnement calme.
                    </p>

                    <div>
                        <small>Gestation</small>
                        <small>Naissance</small>
                    </div>
                </article>

                <article class="repro-journey-card">
                    <span>03</span>
                    <h3>Grandir</h3>
                    <p>
                        La mère guide ses chatons dans leurs premiers apprentissages essentiels.
                    </p>

                    <div>
                        <small>Allaitement</small>
                        <small>Sevrage</small>
                    </div>
                </article>

                <article class="repro-journey-card">
                    <span>04</span>
                    <h3>Partir</h3>
                    <p>
                        Le départ se fait seulement lorsque le chaton est prêt, stable et suffisamment autonome.
                    </p>

                    <div>
                        <small>Socialisation</small>
                        <small>Famille</small>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="repro-cycle" id="cycle">
        <div class="container">
            <div class="repro-section-head">
                <span class="repro-label">Le bon moment</span>
                <h2>Une reproduction préparée avec patience et responsabilité.</h2>
                <p>
                    Même si une femelle Bengal peut être féconde jeune, il est préférable d’attendre
                    qu’elle soit suffisamment mature physiquement et émotionnellement.
                </p>
            </div>

            <div class="repro-orbit-grid">
                <article class="repro-orbit-card">
                    <span>01</span>
                    <strong>6 mois</strong>
                    <p>
                        La femelle peut parfois être fertile, mais cela reste trop jeune pour une reproduction sereine.
                    </p>
                </article>

                <article class="repro-orbit-card repro-orbit-card-gold">
                    <span>02</span>
                    <strong>12 mois minimum</strong>
                    <p>
                        Un âge plus raisonnable pour envisager une saillie, après avis vétérinaire.
                    </p>
                </article>

                <article class="repro-orbit-card repro-orbit-card-dark">
                    <span>03</span>
                    <strong>15 mois idéalement</strong>
                    <p>
                        Une maturité plus confortable pour que tout se déroule dans de meilleures conditions.
                    </p>
                </article>

                <article class="repro-orbit-card">
                    <span>04</span>
                    <strong>Suivi vétérinaire</strong>
                    <p>
                        Avant toute saillie, un vétérinaire doit vérifier que la femelle est prête et en bonne santé.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="repro-gestation">
        <div class="container">
            <div class="repro-gestation-shell">
                <div class="repro-gestation-content">
                    <span class="repro-label">Gestation</span>

                    <h2>Environ 64 jours pour accueillir une portée.</h2>

                    <p>
                        Lorsqu’elle attend des petits, la femelle Bengal porte ses bébés pendant
                        environ 64 jours, avec une variation possible entre 58 et 70 jours.
                    </p>

                    <p>
                        Une portée peut compter plusieurs chatons, parfois jusqu’à huit selon les cas.
                        Chaque gestation demande une attention particulière, du calme et un accompagnement sérieux.
                    </p>
                </div>

                <div class="repro-gestation-stats">
                    <article class="repro-stat-card">
                        <strong><span class="js-count" data-count="58">0</span></strong>
                        <p>jours minimum observés</p>
                    </article>

                    <article class="repro-stat-card">
                        <strong><span class="js-count" data-count="64">0</span></strong>
                        <p>jours en moyenne</p>
                    </article>

                    <article class="repro-stat-card">
                        <strong><span class="js-count" data-count="70">0</span></strong>
                        <p>jours possibles selon les cas</p>
                    </article>

                    <article class="repro-stat-card">
                        <strong><span class="js-count" data-count="8">0</span></strong>
                        <p>chatons au maximum possible</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="repro-mother">
        <div class="container repro-mother-grid">
            <figure class="repro-mother-image">
                <img src="{{ asset('images/home/kitten-15.jpg') }}" alt="Chaton Bengal accompagné">
            </figure>

            <div class="repro-mother-content">
                <span class="repro-label">Le rôle de la maman</span>

                <h2>La mère transmet bien plus que l’alimentation.</h2>

                <p>
                    Après la naissance, la maman allaite ses chatons jusqu’à environ 6 semaines,
                    avec des variations selon les portées. Elle les accompagne ensuite dans leurs
                    premiers apprentissages essentiels.
                </p>

                <div class="repro-mother-lessons">
                    <span>Toilette</span>
                    <span>Alimentation</span>
                    <span>Propreté</span>
                    <span>Jeu</span>
                    <span>Discipline</span>
                    <span>Codes sociaux</span>
                </div>
            </div>
        </div>
    </section>

    <section class="repro-learning">
        <div class="container">
            <div class="repro-learning-layout">
                <div class="repro-learning-intro">
                    <span class="repro-label">Sevrage & apprentissage</span>

                    <h2>Le chaton évolue par paliers, avec douceur et stabilité.</h2>

                    <p>
                        Chaque phase joue un rôle précis dans sa construction : alimentation,
                        repères, comportement, confiance et adaptation à sa future famille.
                    </p>
                </div>

                <div class="repro-learning-steps">
                    <article class="repro-learning-step">
                        <span>01</span>
                        <div>
                            <h3>Allaitement</h3>
                            <p>Les premières semaines sont centrées sur la mère, la chaleur, le lait et la sécurité.</p>
                        </div>
                    </article>

                    <article class="repro-learning-step">
                        <span>02</span>
                        <div>
                            <h3>Découverte</h3>
                            <p>Le chaton observe, explore doucement et commence à interagir avec son environnement.</p>
                        </div>
                    </article>

                    <article class="repro-learning-step">
                        <span>03</span>
                        <div>
                            <h3>Transition alimentaire</h3>
                            <p>L’alimentation évolue progressivement pour respecter son rythme et son confort digestif.</p>
                        </div>
                    </article>

                    <article class="repro-learning-step">
                        <span>04</span>
                        <div>
                            <h3>Propreté</h3>
                            <p>La mère guide le chaton vers les bons comportements et les premiers repères du quotidien.</p>
                        </div>
                    </article>

                    <article class="repro-learning-step">
                        <span>05</span>
                        <div>
                            <h3>Socialisation</h3>
                            <p>Le jeu, les limites et les interactions participent à son équilibre émotionnel.</p>
                        </div>
                    </article>

                    <article class="repro-learning-step">
                        <span>06</span>
                        <div>
                            <h3>Préparation au départ</h3>
                            <p>Le chaton quitte l’élevage uniquement lorsqu’il est prêt physiquement et mentalement.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="repro-depart">
        <div class="container">
            <div class="repro-depart-shell">
                <div class="repro-depart-window">
                    <small>Fenêtre idéale</small>

                    <div class="repro-depart-range">
                        <strong>12</strong>
                        <span>à</span>
                        <strong>16</strong>
                    </div>

                    <p>semaines</p>

                    <div class="repro-depart-note">
                        La plupart des chatons sont prêts vers 12 semaines,
                        mais certains ont besoin d’un peu plus de temps.
                    </div>
                </div>

                <div class="repro-depart-content">
                    <span class="repro-label">Départ en famille</span>

                    <h2>Un départ seulement lorsque le chaton est vraiment prêt.</h2>

                    <p>
                        Les chatons quittent généralement l’élevage à partir de 12 semaines,
                        une fois suffisamment préparés physiquement et mentalement.
                    </p>

                    <p>
                        Le développement du Bengal peut être plus progressif que celui d’autres races.
                        Certains chatons ont besoin de davantage de temps pour finaliser leur sevrage,
                        renforcer leur immunité, passer les étapes vétérinaires ou simplement gagner en confiance.
                    </p>

                    <div class="repro-ready-grid">
                        <article>
                            <strong>Sevrage</strong>
                            <span>Alimentation suffisamment acquise</span>
                        </article>

                        <article>
                            <strong>Socialisation</strong>
                            <span>Chaton à l’aise avec son environnement</span>
                        </article>

                        <article>
                            <strong>Santé</strong>
                            <span>Visites, vaccins et identification préparés</span>
                        </article>

                        <article>
                            <strong>Émotionnel</strong>
                            <span>Départ au bon moment pour lui</span>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="repro-pricing-luxe" id="tarifs">
        <div class="container">
            <div class="repro-pricing-layout">
                <div class="repro-pricing-intro">
                    <span class="repro-label">Prix d’un chaton Bengal</span>

                    <h2>
                        Des tarifs clairs, expliqués avec transparence.
                    </h2>

                    <p>
                        Le prix d’un chaton Bengal dépend de plusieurs critères : le sexe,
                        la lignée, le pedigree des parents, la robe, la conformité au standard
                        et le projet d’adoption.
                    </p>
                </div>

                <div class="repro-pricing-panel">
                    <article class="repro-price-line">
                        <div>
                            <span>Adoption familiale</span>
                            <h3>Bengal de compagnie</h3>
                            <p>Pour une famille souhaitant accueillir un Bengal comme compagnon de vie.</p>
                        </div>

                        <strong>1000 € <small>à</small> 1700 €</strong>
                    </article>

                    <article class="repro-price-line is-dark">
                        <div>
                            <span>Projet spécifique</span>
                            <h3>Bengal pour reproduction</h3>
                            <p>Selon la lignée, les conditions, le sérieux du projet et la demande.</p>
                        </div>

                        <strong>Nous consulter</strong>
                    </article>

                    <article class="repro-included-luxe">
                        <span>Inclus avant chaque départ</span>

                        <div class="repro-included-luxe-grid">
                            <div>Deux visites vétérinaires</div>
                            <div>Certificat de bonne santé</div>
                            <div>Identification par puce</div>
                            <div>Vaccination</div>
                            <div>Vermifuge</div>
                            <div>Déparasitage interne et externe</div>
                            <div>Inscription au LOOF avec pedigree</div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="repro-final">
        <div class="container repro-final-card">
            <div>
                <span class="repro-label">Adoption réfléchie</span>

                <h2>Chaque départ est pensé pour le bien-être du chaton.</h2>

                <p>
                    Notre objectif est que chaque Bengal rejoigne sa famille au bon moment,
                    avec les bases nécessaires pour s’adapter sereinement à son nouveau foyer.
                </p>

                <div class="repro-final-actions">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Nous contacter</a>
                    <a href="{{ route('chats.disponibles') }}" class="btn btn-outline-light">Voir les chatons</a>
                </div>
            </div>

            <figure>
                <img src="{{ asset('images/home/kitten-16.jpg') }}" alt="Chaton Bengal prêt pour l’adoption">
            </figure>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.js-count');

            if (!counters.length) return;

            const animateCounter = (counter) => {
                if (counter.dataset.done === 'true') return;

                counter.dataset.done = 'true';

                const target = parseInt(counter.dataset.count, 10) || 0;
                const duration = 1400;
                const startTime = performance.now();

                const update = (currentTime) => {
                    const progress = Math.min((currentTime - startTime) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const value = Math.floor(eased * target);

                    counter.textContent = value;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        counter.textContent = target;
                    }
                };

                requestAnimationFrame(update);
            };

            if (!('IntersectionObserver' in window)) {
                counters.forEach(animateCounter);
                return;
            }

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.35
            });

            counters.forEach(counter => observer.observe(counter));
        });
    </script>

@endsection
