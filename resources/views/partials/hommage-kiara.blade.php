@php
    $photoPaths = glob(public_path('images/hommage/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE);

    natsort($photoPaths);

    $kiaraPhotos = collect($photoPaths)->map(function ($path) {
        $filename = basename(str_replace('\\', '/', $path));
        return asset('images/hommage/' . rawurlencode($filename));
    })->values();

    if ($kiaraPhotos->isEmpty()) {
        $kiaraPhotos = collect([
            asset('images/home/hero-bengal.jpg')
        ]);
    }
@endphp

<div class="kiara-tribute" id="kiaraTribute" aria-hidden="true">

    <div class="kiara-tribute__slideshow">
        @foreach($kiaraPhotos as $index => $photo)
            <img
                src="{{ $photo }}"
                alt="Souvenir de Kiara"
                class="kiara-tribute__image {{ $index === 0 ? 'is-active' : '' }}"
            >
        @endforeach
    </div>

    <div class="kiara-tribute__shade"></div>
    <div class="kiara-tribute__gold"></div>

    <button class="kiara-tribute__close" id="kiaraTributeClose" type="button" aria-label="Fermer l'hommage">
        ×
    </button>

    <div class="kiara-tribute__content">

        <div class="kiara-tribute__brand">
            <div class="kiara-tribute__logo-wrap">
                <img src="{{ asset('images/logo-diamant-sauvage.png') }}" alt="Diamant Sauvage">
            </div>

            <div class="kiara-tribute__brand-text">
                <strong>Diamant Sauvage</strong>
                <span>Chatterie Bengal</span>
            </div>
        </div>

        <p class="kiara-tribute__kicker">
            À l’origine de toutes nos étoiles
        </p>

        <h1>Kiara</h1>

        <p class="kiara-tribute__subtitle">
            Notre premier diamant
        </p>

        <div class="kiara-tribute__line">
            <span></span>
            <i>◆</i>
            <span></span>
        </div>

        <p class="kiara-tribute__text">
            Elle a été la première Bengal de la chatterie, celle avec qui l’aventure a commencé.
            Celle qui a tout inspiré, tout déclenché et tout construit.
        </p>

        <p class="kiara-tribute__quote">
            Plus qu’une présence, elle restera une force, une confidente,
            une étoile fondatrice et l’âme précieuse du Diamant Sauvage.
        </p>

        <div class="kiara-tribute__dates">
            <span>16 avril 2015</span>
            <i>◆</i>
            <span>10 juin 2026</span>
        </div>

        <div class="kiara-tribute__actions">
            <button class="kiara-tribute__enter" id="kiaraTributeEnter" type="button">
                Entrer sur le site
                <span>→</span>
            </button>

            <label class="kiara-tribute__remember">
                <input type="checkbox" id="kiaraTributeRemember">
                Ne plus afficher
            </label>
        </div>

    </div>

    <div class="kiara-tribute__scroll">
        <span>Glisser vers le bas pour entrer</span>
        <i></i>
    </div>

</div>
