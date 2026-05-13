<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chatterie du Diamant Sauvage')</title>
    <meta name="description" content="@yield('description', 'Chatterie du Diamant Sauvage, élevage familial de chats Bengal.')">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @stack('styles')
</head>

<body>
<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo-diamant-sauvage.png') }}" alt="Chatterie du Diamant Sauvage">
        </a>

        <button class="menu-toggle" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav">
            <a href="{{ route('home') }}">Accueil</a>

            <div class="nav-dropdown">
                <span>Le Bengal</span>
                <div class="dropdown-menu">
                    <a href="{{ route('bengal.origines') }}">Origines, morphologie, robe</a>
                    <a href="{{ route('bengal.besoins') }}">Besoins & alimentation</a>
                    <a href="{{ route('bengal.sante') }}">Santé</a>
                    <a href="{{ route('bengal.reproduction') }}">Reproduction</a>
                    <a href="{{ route('bengal.arrivee') }}">Préparer son arrivée</a>
                </div>
            </div>

            <div class="nav-dropdown">
                <span>Nos chats</span>
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

        if (!toggle || !nav) {
            return;
        }

        const openMenu = () => {
            nav.classList.add('is-open');
            toggle.classList.add('is-active');
            toggle.setAttribute('aria-expanded', 'true');
            document.body.classList.add('menu-open');
        };

        const closeMenu = () => {
            nav.classList.remove('is-open');
            toggle.classList.remove('is-active');
            toggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('menu-open');
        };

        const toggleMenu = () => {
            if (nav.classList.contains('is-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        };

        toggle.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();
            toggleMenu();
        });

        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('click', (event) => {
            if (!nav.classList.contains('is-open')) {
                return;
            }

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
    });
</script>

@stack('scripts')
</body>
</html>
