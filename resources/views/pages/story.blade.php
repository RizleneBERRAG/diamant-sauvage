@extends('layouts.site')

@section('title', 'Notre histoire | Chatterie du Diamant Sauvage')
@section('description', 'Découvrez l’histoire du Diamant Sauvage, une chatterie née d’une épreuve, d’une passion pour le Bengal et d’un hommage à Kiara.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/histoire-chatterie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/histoire-founders.css') }}">
@endpush

@section('content')

    @php
        $historyDirectory = public_path('images/histoire');

        $historyPaths = glob($historyDirectory . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE) ?: [];

        $historyPaths = collect($historyPaths)->sort()->values();

        $toHistoryAsset = function ($path) {
            return asset('images/histoire/' . rawurlencode(basename(str_replace('\\', '/', $path))));
        };

        $historyPhotos = $historyPaths->map($toHistoryAsset)->values();

        $findHistoryPhoto = function (array $keywords) use ($historyPaths, $toHistoryAsset) {
            foreach ($historyPaths as $path) {
                $filename = strtolower(pathinfo($path, PATHINFO_FILENAME));

                foreach ($keywords as $keyword) {
                    if (str_contains($filename, strtolower($keyword))) {
                        return $toHistoryAsset($path);
                    }
                }
            }

            return null;
        };

        $kiaraPhoto = $findHistoryPhoto(['kiara'])
            ?? $historyPhotos->first()
            ?? asset('images/histoire/kiara.jpg');

        $largoPhoto = $findHistoryPhoto(['largo'])
            ?? $historyPhotos->skip(1)->first()
            ?? asset('images/histoire/largo.jpg');

        $galleryPhotos = $historyPhotos
            ->reject(fn ($photo) => $photo === $kiaraPhoto || $photo === $largoPhoto)
            ->values();

        if ($galleryPhotos->isEmpty()) {
            $galleryPhotos = $historyPhotos;
        }

        if ($galleryPhotos->isEmpty()) {
            $galleryPhotos = collect([
                asset('images/histoire/souvenir-01.jpg'),
                asset('images/histoire/souvenir-02.jpg'),
                asset('images/histoire/souvenir-03.jpg'),
                asset('images/histoire/souvenir-04.jpg'),
            ]);
        }
    @endphp

    <div class="story-page">

        <section class="story-hero">
            <div class="story-hero__glow story-hero__glow--one"></div>
            <div class="story-hero__glow story-hero__glow--two"></div>

            <div class="container story-hero__grid">
                <div class="story-hero__content">
                    <span class="story-kicker">Notre histoire</span>

                    <h1>
                        Une épreuve, une passion, puis deux premiers diamants.
                    </h1>

                    <p>
                        Le Diamant Sauvage est né dans un moment où la vie demandait plus de présence,
                        plus de douceur, plus de patience. Au cœur de cette nouvelle route, il y a eu mon fils,
                        ma famille, puis Kiara et Largo.
                    </p>

                    <div class="story-hero__actions">
                        <a href="#origine" class="btn btn-gold">
                            Lire notre histoire
                        </a>

                        <a href="#kiara-largo" class="btn btn-outline-light">
                            Voir Kiara & Largo
                        </a>
                    </div>
                </div>

                <div class="story-hero__portrait">
                    <figure>
                        <img src="{{ $kiaraPhoto }}" alt="Kiara, première Bengal du Diamant Sauvage">
                    </figure>

                    <div class="story-hero__card">
                        <span>Le début</span>
                        <strong>Kiara</strong>
                        <p>Le premier diamant, celui qui a donné une âme à toute l’histoire.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="story-intro" id="origine">
            <div class="container story-intro__grid">
                <div class="story-intro__sticky">
                    <span class="story-kicker story-kicker--dark">2006</span>
                    <h2>Quand la vie change de chemin.</h2>
                </div>

                <div class="story-intro__text">
                    <p>
                        En 2006, un accident est venu bouleverser notre vie de famille.
                        Mon fils a eu besoin de temps, de soins, de rééducation, et surtout d’une présence
                        quotidienne auprès de lui.
                    </p>

                    <p>
                        J’ai alors quitté le rythme du travail pour rester là, au plus près de ce qui comptait vraiment.
                        Dans cette période suspendue, mon mari John m’a soufflé une idée simple :
                        faire entrer les chats dans notre quotidien, moi qui les aimais déjà tant.
                    </p>

                    <blockquote>
                        C’est ainsi qu’une épreuve est devenue un refuge,
                        puis qu’un refuge est devenu une passion.
                    </blockquote>
                </div>
            </div>
        </section>

        <section class="story-founders" id="kiara-largo">
            <div class="container">
                <div class="story-section-head story-section-head--center">
                    <span class="story-kicker story-kicker--dark">Le premier couple</span>
                    <h2>Kiara et Largo, là où tout a commencé.</h2>
                </div>

                <div class="story-founders__grid">
                    <article class="story-founder-card">
                        <figure>
                            <img src="{{ $kiaraPhoto }}" alt="Kiara, première Bengal du Diamant Sauvage">
                        </figure>

                        <div>
                            <span>Kiara</span>
                            <h3>Le premier diamant</h3>

                            <p>
                                Kiara est entrée dans notre vie comme une lumière douce.
                                Elle a accompagné les jours fragiles, les silences, les forces retrouvées,
                                et a donné son âme au Diamant Sauvage.
                            </p>
                        </div>
                    </article>

                    <article class="story-founder-card">
                        <figure>
                            <img src="{{ $largoPhoto }}" alt="Largo, premier mâle Bengal du Diamant Sauvage">
                        </figure>

                        <div>
                            <span>Largo</span>
                            <h3>Le début d’une lignée</h3>

                            <p>
                                Avec Largo, notre premier couple s’est formé.
                                Ensemble, Kiara et lui ont ouvert la première page d’une aventure familiale
                                portée par l’amour du Bengal.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="story-intro">
            <div class="container story-intro__grid">
                <div class="story-intro__sticky">
                    <span class="story-kicker story-kicker--dark">Le Bengal</span>
                    <h2>Une évidence sauvage et tendre.</h2>
                </div>

                <div class="story-intro__text">
                    <p>
                        Le Bengal m’a fascinée par sa prestance, son intelligence, sa gentillesse
                        et cette façon unique d’être présent, presque comme une petite âme vive dans la maison.
                    </p>

                    <p>
                        Kiara et Largo ont eu leurs premiers bébés. Largo était LOOF, Kiara n’a jamais pu obtenir
                        ses papiers, mais leur histoire a posé les premières pierres de la chatterie :
                        de l’amour, de l’attention, de la patience et beaucoup de respect.
                    </p>

                    <blockquote>
                        Le Diamant Sauvage n’est pas né d’une ambition.
                        Il est né d’un lien.
                    </blockquote>
                </div>
            </div>
        </section>

        <section class="story-values">
            <div class="container">
                <div class="story-section-head story-section-head--center">
                    <span class="story-kicker">Au fil des années</span>
                    <h2>La famille s’est agrandie, l’histoire aussi.</h2>
                </div>

                <div class="story-values__grid">
                    <article>
                        <span>Joys & Namy</span>
                        <h3>Deux nouvelles présences</h3>

                        <p>
                            Elles sont venues enrichir la chatterie, chacune avec son caractère,
                            sa douceur et sa place dans cette aventure.
                        </p>
                    </article>

                    <article>
                        <span>Prada</span>
                        <h3>Une fille gardée près de nous</h3>

                        <p>
                            Fille de Namy, Prada est restée à la maison comme une évidence,
                            parce que certaines histoires ne se séparent pas.
                        </p>
                    </article>

                    <article>
                        <span>Rubi</span>
                        <h3>Une nouvelle page</h3>

                        <p>
                            Arrivée il y a plusieurs années, Rubi a poursuivi l’évolution du Diamant Sauvage
                            avec élégance et caractère.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="story-gallery" aria-label="Souvenirs de Kiara">
            <div class="container">
                <div class="story-section-head">
                    <span class="story-kicker story-kicker--dark">Souvenirs</span>
                    <h2>Des fragments de vie gardés comme des éclats précieux.</h2>
                </div>

                <div class="story-gallery__grid">
                    @foreach($galleryPhotos->take(8) as $index => $photo)
                        <figure class="story-gallery__item story-gallery__item--{{ ($index % 4) + 1 }}">
                            <img src="{{ $photo }}" alt="Souvenir du Diamant Sauvage {{ $index + 1 }}">
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="story-intro" id="kiara">
            <div class="container story-intro__grid">
                <div class="story-intro__sticky">
                    <span class="story-kicker story-kicker--dark">Kiara</span>
                    <h2>Mon premier diamant.</h2>
                </div>

                <div class="story-intro__text">
                    <p>
                        Kiara a été stérilisée à cinq ans et demi, puis elle est restée auprès de nous,
                        non plus comme reproductrice, mais comme membre à part entière de la famille.
                    </p>

                    <p>
                        Elle a été une présence fidèle, un réconfort discret, une compagne de route.
                        Dans les années difficiles comme dans les plus douces, elle a gardé cette place
                        que seuls les êtres profondément aimés peuvent laisser.
                    </p>

                    <blockquote>
                        Kiara restera l’étoile fondatrice,
                        celle par qui le Diamant Sauvage a trouvé son cœur.
                    </blockquote>
                </div>
            </div>
        </section>

        <section class="story-final">
            <div class="container">
                <div class="story-final__card">
                    <span class="story-kicker">Aujourd’hui</span>

                    <h2>
                        Le Diamant Sauvage continue d’écrire son histoire.
                    </h2>

                    <p>
                        Chaque naissance, chaque adoption, chaque rencontre porte encore un peu de cette origine :
                        une famille, une passion, des chats aimés profondément,
                        et le souvenir lumineux de Kiara.
                    </p>

                    <a href="{{ route('chats.index') }}" class="btn btn-gold">
                        Découvrir nos Bengal
                    </a>
                </div>
            </div>
        </section>

    </div>

@endsection
