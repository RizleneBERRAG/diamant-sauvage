@extends('layouts.site')

@section('title', 'Mentions légales | Chatterie du Diamant Sauvage')
@section('description', 'Mentions légales de la Chatterie du Diamant Sauvage, élevage familial de Bengals situé à Villeneuve-de-Marc.')

@push('styles')
    <style>
        .legal-page {
            background:
                radial-gradient(circle at 12% 0%, rgba(200, 168, 90, .12), transparent 34%),
                linear-gradient(180deg, #fbf7ef 0%, #f2eadc 100%);
            color: #17130d;
        }

        .legal-hero {
            padding: 150px 0 70px;
            background:
                radial-gradient(circle at 80% 8%, rgba(224, 201, 130, .18), transparent 34%),
                linear-gradient(135deg, #17130d 0%, #070604 100%);
            color: #fff7df;
            overflow: hidden;
        }

        .legal-hero .container {
            max-width: 980px;
        }

        .legal-kicker {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #e8d7a1;
            text-transform: uppercase;
            letter-spacing: 2.4px;
            font-size: 11px;
            font-weight: 900;
        }

        .legal-kicker::before {
            content: "";
            width: 38px;
            height: 1px;
            background: currentColor;
        }

        .legal-hero h1 {
            margin: 20px 0 18px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(46px, 7vw, 90px);
            line-height: .95;
            letter-spacing: -2px;
            font-weight: 600;
        }

        .legal-hero p {
            max-width: 720px;
            margin: 0;
            color: rgba(255, 255, 255, .72);
            font-size: 17px;
            line-height: 1.8;
        }

        .legal-content {
            padding: 72px 0 100px;
        }

        .legal-grid {
            display: grid;
            grid-template-columns: minmax(250px, .38fr) minmax(0, 1fr);
            gap: 34px;
            align-items: start;
        }

        .legal-summary {
            position: sticky;
            top: 120px;
            padding: 26px;
            border-radius: 28px;
            background: rgba(255, 255, 255, .76);
            border: 1px solid rgba(200, 168, 90, .20);
            box-shadow: 0 18px 50px rgba(31, 24, 12, .06);
        }

        .legal-summary strong {
            display: block;
            margin-bottom: 14px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 24px;
            color: #17130d;
        }

        .legal-summary a {
            display: block;
            padding: 9px 0;
            color: rgba(28, 23, 15, .72);
            text-decoration: none;
            font-size: 14px;
            border-bottom: 1px solid rgba(200, 168, 90, .14);
        }

        .legal-summary a:hover {
            color: #a06f22;
        }

        .legal-sections {
            display: grid;
            gap: 18px;
        }

        .legal-card {
            padding: clamp(24px, 4vw, 38px);
            border-radius: 32px;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(200, 168, 90, .20);
            box-shadow: 0 18px 54px rgba(31, 24, 12, .055);
        }

        .legal-card h2 {
            margin: 0 0 18px;
            color: #17130d;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(28px, 3vw, 42px);
            line-height: 1.05;
            letter-spacing: -1px;
        }

        .legal-card h3 {
            margin: 26px 0 10px;
            color: #17130d;
            font-size: 19px;
        }

        .legal-card p,
        .legal-card li {
            color: rgba(28, 23, 15, .72);
            font-size: 15.5px;
            line-height: 1.75;
        }

        .legal-card p {
            margin: 0 0 14px;
        }

        .legal-card ul {
            margin: 0;
            padding-left: 18px;
        }

        .legal-info-list {
            display: grid;
            gap: 10px;
            margin: 0;
        }

        .legal-info-list div {
            display: grid;
            gap: 4px;
            padding: 14px 0;
            border-bottom: 1px solid rgba(200, 168, 90, .16);
        }

        .legal-info-list dt {
            color: #a06f22;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .legal-info-list dd {
            margin: 0;
            color: #17130d;
            font-size: 16px;
            line-height: 1.55;
        }

        .legal-note {
            margin-top: 18px;
            padding: 18px;
            border-radius: 22px;
            background: rgba(200, 168, 90, .10);
            border: 1px solid rgba(200, 168, 90, .18);
            color: rgba(28, 23, 15, .76);
        }

        @media (max-width: 900px) {
            .legal-hero {
                padding: 118px 0 56px;
            }

            .legal-grid {
                grid-template-columns: 1fr;
            }

            .legal-summary {
                position: relative;
                top: auto;
            }
        }

        @media (max-width: 560px) {
            .legal-hero .container,
            .legal-content .container {
                padding-left: 18px;
                padding-right: 18px;
            }

            .legal-hero h1 {
                font-size: clamp(38px, 12vw, 54px);
            }

            .legal-card {
                border-radius: 26px;
            }

            .legal-summary {
                border-radius: 24px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="legal-page">
        <section class="legal-hero">
            <div class="container">
                <span class="legal-kicker">Informations légales</span>

                <h1>Mentions légales</h1>

                <p>
                    Cette page présente les informations légales relatives au site de la Chatterie du Diamant Sauvage,
                    à son responsable, à son hébergement, ainsi qu’à l’utilisation des contenus et des données personnelles.
                </p>
            </div>
        </section>

        <section class="legal-content">
            <div class="container legal-grid">
                <aside class="legal-summary" aria-label="Sommaire des mentions légales">
                    <strong>Sommaire</strong>
                    <a href="#entreprise">Entreprise</a>
                    <a href="#publication">Publication du site</a>
                    <a href="#creation-hebergement">Création & hébergement</a>
                    <a href="#propriete">Propriété intellectuelle</a>
                    <a href="#donnees">Données personnelles</a>
                    <a href="#cookies">Cookies</a>
                    <a href="#droits">Vos droits</a>
                    <a href="#contact-legal">Contact</a>
                </aside>

                <div class="legal-sections">
                    <article class="legal-card" id="entreprise">
                        <h2>Entreprise</h2>

                        <dl class="legal-info-list">
                            <div>
                                <dt>Nom commercial</dt>
                                <dd>La Chatterie du Diamant Sauvage</dd>
                            </div>

                            <div>
                                <dt>SIRET</dt>
                                <dd>801 053 356 00011</dd>
                            </div>

                            <div>
                                <dt>Responsable légal</dt>
                                <dd>Jonathan Delaygue</dd>
                            </div>

                            <div>
                                <dt>Adresse</dt>
                                <dd>1855 Route du Mollard, 38440 Villeneuve-de-Marc, France</dd>
                            </div>

                            <div>
                                <dt>Téléphone</dt>
                                <dd>06 21 59 64 19</dd>
                            </div>
                        </dl>
                    </article>

                    <article class="legal-card" id="publication">
                        <h2>Publication du site</h2>

                        <p>
                            Le responsable de la publication du site est le représentant légal de
                            La Chatterie du Diamant Sauvage.
                        </p>

                        <p>
                            Les contenus publiés sur ce site ont pour objectif de présenter la chatterie,
                            ses Bengals, ses portées, ses valeurs, ses informations pratiques et ses moyens de contact.
                        </p>
                    </article>

                    <article class="legal-card" id="creation-hebergement">
                        <h2>Création et hébergement</h2>

                        <dl class="legal-info-list">
                            <div>
                                <dt>Création du site</dt>
                                <dd>Site réalisé par Rizyad.</dd>
                            </div>

                            <div>
                                <dt>Hébergeur</dt>
                                <dd>
                                    O2switch<br>
                                    Chemin des Pardiaux, 63000 Clermont-Ferrand, France<br>
                                    Site : https://www.o2switch.fr
                                </dd>
                            </div>
                        </dl>

                        <p class="legal-note">
                            Si l’hébergement final du site change, les informations de l’hébergeur devront être mises à jour.
                        </p>
                    </article>

                    <article class="legal-card" id="propriete">
                        <h2>Propriété intellectuelle</h2>

                        <p>
                            L’ensemble des éléments présents sur le site, notamment les textes, photographies,
                            illustrations, logos, graphismes, éléments visuels, animations, structure et design,
                            est protégé par le droit de la propriété intellectuelle.
                        </p>

                        <p>
                            Sauf autorisation préalable, toute reproduction, représentation, modification,
                            diffusion ou exploitation totale ou partielle des contenus du site est interdite.
                        </p>

                        <p>
                            Les photographies des chats, des chatons, des installations et de la chatterie sont
                            utilisées pour présenter l’activité de La Chatterie du Diamant Sauvage. Toute utilisation
                            non autorisée est interdite.
                        </p>
                    </article>

                    <article class="legal-card" id="donnees">
                        <h2>Données personnelles</h2>

                        <p>
                            Les informations transmises via les formulaires du site sont utilisées uniquement pour
                            répondre aux demandes des visiteurs : demande d’information, demande d’adoption,
                            prise de contact ou échange avec la chatterie.
                        </p>

                        <p>
                            Les données pouvant être collectées sont notamment : nom, prénom, adresse e-mail,
                            numéro de téléphone et contenu du message envoyé.
                        </p>

                        <p>
                            Ces données ne sont pas revendues, louées ou transmises à des tiers à des fins commerciales.
                            Elles sont conservées uniquement le temps nécessaire au traitement de la demande et au suivi
                            de la relation avec la personne concernée.
                        </p>
                    </article>

                    <article class="legal-card" id="cookies">
                        <h2>Cookies</h2>

                        <p>
                            Le site peut utiliser des cookies nécessaires à son bon fonctionnement technique.
                            Si des cookies de mesure d’audience, de suivi ou de services tiers sont ajoutés,
                            l’utilisateur devra être informé et, lorsque cela est nécessaire, donner son consentement.
                        </p>

                        <p>
                            Le consentement aux cookies ne doit pas être présumé : la simple poursuite de la navigation
                            ne vaut pas consentement pour les cookies soumis à autorisation.
                        </p>
                    </article>

                    <article class="legal-card" id="droits">
                        <h2>Vos droits</h2>

                        <p>
                            Conformément à la réglementation applicable en matière de protection des données personnelles,
                            chaque utilisateur dispose d’un droit d’accès, de rectification, d’opposition, d’effacement
                            et de limitation du traitement de ses données.
                        </p>

                        <p>
                            Pour exercer ces droits, l’utilisateur peut contacter La Chatterie du Diamant Sauvage
                            par téléphone, par courrier postal ou via le formulaire de contact du site.
                        </p>

                        <p>
                            En cas de difficulté, l’utilisateur peut également introduire une réclamation auprès de la CNIL.
                        </p>
                    </article>

                    <article class="legal-card" id="contact-legal">
                        <h2>Contact</h2>

                        <p>
                            Pour toute question concernant le site, les contenus publiés, les données personnelles
                            ou les présentes mentions légales, vous pouvez contacter :
                        </p>

                        <dl class="legal-info-list">
                            <div>
                                <dt>La Chatterie du Diamant Sauvage</dt>
                                <dd>1855 Route du Mollard, 38440 Villeneuve-de-Marc</dd>
                            </div>

                            <div>
                                <dt>Téléphone</dt>
                                <dd>06 21 59 64 19</dd>
                            </div>
                        </dl>
                    </article>
                </div>
            </div>
        </section>
    </div>

@endsection
