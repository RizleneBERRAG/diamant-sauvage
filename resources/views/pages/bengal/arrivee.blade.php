@extends('layouts.site')

@section('title', 'Préparer l’arrivée de son Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Préparer l’arrivée de votre chaton Bengal : transport, pièce calme, adaptation, premiers jours, présentation avec les animaux et transition alimentaire.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bengal/arrivee.css') }}">
@endpush

@section('content')

    <section class="arrival-hero" id="top">
        <div class="container arrival-hero-grid">
            <div class="arrival-hero-content">
                <span class="arrival-eyebrow">Préparer son arrivée</span>

                <h1>
                    Son premier jour
                    <span>doit ressembler à un refuge.</span>
                </h1>

                <p>
                    Le départ de la chatterie est un grand bouleversement. L’objectif n’est pas de tout lui montrer
                    immédiatement, mais de créer un cocon calme, stable et rassurant pour qu’il découvre son nouveau foyer
                    à son rythme.
                </p>

                <div class="arrival-hero-actions">
                    <a href="#cocon" class="btn btn-gold">Créer son cocon</a>
                    <a href="#checklist" class="btn btn-glass">Checklist arrivée</a>
                </div>
            </div>

            <div class="arrival-hero-stage">
                <figure class="arrival-hero-photo">
                    <img src="{{ asset('images/home/kitten-13.jpg') }}" alt="Chaton Bengal dans un espace calme">
                </figure>

                <div class="arrival-floating-card arrival-card-transport">
                    <span>01</span>
                    <strong>Transport</strong>
                    <small>Caisse confortable + odeur familière</small>
                </div>

                <div class="arrival-floating-card arrival-card-calm">
                    <span>02</span>
                    <strong>Calme</strong>
                    <small>Une petite pièce avant la maison entière</small>
                </div>

                <div class="arrival-floating-note">
                    <span>Règle d’or</span>
                    <strong>Ne jamais le forcer à sortir.</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="arrival-capsules">
        <div class="container">
            <div class="arrival-capsules-grid">
                <article>
                    <span>Calme</span>
                    <strong>Limiter le stress</strong>
                </article>

                <article>
                    <span>Odeur</span>
                    <strong>Garder ses repères</strong>
                </article>

                <article>
                    <span>Rythme</span>
                    <strong>Le laisser venir</strong>
                </article>

                <article>
                    <span>Patience</span>
                    <strong>Observer sans brusquer</strong>
                </article>
            </div>
        </div>
    </section>

    <section class="arrival-cocon" id="cocon">
        <div class="container arrival-cocon-layout">
            <div class="arrival-cocon-intro">
                <span class="arrival-label">Le cocon d’arrivée</span>

                <h2>Avant de découvrir la maison, il doit d’abord comprendre son espace.</h2>

                <p>
                    Le jour de son arrivée, préparez une petite pièce fermée, calme et sécurisante. Cet espace devient son
                    refuge : il y retrouve ses affaires, ses odeurs, sa litière, son couchage et ses premiers repères.
                </p>
            </div>

            <div class="arrival-cocon-board">
                <div class="arrival-room-visual">
                    <figure>
                        <img src="{{ asset('images/home/kitten-12.jpg') }}" alt="Jeune chaton Bengal">
                    </figure>

                    <button type="button" class="arrival-room-marker is-active" data-arrival-item="transport">
                        Transport
                    </button>

                    <button type="button" class="arrival-room-marker" data-arrival-item="couchage">
                        Couchage
                    </button>

                    <button type="button" class="arrival-room-marker" data-arrival-item="gamelles">
                        Gamelles
                    </button>

                    <button type="button" class="arrival-room-marker" data-arrival-item="litiere">
                        Litière
                    </button>

                    <button type="button" class="arrival-room-marker" data-arrival-item="jouets">
                        Jouets
                    </button>
                </div>

                <div class="arrival-live-panel">
                    <span id="arrivalLiveKicker">Essentiel 01</span>
                    <h3 id="arrivalLiveTitle">La caisse de transport</h3>
                    <p id="arrivalLiveText">
                        Elle doit être stable, fermée et confortable. Ajoutez un petit coussin et gardez-la au calme pendant
                        le trajet.
                    </p>

                    <div class="arrival-live-tip">
                        <strong>Astuce</strong>
                        <small>Un linge avec l’odeur de son environnement l’aide à se rassurer.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="arrival-hours">
        <div class="container">
            <div class="arrival-section-head">
                <span class="arrival-label">Les premières 72 heures</span>

                <h2>Un accueil réussi se joue dans les premiers instants.</h2>

                <p>
                    Le Bengal peut être curieux, mais il reste un chaton qui vient de perdre ses repères. Le secret :
                    une progression douce, une présence calme et aucune obligation.
                </p>
            </div>

            <div class="arrival-hours-grid">
                <article class="arrival-hour-card is-dark">
                    <span>00h</span>
                    <h3>Arrivée</h3>
                    <p>Placez sa caisse dans la pièce prévue. Ouvrez la porte, puis laissez-le décider.</p>
                </article>

                <article class="arrival-hour-card">
                    <span>06h</span>
                    <h3>Observation</h3>
                    <p>Il peut se cacher, sentir, écouter ou observer. Tout cela est normal.</p>
                </article>

                <article class="arrival-hour-card">
                    <span>24h</span>
                    <h3>Confiance</h3>
                    <p>Proposez une friandise ou un jeu, sans insister. Il doit associer votre présence à du positif.</p>
                </article>

                <article class="arrival-hour-card is-gold">
                    <span>72h</span>
                    <h3>Ouverture</h3>
                    <p>Si le chaton est à l’aise, la découverte du reste de la maison peut commencer progressivement.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="arrival-scenarios">
        <div class="container arrival-scenarios-layout">
            <div>
                <span class="arrival-label">Découverte du foyer</span>

                <h2>Chaque maison demande un rythme différent.</h2>

                <p>
                    La découverte sera plus simple s’il n’y a pas d’autres animaux. Avec des animaux déjà présents, il faut
                    avancer plus lentement, en gardant toujours le contrôle des premières rencontres.
                </p>

                <div class="arrival-tabs">
                    <button type="button" class="arrival-tab is-active" data-arrival-tab="solo">
                        Sans autre animal
                    </button>

                    <button type="button" class="arrival-tab" data-arrival-tab="animals">
                        Avec d’autres animaux
                    </button>
                </div>
            </div>

            <div class="arrival-scenario-panel">
                <article class="arrival-scenario is-active" data-arrival-panel="solo">
                    <span>Scénario calme</span>
                    <h3>La porte peut s’ouvrir plus rapidement.</h3>
                    <p>
                        Si le chaton se montre curieux et rassuré, vous pouvez laisser la porte entrouverte. Il sortira de
                        lui-même lorsqu’il voudra explorer.
                    </p>

                    <div>
                        <small>Ne pas porter de force</small>
                        <small>Laisser explorer</small>
                        <small>Garder une pièce refuge</small>
                    </div>
                </article>

                <article class="arrival-scenario" data-arrival-panel="animals">
                    <span>Scénario progressif</span>
                    <h3>Les présentations doivent rester surveillées.</h3>
                    <p>
                        Les premiers contacts se font en votre présence. On augmente ensuite les temps de rencontre au fur
                        et à mesure, surtout s’il y a grognements ou tensions.
                    </p>

                    <div>
                        <small>Présence obligatoire</small>
                        <small>Durées courtes</small>
                        <small>Progression douce</small>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="arrival-transition">
        <div class="container arrival-transition-layout">
            <div class="arrival-transition-card">
                <span>À éviter</span>
                <strong>Changer trop vite l’alimentation ou la litière.</strong>
                <p>
                    Pendant l’adaptation, gardez ses repères. Une transition alimentaire peut se faire plus tard, mais jamais
                    brutalement.
                </p>
            </div>

            <div class="arrival-transition-path">
                <article>
                    <span>01</span>
                    <h3>Stabilité</h3>
                    <p>On garde son alimentation et sa litière habituelles.</p>
                </article>

                <article>
                    <span>02</span>
                    <h3>Observation</h3>
                    <p>On surveille son appétit, son transit et son comportement.</p>
                </article>

                <article>
                    <span>03</span>
                    <h3>Transition</h3>
                    <p>Après environ deux mois, un changement peut être fait progressivement.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="arrival-checklist" id="checklist">
        <div class="container arrival-checklist-layout">
            <div class="arrival-checklist-intro">
                <span class="arrival-label">Checklist interactive</span>

                <h2>Préparez tout avant le grand jour.</h2>

                <p>
                    Cochez les éléments au fur et à mesure. L’idée est simple : quand tout est prêt, le chaton peut arriver
                    dans un environnement clair, doux et rassurant.
                </p>

                <div class="arrival-progress">
                    <div class="arrival-progress-top">
                        <strong id="arrivalProgressText">0 / 10 prêts</strong>
                        <span id="arrivalProgressPercent">0%</span>
                    </div>

                    <div class="arrival-progress-bar">
                        <span id="arrivalProgressFill"></span>
                    </div>
                </div>
            </div>

            <div class="arrival-check-items">
                <button type="button">Caisse de transport</button>
                <button type="button">Petit coussin</button>
                <button type="button">Pièce calme</button>
                <button type="button">Gamelles</button>
                <button type="button">Eau fraîche</button>
                <button type="button">Alimentation habituelle</button>
                <button type="button">Litière habituelle</button>
                <button type="button">Jouets</button>
                <button type="button">Friandises</button>
                <button type="button">Temps et patience</button>
            </div>
        </div>
    </section>

    <section class="arrival-final">
        <div class="container arrival-final-card">
            <div>
                <span class="arrival-label">Accueil en confiance</span>

                <h2>Le plus important : douceur, patience et observation.</h2>

                <p>
                    Un Bengal bien accueilli est un chaton à qui l’on laisse le temps de comprendre, d’observer et de venir
                    de lui-même. Plus son arrivée est calme, plus son adaptation sera sereine.
                </p>

                <div class="arrival-final-actions">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Poser une question</a>
                    <a href="{{ route('chats.disponibles') }}" class="btn btn-outline-light">Voir les chatons</a>
                </div>
            </div>

            <figure>
                <img src="{{ asset('images/home/kitten-16.jpg') }}" alt="Chaton Bengal prêt à rejoindre sa famille">
            </figure>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = {
                transport: {
                    kicker: 'Essentiel 01',
                    title: 'La caisse de transport',
                    text: 'Elle doit être stable, fermée et confortable. Ajoutez un petit coussin et gardez-la au calme pendant le trajet.',
                    tip: 'Un linge avec l’odeur de son environnement l’aide à se rassurer.'
                },
                couchage: {
                    kicker: 'Essentiel 02',
                    title: 'Le coin couchage',
                    text: 'Un espace doux et calme lui permet de se poser sans être sollicité en permanence.',
                    tip: 'Évitez de déplacer son couchage les premiers jours.'
                },
                gamelles: {
                    kicker: 'Essentiel 03',
                    title: 'Les gamelles',
                    text: 'Placez l’eau et l’alimentation à proximité, mais pas collées à la litière.',
                    tip: 'Gardez son alimentation habituelle au début.'
                },
                litiere: {
                    kicker: 'Essentiel 04',
                    title: 'La litière',
                    text: 'Elle doit être accessible, propre et placée dans un endroit calme.',
                    tip: 'Ne changez pas brutalement de type de litière.'
                },
                jouets: {
                    kicker: 'Essentiel 05',
                    title: 'Les premiers jouets',
                    text: 'Le jeu peut aider à créer le lien, mais il ne faut pas insister s’il préfère observer.',
                    tip: 'Un jeu doux vaut mieux qu’une stimulation trop forte.'
                }
            };

            const markers = document.querySelectorAll('.arrival-room-marker');
            const kicker = document.getElementById('arrivalLiveKicker');
            const title = document.getElementById('arrivalLiveTitle');
            const text = document.getElementById('arrivalLiveText');
            const tip = document.querySelector('.arrival-live-tip small');

            markers.forEach((marker) => {
                marker.addEventListener('click', () => {
                    const key = marker.dataset.arrivalItem;
                    const item = data[key];

                    if (!item) return;

                    markers.forEach(btn => btn.classList.remove('is-active'));
                    marker.classList.add('is-active');

                    kicker.textContent = item.kicker;
                    title.textContent = item.title;
                    text.textContent = item.text;
                    tip.textContent = item.tip;
                });
            });

            const tabs = document.querySelectorAll('.arrival-tab');
            const panels = document.querySelectorAll('.arrival-scenario');

            tabs.forEach((tab) => {
                tab.addEventListener('click', () => {
                    const target = tab.dataset.arrivalTab;

                    tabs.forEach(btn => btn.classList.remove('is-active'));
                    panels.forEach(panel => panel.classList.remove('is-active'));

                    tab.classList.add('is-active');

                    const panel = document.querySelector(`[data-arrival-panel="${target}"]`);
                    if (panel) panel.classList.add('is-active');
                });
            });

            const checklistButtons = document.querySelectorAll('.arrival-check-items button');
            const progressText = document.getElementById('arrivalProgressText');
            const progressPercent = document.getElementById('arrivalProgressPercent');
            const progressFill = document.getElementById('arrivalProgressFill');

            function updateProgress() {
                const total = checklistButtons.length;
                const checked = document.querySelectorAll('.arrival-check-items button.is-checked').length;
                const percent = Math.round((checked / total) * 100);

                progressText.textContent = `${checked} / ${total} prêts`;
                progressPercent.textContent = `${percent}%`;
                progressFill.style.width = `${percent}%`;
            }

            checklistButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    button.classList.toggle('is-checked');
                    updateProgress();
                });
            });
        });
    </script>

@endsection
