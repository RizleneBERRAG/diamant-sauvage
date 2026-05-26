<header class="ds-header">
    <div class="ds-header-container">
        <a href="{{ url('/') }}" class="ds-logo" aria-label="Retour à l’accueil">
            <img src="{{ asset('images/logo-diamant-sauvage.png') }}" alt="Chatterie du Diamant Sauvage">
        </a>

        <button
            class="ds-menu-toggle"
            type="button"
            aria-label="Ouvrir le menu"
            aria-expanded="false"
            aria-controls="dsMainNav"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="ds-nav" id="dsMainNav" aria-label="Navigation principale">
            <a href="{{ url('/') }}">Accueil</a>

            <div class="ds-nav-dropdown">
                <button class="ds-nav-trigger" type="button" aria-expanded="false">
                    Le Bengal
                </button>

                <div class="ds-dropdown-menu">
                    <a href="{{ route('bengal.origines') }}">Origines, morphologie, robe</a>
                    <a href="{{ route('bengal.besoins') }}">Besoins & alimentation</a>
                    <a href="{{ route('bengal.sante') }}">Santé</a>
                    <a href="{{ route('bengal.reproduction') }}">Reproduction</a>
                    <a href="{{ route('bengal.arrivee') }}">Préparer son arrivée</a>
                </div>
            </div>

            <div class="ds-nav-dropdown">
                <button class="ds-nav-trigger" type="button" aria-expanded="false">
                    Nos chats
                </button>

                <div class="ds-dropdown-menu">
                    <a href="{{ route('chats.index') }}">Tous nos chats</a>
                    <a href="{{ route('chats.femelles') }}">Nos femelles</a>
                    <a href="{{ route('chats.males') }}">Nos mâles</a>
                    <a href="{{ route('chats.disponibles') }}">Chats disponibles</a>
                </div>
            </div>

            <a href="{{ route('chatterie') }}">La chatterie</a>
            <a href="{{ route('contact') }}" class="ds-nav-contact">Nous contacter</a>
        </nav>
    </div>
</header>
