<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chatterie du Diamant Sauvage')</title>
    <meta name="description" content="@yield('description', 'Chatterie du Diamant Sauvage, élevage familial de chats Bengal.')">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @stack('styles')

    <link rel="stylesheet" href="{{ asset('css/mobile-menu-fix.css') }}">
</head>

<body>
<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="logo" aria-label="Retour à l’accueil">
            <img src="{{ asset('images/logo-diamant-sauvage.png') }}" alt="Chatterie du Diamant Sauvage">
        </a>

        <button
            class="menu-toggle"
            type="button"
            aria-label="Ouvrir le menu"
            aria-expanded="false"
            aria-controls="mainNav"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav" id="mainNav" aria-label="Navigation principale">
            <a href="{{ route('home') }}">Accueil</a>

            <div class="nav-dropdown">
                <button class="nav-dropdown-trigger" type="button" aria-expanded="false">
                    Le Bengal
                </button>

                <div class="dropdown-menu">
                    <a href="{{ route('bengal.origines') }}">Origines, morphologie, robe</a>
                    <a href="{{ route('bengal.besoins') }}">Besoins & alimentation</a>
                    <a href="{{ route('bengal.sante') }}">Santé</a>
                    <a href="{{ route('bengal.reproduction') }}">Reproduction</a>
                    <a href="{{ route('bengal.arrivee') }}">Préparer son arrivée</a>
                </div>
            </div>

            <div class="nav-dropdown">
                <button class="nav-dropdown-trigger" type="button" aria-expanded="false">
                    Nos chats
                </button>

                <div class="dropdown-menu">
                    <a href="{{ route('chats.index') }}">Tous nos chats</a>
                    <a href="{{ route('chats.femelles') }}">Nos femelles</a>
                    <a href="{{ route('chats.males') }}">Nos mâles</a>
                    <a href="{{ route('chats.disponibles') }}">Chats disponibles</a>
                </div>
            </div>

            <a href="{{ route('chatterie') }}">La chatterie</a>
            <a href="{{ route('contact') }}" class="nav-contact">Contact</a>
        </nav>
    </div>
</header>

<div class="menu-backdrop" aria-hidden="true"></div>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <img src="{{ asset('images/logo-diamant-sauvage.png') }}" alt="Chatterie du Diamant Sauvage" class="footer-logo">
            <p>Élevage familial de chats Bengal, pensé autour du bien-être, de la sélection responsable et de la confiance.</p>
        </div>

        <div>
            <h3>Navigation</h3>
            <a href="{{ route('chatterie') }}">La chatterie</a>
            <a href="{{ route('chats.femelles') }}">Nos femelles</a>
            <a href="{{ route('chats.males') }}">Nos mâles</a>
            <a href="{{ route('chats.disponibles') }}">Chats disponibles</a>
        </div>

        <div>
            <h3>Contact</h3>
            <p>Villeneuve-de-Marc</p>
            <p>06 21 59 64 19</p>
            <a href="{{ route('contact') }}">Nous contacter</a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} La Chatterie du Diamant Sauvage — Tous droits réservés.</p>
        <a href="{{ route('mentions') }}">Mentions légales</a>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.main-nav');
        const backdrop = document.querySelector('.menu-backdrop');

        if (!toggle || !nav) {
            return;
        }

        const openMenu = () => {
            nav.classList.add('is-open');
            toggle.classList.add('is-active');
            toggle.setAttribute('aria-expanded', 'true');
            toggle.setAttribute('aria-label', 'Fermer le menu');
            document.body.classList.add('menu-open');

            if (backdrop) {
                backdrop.classList.add('is-visible');
            }
        };

        const closeMenu = () => {
            nav.classList.remove('is-open');
            toggle.classList.remove('is-active');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Ouvrir le menu');
            document.body.classList.remove('menu-open');

            if (backdrop) {
                backdrop.classList.remove('is-visible');
            }
        };

        toggle.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            if (nav.classList.contains('is-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        if (backdrop) {
            backdrop.addEventListener('click', closeMenu);
        }

        document.addEventListener('click', (event) => {
            const clickedInsideMenu = event.target.closest('.main-nav');
            const clickedToggle = event.target.closest('.menu-toggle');

            if (!clickedInsideMenu && !clickedToggle) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 980) {
                closeMenu();
            }
        });
    });
</script>

@stack('scripts')
</body>
</html>
