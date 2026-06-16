@extends('layouts.site')

@section('title', 'Contact & adoption | Chatterie du Diamant Sauvage')
@section('description', 'Contactez la Chatterie du Diamant Sauvage pour échanger autour d’un projet d’adoption Bengal LOOF.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')

    <section class="contact-hero">
        <div class="contact-hero-orb contact-hero-orb-1"></div>
        <div class="contact-hero-orb contact-hero-orb-2"></div>

        <div class="container contact-hero-grid">
            <div class="contact-hero-content contact-reveal">
                <span class="contact-kicker">Contact & adoption</span>

                <h1>
                    Parlons de votre futur
                    <em>Bengal.</em>
                </h1>

                <p>
                    Une adoption commence toujours par un échange sincère. Présentez votre projet,
                    votre cadre de vie et vos attentes : la chatterie vous répondra avec attention.
                </p>

                <div class="contact-hero-actions">
                    <a href="#message" class="btn btn-gold contact-scroll">
                        Écrire un message
                    </a>

                    <a href="#localisation" class="btn btn-outline-light contact-scroll">
                        Voir la localisation
                    </a>
                </div>
            </div>

            <aside class="contact-signature-card contact-reveal delay-1">
                <span class="signature-label">Chatterie du Diamant Sauvage</span>

                <h2>Un échange humain, avant tout.</h2>

                <p>
                    L’objectif n’est pas simplement de “réserver un chaton”, mais de trouver une famille adaptée,
                    sérieuse et prête à accueillir un Bengal dans de bonnes conditions.
                </p>

                <div class="signature-points">
                    <div>
                        <strong>01</strong>
                        <span>Projet étudié avec attention</span>
                    </div>

                    <div>
                        <strong>02</strong>
                        <span>Réponse claire et personnalisée</span>
                    </div>

                    <div>
                        <strong>03</strong>
                        <span>Accompagnement avant et après l’adoption</span>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="contact-options">
        <div class="container">
            <div class="contact-section-head contact-reveal">
                <span class="contact-kicker contact-kicker-dark">Choisir le bon canal</span>

                <h2>Un contact simple, direct et agréable.</h2>

                <p>
                    Pour une demande d’adoption, le formulaire reste le plus pratique.
                    Pour une question rapide, vous pouvez aussi contacter la chatterie directement.
                </p>
            </div>

            <div class="contact-link-icons contact-reveal delay-1">
                <a href="#message" class="contact-link-icon contact-link-form contact-scroll" aria-label="Aller au formulaire" data-label="Formulaire">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm0 2v.3l8 5.2 8-5.2V7H4Zm16 10V9.6l-7.4 4.8a1 1 0 0 1-1.2 0L4 9.6V17h16Z"/>
                    </svg>
                </a>

                <a href="tel:+33621596419" class="contact-link-icon contact-link-phone" aria-label="Téléphone" data-label="Téléphone">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6.6 10.8a15.8 15.8 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.3a1 1 0 0 1 1 1 11.4 11.4 0 0 0 .57 3.6 1 1 0 0 1-.25 1l-2 2.2Z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/chatterie_du_diamant_sauvage" target="_blank" rel="noopener" class="contact-link-icon contact-link-instagram" aria-label="Instagram" data-label="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9a4.5 4.5 0 0 1-4.5 4.5h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Zm0 1.8A2.7 2.7 0 0 0 4.8 7.5v9a2.7 2.7 0 0 0 2.7 2.7h9a2.7 2.7 0 0 0 2.7-2.7v-9a2.7 2.7 0 0 0-2.7-2.7h-9ZM12 7.8A4.2 4.2 0 1 1 7.8 12 4.2 4.2 0 0 1 12 7.8Zm0 1.8A2.4 2.4 0 1 0 14.4 12 2.4 2.4 0 0 0 12 9.6Zm4.95-3.45a.9.9 0 1 1 0 1.8.9.9 0 0 1 0-1.8Z"/>
                    </svg>
                </a>

                <a href="https://www.facebook.com/Elevagedudiamantsauvage" target="_blank" rel="noopener" class="contact-link-icon contact-link-facebook" aria-label="Facebook" data-label="Facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13.5 21v-7h2.3l.4-2.8h-2.7V9.4c0-.8.2-1.4 1.4-1.4H16V5.5c-.2 0-.9-.1-1.8-.1-1.8 0-3.1 1.1-3.1 3.3v2.4H9v2.8h2.3v7h2.2Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    @php
        $googleReviews = [
            [
                'name' => 'Valerie Pionchon',
                'date' => 'Il y a 3 semaines',
                'rating' => 5,
                'text' => "Nous avons adopté nos deux petites merveilles à la chatterie du Diamant Sauvage, un chaton et une « retraitée » de 5 ans. Dès le premier contact avec l’éleveuse, nous avons senti une femme très agréable, professionnelle, soucieuse du bien-être des animaux et aimant son travail. Nous avons eu beaucoup d’échanges avec elle tout au long du processus d’adoption. Toujours disponible pour répondre à nos questions, nous envoyer des photos et des vidéos. Les chats sont arrivés chez nous sociabilisés, propres, câlins, curieux… des amours. Nous recommandons l’élevage du Diamant Sauvage les yeux fermés. Un grand merci pour votre disponibilité et votre professionnalisme.",
            ],
            [
                'name' => 'Claire K',
                'date' => 'Il y a 1 mois',
                'rating' => 5,
                'text' => "J’ai réservé deux chatons et elle m’a contactée spontanément avant de venir les chercher pour me signaler un problème de santé sérieux concernant l’un d’eux. Des soucis de développement peuvent arriver chez n’importe quel éleveur — ce qui compte, c’est la manière dont ils sont gérés, et j’ai apprécié son honnêteté.",
            ],
            [
                'name' => 'Florian Bonnet',
                'date' => 'Il y a 1 mois',
                'rating' => 5,
                'text' => "Vraiment une superbe chatterie, avec quelqu’un de très passionné et très carré. Nous sommes venus de Marseille et nous avons tout géré à distance jusqu’au jour où nous sommes venus récupérer le chaton. Tout s’est bien déroulé et nous recommandons vraiment cette chatterie.",
            ],
        ];
    @endphp

    <section class="contact-static-reviews">
        <div class="container">
            <div class="contact-reviews-head contact-reveal">
                <span class="contact-kicker contact-kicker-dark">Avis Google</span>

                <h2>Les derniers retours des familles.</h2>

                <p>
                    Quelques avis récents laissés par les familles ayant échangé avec la chatterie.
                    Des retours précieux qui reflètent l’accompagnement, la confiance et le sérieux apportés à chaque adoption.
                </p>
            </div>

            <div class="static-reviews-layout contact-reveal delay-1">
                <aside class="static-reviews-summary">
                    <span>Note Google</span>

                    <strong>5,0/5</strong>

                    <p>
                        Avis récents issus de la fiche Google de la chatterie.
                    </p>

                    <a
                        href="https://www.google.com/search?q=Chatterie+du+Diamant+Sauvage+avis"
                        target="_blank"
                        rel="noopener"
                    >
                        Voir les avis Google
                        <small>↗</small>
                    </a>
                </aside>

                <div class="static-reviews-grid">
                    @foreach($googleReviews as $review)
                        <article class="static-review-card">
                            <div class="static-review-top">
                                <div class="static-review-avatar">
                                    {{ mb_substr($review['name'], 0, 1) }}
                                </div>

                                <div>
                                    <strong>{{ $review['name'] }}</strong>
                                    <span>{{ $review['date'] }}</span>
                                </div>
                            </div>

                            <div class="static-review-stars" aria-label="{{ $review['rating'] }} étoiles sur 5">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= $review['rating'] ? '★' : '☆' }}
                                @endfor
                            </div>

                            <p class="static-review-excerpt">
                                {{ $review['text'] }}
                            </p>

                            <button
                                type="button"
                                class="static-review-open"
                                data-name="{{ e($review['name']) }}"
                                data-date="{{ e($review['date']) }}"
                                data-rating="{{ $review['rating'] }}"
                                data-text="{{ e($review['text']) }}"
                            >
                                Lire l’avis complet
                            </button>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="review-modal" id="reviewModal" aria-hidden="true">
        <div class="review-modal-backdrop" data-review-close></div>

        <div class="review-modal-panel" role="dialog" aria-modal="true" aria-labelledby="reviewModalName">
            <button type="button" class="review-modal-close" data-review-close aria-label="Fermer l’avis">
                ×
            </button>

            <div class="review-modal-top">
                <div class="review-modal-avatar" id="reviewModalAvatar">A</div>

                <div>
                    <h3 id="reviewModalName">Avis Google</h3>
                    <span id="reviewModalDate">Date</span>
                </div>
            </div>

            <div class="review-modal-stars" id="reviewModalStars">★★★★★</div>

            <p id="reviewModalText"></p>
        </div>
    </div>

    <section class="contact-main" id="message">
        <div class="container contact-main-grid">
            <div class="contact-form-panel contact-reveal">
                <span class="contact-kicker contact-kicker-dark">Votre message</span>

                <h2>Présentez votre projet en quelques lignes.</h2>

                <p>
                    Quelques informations suffisent pour commencer : votre cadre de vie,
                    votre expérience avec les chats et ce que vous recherchez.
                </p>

                <form class="luxury-contact-form" action="#" method="POST">
                    @csrf

                    <div class="form-row">
                        <label>
                            <span>Votre nom</span>
                            <input type="text" name="name" placeholder="Nom et prénom">
                        </label>

                        <label>
                            <span>Votre email</span>
                            <input type="email" name="email" placeholder="votre@email.fr">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Téléphone</span>
                            <input type="tel" name="phone" placeholder="06 00 00 00 00">
                        </label>

                        <label>
                            <span>Votre préférence</span>
                            <select name="preference">
                                <option value="">À préciser</option>
                                <option value="femelle">Femelle</option>
                                <option value="male">Mâle</option>
                                <option value="indifferent">Ouvert aux deux</option>
                            </select>
                        </label>
                    </div>

                    <label>
                        <span>Votre projet</span>
                        <textarea name="message" rows="6" placeholder="Parlez brièvement de votre cadre de vie, de votre recherche et de ce qui vous attire chez le Bengal."></textarea>
                    </label>

                    <div class="contact-form-bottom">
                        <p>
                            La chatterie vous répondra avec attention dès que possible.
                        </p>

                        <button type="submit" class="btn btn-gold">
                            Envoyer ma demande
                        </button>
                    </div>
                </form>
            </div>

            <aside class="contact-guidance contact-reveal delay-1">
                <div class="guidance-card guidance-card-dark">
                    <span>Conseil</span>

                    <h3>Un bon premier message reste simple.</h3>

                    <p>
                        Inutile d’écrire trop long : présentez qui vous êtes, votre lieu de vie,
                        votre disponibilité et le type de chaton recherché.
                    </p>
                </div>

                <div class="guidance-card">
                    <span>À préciser</span>

                    <ul>
                        <li>Maison ou appartement</li>
                        <li>Présence d’autres animaux</li>
                        <li>Expérience avec les chats</li>
                        <li>Préférence mâle, femelle ou ouverte</li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>

    <section class="contact-map-section" id="localisation">
        <div class="container contact-map-grid">
            <div class="map-content contact-reveal">
                <span class="contact-kicker contact-kicker-dark">Localisation</span>

                <h2>La chatterie est située en Isère.</h2>

                <p>
                    Une carte plus propre, plus lisible et plus élégante pour situer la chatterie
                    sans casser l’univers premium du site.
                </p>

                <div class="map-info-list">
                    <div>
                        <strong>Ville</strong>
                        <span>Villeneuve-de-Marc</span>
                    </div>

                    <div>
                        <strong>Région</strong>
                        <span>Auvergne-Rhône-Alpes</span>
                    </div>

                    <div>
                        <strong>Contact</strong>
                        <span>Sur rendez-vous uniquement</span>
                    </div>
                </div>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=Villeneuve-de-Marc"
                    target="_blank"
                    rel="noopener"
                    class="btn btn-dark"
                >
                    Ouvrir dans Google Maps
                </a>
            </div>

            <div class="luxury-map-card contact-reveal delay-1">
                <div class="map-frame">
                    <iframe
                        title="Carte Villeneuve-de-Marc"
                        src="https://www.google.com/maps?q=Villeneuve-de-Marc&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="map-floating-label">
                    <span>Chatterie du Diamant Sauvage</span>
                    <strong>Villeneuve-de-Marc</strong>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
