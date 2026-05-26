@extends('layouts.site')

@section('title', 'Santé du Bengal | Chatterie du Diamant Sauvage')
@section('description', 'Informations santé du Bengal : suivi vétérinaire, prévention, transit sensible, FIV, FeLV, PK-Def, PRA-b, HCM et PKD.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bengal/sante.css') }}">
@endpush

@section('content')

    <section class="health-hero">
        <div class="container health-hero-grid">
            <div class="health-hero-content">
                <span class="health-eyebrow">Santé du Bengal</span>

                <h1>
                    Prévenir,
                    <span>surveiller, protéger.</span>
                </h1>

                <p>
                    La santé du Bengal repose sur une sélection sérieuse, un suivi vétérinaire régulier,
                    une prévention adaptée et une attention particulière à son transit, son confort
                    et ses tests génétiques.
                </p>

                <div class="health-hero-actions">
                    <a href="#health-dossier" class="btn btn-gold">Ouvrir le dossier santé</a>
                    <a href="#maladies" class="btn btn-glass">Voir les points de vigilance</a>
                </div>
            </div>

            <div class="health-hero-stage">
                <figure class="health-hero-photo">
                    <img src="{{ asset('images/le-bengal/sante/cat-detail-1.jpg') }}" alt="Bengal en suivi santé">
                </figure>

                <div class="health-scan-card">
                    <span>Carnet santé</span>
                    <strong>Bengal LOOF suivi avec attention</strong>
                    <p>Vaccins · prévention · tests ADN · observation</p>
                </div>

                <div class="health-floating-status">
                    <span>Statut</span>
                    <strong>Prévention responsable</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="health-console" id="health-dossier">
        <div class="container">
            <div class="health-dashboard">
                <div class="health-dashboard-intro">
                    <span class="health-label">Dossier santé interactif</span>

                    <h2>Un carnet santé clair, suivi avec attention.</h2>

                    <p>
                        Sélectionnez un point de suivi pour comprendre ce qui compte vraiment :
                        visite vétérinaire, transit sensible, antiparasitaires et tests ADN.
                    </p>

                    <div class="health-dashboard-menu">
                        <button type="button" class="is-active" data-health-dash="veto">
                            Vétérinaire
                        </button>

                        <button type="button" data-health-dash="transit">
                            Transit sensible
                        </button>

                        <button type="button" data-health-dash="prevention">
                            Prévention
                        </button>

                        <button type="button" data-health-dash="adn">
                            Tests ADN
                        </button>
                    </div>
                </div>

                <article class="health-medical-screen">
                    <div class="health-medical-top">
                        <span id="healthDashKicker">Suivi 01</span>
                        <small>Carnet Bengal LOOF</small>
                    </div>

                    <h3 id="healthDashTitle">Visite annuelle</h3>

                    <p id="healthDashText">
                        Une visite annuelle chez le vétérinaire est nécessaire pour le rappel des vaccins
                        et le contrôle général de la bonne santé du chat.
                    </p>

                    <div class="health-medical-focus">
                        <span id="healthDashFocusTitle">À surveiller</span>
                        <strong id="healthDashFocusText">
                            Poids, appétit, transit, comportement et état général.
                        </strong>
                    </div>

                    <div class="health-medical-bottom">
                        <div>
                            <span>Rythme</span>
                            <strong id="healthDashRhythm">Annuel</strong>
                        </div>

                        <div>
                            <span>Niveau</span>
                            <strong id="healthDashLevel">Essentiel</strong>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="health-vigilance" id="maladies">
        <div class="container">
            <div class="health-section-head">
                <span class="health-label">Points de vigilance</span>

                <h2>Les maladies à connaître chez le Bengal.</h2>

                <p>
                    Cette partie permet de comprendre les grands sujets santé de la race :
                    virus félins, maladies génétiques et suivi cardiaque ou rénal.
                </p>
            </div>

            <div class="health-disease-layout">
                <div class="health-disease-list">
                    <button type="button" class="health-disease-card is-active" data-disease="fiv">
                        <span>01</span>
                        <strong>FIV / FeLV</strong>
                        <small>Virus félins et prévention</small>
                    </button>

                    <button type="button" class="health-disease-card" data-disease="pkdef">
                        <span>02</span>
                        <strong>PK-Def</strong>
                        <small>Maladie héréditaire</small>
                    </button>

                    <button type="button" class="health-disease-card" data-disease="pra">
                        <span>03</span>
                        <strong>PRA-b</strong>
                        <small>Vision et dépistage ADN</small>
                    </button>

                    <button type="button" class="health-disease-card" data-disease="hcm">
                        <span>04</span>
                        <strong>HCM / PKD</strong>
                        <small>Cœur, reins et échographies</small>
                    </button>
                </div>

                <article class="health-disease-screen">
                    <div class="health-screen-top">
                        <span id="diseaseKicker">Virus félins</span>
                        <strong id="diseaseTitle">FIV / FeLV</strong>
                    </div>

                    <p id="diseaseText">
                        Le FIV se transmet principalement par morsure et peut rester en sommeil pendant des années.
                        Le FeLV se transmet par les sécrétions comme la salive, l’urine, les matières fécales,
                        l’allaitement ou la gestation.
                    </p>

                    <div class="health-screen-warning">
                        <span id="diseaseWarningTitle">Prévention</span>
                        <p id="diseaseWarningText">
                            Pour le FeLV, vaccination, dépistage et prévention sont les meilleures protections.
                            Pour le FIV, il n’existe pas de vaccin : la prévention reste essentielle.
                        </p>
                    </div>

                    <div class="health-screen-tags" id="diseaseTags">
                        <small>Dépistage</small>
                        <small>Prévention</small>
                        <small>Vaccination FeLV</small>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="health-adn-experience">
        <div class="container health-adn-grid">
            <div class="health-adn-visual">
                <span class="health-label">Tests ADN</span>

                <h2>
                    Lire un test ADN,
                    <span>protéger la lignée.</span>
                </h2>

                <p>
                    Les tests génétiques permettent d’identifier les chats indemnes, porteurs sains
                    ou atteints, afin d’éviter les mariages à risque et préserver la santé des futures portées.
                </p>

                <div class="health-adn-bars" aria-hidden="true">
                    <i></i><i></i><i></i><i></i><i></i><i></i>
                </div>
            </div>

            <div class="health-adn-panel">
                <div class="health-adn-tabs">
                    <button type="button" class="is-active" data-adn-choice="clear">N/N</button>
                    <button type="button" data-adn-choice="carrier">Porteur sain</button>
                    <button type="button" data-adn-choice="affected">Atteint</button>
                </div>

                <article class="health-adn-result">
                    <span id="healthAdnCode">N/N</span>
                    <h3 id="healthAdnTitle">Indemne</h3>
                    <p id="healthAdnText">
                        Le chat n’est pas atteint et n’est pas porteur de la mutation.
                    </p>

                    <div class="health-adn-note">
                        <small>Lecture</small>
                        <strong id="healthAdnAdvice">
                            Résultat rassurant pour la sélection et la transmission.
                        </strong>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="health-followup">
        <div class="container">
            <div class="health-followup-head">
                <span class="health-label">Suivi au quotidien</span>

                <h2>Une routine santé discrète, mais essentielle.</h2>

                <p>
                    La prévention ne doit pas ressembler à une liste froide. Elle se construit avec
                    des réflexes simples, réguliers et adaptés au rythme de vie du Bengal.
                </p>
            </div>

            <div class="health-followup-board">
                <div class="health-followup-screen">
                    <span id="healthFollowKicker">Suivi 01</span>
                    <h3 id="healthFollowTitle">Visite vétérinaire</h3>
                    <p id="healthFollowText">
                        Une visite annuelle permet de contrôler l’état général, le poids,
                        les vaccins et les changements éventuels de comportement.
                    </p>

                    <div class="health-followup-meta">
                        <div>
                            <small>Rythme</small>
                            <strong id="healthFollowRhythm">Annuel</strong>
                        </div>

                        <div>
                            <small>Priorité</small>
                            <strong id="healthFollowLevel">Essentielle</strong>
                        </div>
                    </div>
                </div>

                <div class="health-followup-nav">
                    <button type="button" class="is-active" data-followup="veto">
                        <span>01</span>
                        <strong>Visite vétérinaire</strong>
                    </button>

                    <button type="button" data-followup="vaccins">
                        <span>02</span>
                        <strong>Vaccins</strong>
                    </button>

                    <button type="button" data-followup="parasites">
                        <span>03</span>
                        <strong>Antiparasitaires</strong>
                    </button>

                    <button type="button" data-followup="transit">
                        <span>04</span>
                        <strong>Transit</strong>
                    </button>

                    <button type="button" data-followup="observation">
                        <span>05</span>
                        <strong>Observation</strong>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="health-transit">
        <div class="container health-transit-card">
            <figure>
                <img src="{{ asset('images/le-bengal/sante/gallery-13.jpg') }}" alt="Bengal calme et observé">
            </figure>

            <div>
                <span class="health-label">Transit sensible</span>

                <h2>Le stress peut perturber son équilibre digestif.</h2>

                <p>
                    Le Bengal peut être sensible du transit. Le stress, les changements alimentaires ou d’autres critères
                    peuvent perturber sa flore intestinale. Des probiotiques ou des combinés adaptés peuvent être proposés
                    avec l’avis du vétérinaire.
                </p>

                <div class="health-transit-tips">
                    <span>Transitions lentes</span>
                    <span>Observation</span>
                    <span>Conseil vétérinaire</span>
                    <span>Stabilité alimentaire</span>
                </div>
            </div>
        </div>
    </section>

    <section class="health-final">
        <div class="container health-final-card">
            <div>
                <span class="health-label">Engagement santé</span>

                <h2>Des chats sélectionnés avec soin pour leur santé, leur beauté et leur caractère.</h2>

                <p>
                    La Chatterie du Diamant Sauvage accorde une attention particulière au suivi,
                    aux tests, à la prévention et au bien-être général de ses Bengals.
                </p>

                <div class="health-final-actions">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Poser une question</a>
                    <a href="{{ route('chats.disponibles') }}" class="btn btn-outline-light">Voir les chatons</a>
                </div>
            </div>

            <figure>
                <img src="{{ asset('images/le-bengal/sante/kitten-8.jpg') }}" alt="Chaton Bengal en bonne santé">
            </figure>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dashData = {
                veto: {
                    kicker: "Suivi 01",
                    title: "Visite annuelle",
                    text: "Une visite annuelle chez le vétérinaire est nécessaire pour le rappel des vaccins et le contrôle général de la bonne santé du chat.",
                    focusTitle: "À surveiller",
                    focusText: "Poids, appétit, transit, comportement et état général.",
                    rhythm: "Annuel",
                    level: "Essentiel"
                },
                transit: {
                    kicker: "Suivi 02",
                    title: "Transit sensible",
                    text: "Le Bengal peut être sensible du transit. Le stress, les changements alimentaires ou certaines situations peuvent perturber sa flore intestinale.",
                    focusTitle: "Réflexe",
                    focusText: "Observer les selles, l’appétit et éviter les transitions brutales.",
                    rhythm: "Régulier",
                    level: "Important"
                },
                prevention: {
                    kicker: "Suivi 03",
                    title: "Protection anti-parasites",
                    text: "Un traitement interne et externe peut être proposé par le vétérinaire selon l’âge, le mode de vie et les besoins du chat.",
                    focusTitle: "À adapter",
                    focusText: "Le type de traitement et la fréquence doivent être définis avec le vétérinaire.",
                    rhythm: "Adapté",
                    level: "Préventif"
                },
                adn: {
                    kicker: "Suivi 04",
                    title: "Tests ADN",
                    text: "Les tests génétiques permettent d’identifier les chats indemnes, porteurs sains ou atteints avant toute reproduction.",
                    focusTitle: "Sélection",
                    focusText: "Éviter les mariages à risque et protéger les futures portées.",
                    rhythm: "Une fois",
                    level: "Lignée"
                }
            };

            const dashButtons = document.querySelectorAll('[data-health-dash]');
            const dashKicker = document.getElementById('healthDashKicker');
            const dashTitle = document.getElementById('healthDashTitle');
            const dashText = document.getElementById('healthDashText');
            const dashFocusTitle = document.getElementById('healthDashFocusTitle');
            const dashFocusText = document.getElementById('healthDashFocusText');
            const dashRhythm = document.getElementById('healthDashRhythm');
            const dashLevel = document.getElementById('healthDashLevel');

            dashButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const item = dashData[button.dataset.healthDash];

                    if (!item) return;

                    dashButtons.forEach(btn => btn.classList.remove('is-active'));
                    button.classList.add('is-active');

                    dashKicker.textContent = item.kicker;
                    dashTitle.textContent = item.title;
                    dashText.textContent = item.text;
                    dashFocusTitle.textContent = item.focusTitle;
                    dashFocusText.textContent = item.focusText;
                    dashRhythm.textContent = item.rhythm;
                    dashLevel.textContent = item.level;
                });
            });

            const diseaseData = {
                fiv: {
                    kicker: "Virus félins",
                    title: "FIV / FeLV",
                    text: "Le FIV se transmet principalement par morsure et peut rester en sommeil pendant des années. Le FeLV se transmet par les sécrétions comme la salive, l’urine, les matières fécales, l’allaitement ou la gestation.",
                    warningTitle: "Prévention",
                    warningText: "Pour le FeLV, vaccination, dépistage et prévention sont les meilleures protections. Pour le FIV, il n’existe pas de vaccin : la prévention reste essentielle.",
                    tags: ["Dépistage", "Prévention", "Vaccination FeLV"]
                },
                pkdef: {
                    kicker: "Maladie héréditaire",
                    title: "PK-Def",
                    text: "La carence en pyruvate kinase provoque une destruction précoce des globules rouges, pouvant mener à une anémie plus ou moins grave selon les chats.",
                    warningTitle: "Test ADN",
                    warningText: "Chaque reproducteur doit être testé une fois dans sa vie afin d’éviter les mariages à risque.",
                    tags: ["N/N indemne", "N/K porteur sain", "K/K atteint"]
                },
                pra: {
                    kicker: "Vision",
                    title: "PRA-b",
                    text: "La PRA-b est une dégénérescence progressive des photorécepteurs rétiniens, avec une perte de vision nocturne puis diurne pouvant aller jusqu’à la cécité.",
                    warningTitle: "Sélection",
                    warningText: "Le test ADN permet d’identifier les chats indemnes, porteurs sains ou atteints avant reproduction.",
                    tags: ["N/N indemne", "N/PRA porteur", "PRA/PRA atteint"]
                },
                hcm: {
                    kicker: "Cardiaque & rénal",
                    title: "HCM / PKD",
                    text: "La cardiomyopathie hypertrophique est une maladie du muscle cardiaque. La PKD correspond au développement de kystes, notamment sur les reins et le foie.",
                    warningTitle: "Suivi régulier",
                    warningText: "Ces problèmes pouvant évoluer, des échographies régulières permettent un meilleur suivi.",
                    tags: ["Échographie", "Cœur", "Reins"]
                }
            };

            const diseaseButtons = document.querySelectorAll('.health-disease-card');
            const diseaseKicker = document.getElementById('diseaseKicker');
            const diseaseTitle = document.getElementById('diseaseTitle');
            const diseaseText = document.getElementById('diseaseText');
            const diseaseWarningTitle = document.getElementById('diseaseWarningTitle');
            const diseaseWarningText = document.getElementById('diseaseWarningText');
            const diseaseTags = document.getElementById('diseaseTags');

            diseaseButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const item = diseaseData[button.dataset.disease];

                    if (!item) return;

                    diseaseButtons.forEach(btn => btn.classList.remove('is-active'));
                    button.classList.add('is-active');

                    diseaseKicker.textContent = item.kicker;
                    diseaseTitle.textContent = item.title;
                    diseaseText.textContent = item.text;
                    diseaseWarningTitle.textContent = item.warningTitle;
                    diseaseWarningText.textContent = item.warningText;

                    diseaseTags.innerHTML = '';

                    item.tags.forEach((tag) => {
                        const small = document.createElement('small');
                        small.textContent = tag;
                        diseaseTags.appendChild(small);
                    });
                });
            });

            const labData = {
                clear: {
                    code: "N/N",
                    title: "Indemne",
                    text: "Le chat n’est pas atteint et n’est pas porteur de la mutation."
                },
                carrier: {
                    code: "N/K ou N/PRA",
                    title: "Porteur sain",
                    text: "Le chat n’est pas malade, mais il peut transmettre statistiquement la mutation à une partie de ses descendants."
                },
                affected: {
                    code: "K/K ou PRA/PRA",
                    title: "Atteint",
                    text: "Le chat est concerné par la maladie génétique et ne doit pas être intégré dans un mariage à risque."
                }
            };

            const labButtons = document.querySelectorAll('[data-genotype]');
            const labCode = document.getElementById('healthLabCode');
            const labTitle = document.getElementById('healthLabTitle');
            const labText = document.getElementById('healthLabText');

            labButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const item = labData[button.dataset.genotype];

                    if (!item) return;

                    labButtons.forEach(btn => btn.classList.remove('is-active'));
                    button.classList.add('is-active');

                    labCode.textContent = item.code;
                    labTitle.textContent = item.title;
                    labText.textContent = item.text;
                });
            });

            const routineData = {
                veto: {
                    kicker: "Routine 01",
                    title: "Visite vétérinaire",
                    text: "Une visite annuelle permet de contrôler l’état général, les vaccins, le poids et les éventuels changements de comportement."
                },
                vaccins: {
                    kicker: "Routine 02",
                    title: "Vaccins",
                    text: "Les rappels de vaccins permettent de maintenir une protection adaptée au chat et à son mode de vie."
                },
                parasites: {
                    kicker: "Routine 03",
                    title: "Protection anti-parasites",
                    text: "La prévention interne et externe doit être choisie avec le vétérinaire selon le profil du chat."
                },
                transit: {
                    kicker: "Routine 04",
                    title: "Transit sensible",
                    text: "Le transit du Bengal peut réagir au stress ou aux changements. L’observation régulière est essentielle."
                },
                observation: {
                    kicker: "Routine 05",
                    title: "Observation quotidienne",
                    text: "Un changement d’appétit, de comportement, d’énergie ou de propreté peut être un signal à surveiller."
                }
            };

            const routineButtons = document.querySelectorAll('[data-routine]');
            const routineKicker = document.getElementById('healthRoutineKicker');
            const routineTitle = document.getElementById('healthRoutineTitle');
            const routineText = document.getElementById('healthRoutineText');

            routineButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const item = routineData[button.dataset.routine];

                    if (!item) return;

                    routineButtons.forEach(btn => btn.classList.remove('is-active'));
                    button.classList.add('is-active');

                    routineKicker.textContent = item.kicker;
                    routineTitle.textContent = item.title;
                    routineText.textContent = item.text;
                });
            });

            const adnData = {
                clear: {
                    code: "N/N",
                    title: "Indemne",
                    text: "Le chat n’est pas atteint et n’est pas porteur de la mutation.",
                    advice: "Résultat rassurant pour la sélection et la transmission."
                },
                carrier: {
                    code: "N/K ou N/PRA",
                    title: "Porteur sain",
                    text: "Le chat n’est pas malade, mais il peut transmettre la mutation à une partie de ses descendants.",
                    advice: "Mariage possible uniquement avec un chat indemne."
                },
                affected: {
                    code: "K/K ou PRA/PRA",
                    title: "Atteint",
                    text: "Le chat est concerné par la maladie génétique.",
                    advice: "Résultat à prendre en compte avec sérieux dans la sélection."
                }
            };

            const adnButtons = document.querySelectorAll('[data-adn-choice]');
            const adnCode = document.getElementById('healthAdnCode');
            const adnTitle = document.getElementById('healthAdnTitle');
            const adnText = document.getElementById('healthAdnText');
            const adnAdvice = document.getElementById('healthAdnAdvice');

            adnButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const item = adnData[button.dataset.adnChoice];
                    if (!item) return;

                    adnButtons.forEach(btn => btn.classList.remove('is-active'));
                    button.classList.add('is-active');

                    adnCode.textContent = item.code;
                    adnTitle.textContent = item.title;
                    adnText.textContent = item.text;
                    adnAdvice.textContent = item.advice;
                });
            });

            const followupData = {
                veto: {
                    kicker: "Suivi 01",
                    title: "Visite vétérinaire",
                    text: "Une visite annuelle permet de contrôler l’état général, le poids, les vaccins et les changements éventuels de comportement.",
                    rhythm: "Annuel",
                    level: "Essentielle"
                },
                vaccins: {
                    kicker: "Suivi 02",
                    title: "Vaccins",
                    text: "Les rappels permettent de maintenir une protection adaptée selon l’âge, le mode de vie et les conseils du vétérinaire.",
                    rhythm: "À jour",
                    level: "Préventive"
                },
                parasites: {
                    kicker: "Suivi 03",
                    title: "Antiparasitaires",
                    text: "Les traitements internes et externes doivent être adaptés au chat, à son environnement et à son rythme de vie.",
                    rhythm: "Adapté",
                    level: "Régulière"
                },
                transit: {
                    kicker: "Suivi 04",
                    title: "Transit sensible",
                    text: "Le Bengal peut réagir au stress ou aux changements alimentaires. Une observation régulière aide à repérer les déséquilibres.",
                    rhythm: "Souvent",
                    level: "Importante"
                },
                observation: {
                    kicker: "Suivi 05",
                    title: "Observation quotidienne",
                    text: "Un changement d’appétit, d’énergie, de propreté ou de comportement peut être un signal à surveiller.",
                    rhythm: "Chaque jour",
                    level: "Discrète"
                }
            };

            const followupButtons = document.querySelectorAll('[data-followup]');
            const followKicker = document.getElementById('healthFollowKicker');
            const followTitle = document.getElementById('healthFollowTitle');
            const followText = document.getElementById('healthFollowText');
            const followRhythm = document.getElementById('healthFollowRhythm');
            const followLevel = document.getElementById('healthFollowLevel');

            followupButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const item = followupData[button.dataset.followup];
                    if (!item) return;

                    followupButtons.forEach(btn => btn.classList.remove('is-active'));
                    button.classList.add('is-active');

                    followKicker.textContent = item.kicker;
                    followTitle.textContent = item.title;
                    followText.textContent = item.text;
                    followRhythm.textContent = item.rhythm;
                    followLevel.textContent = item.level;
                });
            });
        });
    </script>

@endsection
