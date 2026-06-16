<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chatterie du Diamant Sauvage')</title>
    <meta name="description" content="@yield('description', 'Chatterie du Diamant Sauvage, élevage familial de chats Bengal.')">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hommage-kiara.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile-fixes.css') }}">
</head>

<body>

@include('partials.hommage-kiara')

@include('partials.header')

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-grid">

        <div class="footer-brand">
            <img
                src="{{ asset('images/logo-diamant-sauvage.png') }}"
                alt="Chatterie du Diamant Sauvage"
                class="footer-logo"
            >

            <p>
                Élevage familial de chats Bengal, pensé autour du bien-être,
                de la sélection responsable et de la confiance.
            </p>

            <div class="footer-social-icons" aria-label="Réseaux sociaux de la chatterie">
                <a
                    href="https://www.facebook.com/Elevagedudiamantsauvage"
                    target="_blank"
                    rel="noopener"
                    class="footer-social-icon footer-facebook"
                    aria-label="Facebook"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13.5 21v-7h2.3l.4-2.8h-2.7V9.4c0-.8.2-1.4 1.4-1.4H16V5.5c-.2 0-.9-.1-1.8-.1-1.8 0-3.1 1.1-3.1 3.3v2.4H9v2.8h2.3v7h2.2Z"/>
                    </svg>
                </a>

                <a
                    href="https://www.instagram.com/chatterie_du_diamant_sauvage"
                    target="_blank"
                    rel="noopener"
                    class="footer-social-icon footer-instagram"
                    aria-label="Instagram"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9a4.5 4.5 0 0 1-4.5 4.5h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Zm0 1.8A2.7 2.7 0 0 0 4.8 7.5v9a2.7 2.7 0 0 0 2.7 2.7h9a2.7 2.7 0 0 0 2.7-2.7v-9a2.7 2.7 0 0 0-2.7-2.7h-9Zm9.45 1.35a.9.9 0 1 1 0 1.8.9.9 0 0 1 0-1.8ZM12 7.8A4.2 4.2 0 1 1 7.8 12 4.2 4.2 0 0 1 12 7.8Zm0 1.8A2.4 2.4 0 1 0 14.4 12 2.4 2.4 0 0 0 12 9.6Z"/>
                    </svg>
                </a>

                <a
                    href="mailto:lesbengals_dudiamantsauvage@outlook.fr"
                    class="footer-social-icon footer-mail"
                    aria-label="Email"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Zm0 2v.2l8 5.3 8-5.3V8H4Zm16 8V10.4l-7.4 4.9a1 1 0 0 1-1.2 0L4 10.4V16h16Z"/>
                    </svg>
                </a>

                <a
                    href="tel:+33621596419"
                    class="footer-social-icon footer-phone"
                    aria-label="Téléphone"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6.6 10.8a15.8 15.8 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.3a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .57 3.6 1 1 0 0 1-.25 1l-2 2.2Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <details class="footer-drawer" open>
            <summary>
                    <span>
                        <small>01</small>
                        Le Bengal
                    </span>

                <svg class="footer-drawer-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M7 10l5 5 5-5"/>
                </svg>
            </summary>

            <nav class="footer-drawer-content" aria-label="Pages Le Bengal">
                <a href="{{ route('bengal.origines') }}">Origines, morphologie, robe</a>
                <a href="{{ route('bengal.besoins') }}">Besoins & alimentation</a>
                <a href="{{ route('bengal.sante') }}">Santé</a>
                <a href="{{ route('bengal.reproduction') }}">Reproduction</a>
                <a href="{{ route('bengal.arrivee') }}">Préparer son arrivée</a>
            </nav>
        </details>

        <details class="footer-drawer" open>
            <summary>
                    <span>
                        <small>02</small>
                        Nos chats
                    </span>

                <svg class="footer-drawer-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M7 10l5 5 5-5"/>
                </svg>
            </summary>

            <nav class="footer-drawer-content" aria-label="Pages Nos chats">
                <a href="{{ route('chats.index') }}">Tous nos chats</a>
                <a href="{{ route('chats.femelles') }}">Nos femelles</a>
                <a href="{{ route('chats.males') }}">Nos mâles</a>
                <a href="{{ route('chats.disponibles') }}">Chats disponibles</a>
                <a href="{{ route('chats.mariages') }}">Mariages à venir</a>
            </nav>
        </details>

        <details class="footer-drawer footer-drawer-contact" open>
            <summary>
                    <span>
                        <small>03</small>
                        Navigation
                    </span>

                <svg class="footer-drawer-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M7 10l5 5 5-5"/>
                </svg>
            </summary>

            <nav class="footer-drawer-content" aria-label="Navigation principale">
                <a href="{{ url('/') }}">Accueil</a>
                <a href="{{ route('chatterie') }}">La chatterie</a>
                <a href="{{ route('contact') }}">Nous contacter</a>
            </nav>

            <div class="footer-contact-card">
                <span>Contact</span>
                <p>Villeneuve-de-Marc</p>
                <p>06 21 59 64 19</p>
                <a href="{{ route('contact') }}" class="btn--shine">Écrire à la chatterie</a>
            </div>
        </details>
    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} La Chatterie du Diamant Sauvage — Tous droits réservés.</p>
        <a href="{{ route('mentions') }}">Mentions légales</a>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const footerDrawers = document.querySelectorAll('.site-footer .footer-drawer');
        const desktopQuery = window.matchMedia('(min-width: 761px)');

        function syncFooterDrawers() {
            footerDrawers.forEach((drawer) => {
                if (desktopQuery.matches) {
                    drawer.setAttribute('open', '');
                } else {
                    drawer.removeAttribute('open');
                }
            });
        }

        syncFooterDrawers();

        if (desktopQuery.addEventListener) {
            desktopQuery.addEventListener('change', syncFooterDrawers);
        } else {
            desktopQuery.addListener(syncFooterDrawers);
        }
    });
</script>

<script src="{{ asset('js/hommage-kiara.js') }}"></script>
<script src="{{ asset('js/header.js') }}"></script>

@stack('scripts')

</body>
</html>
