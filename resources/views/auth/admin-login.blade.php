<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion administration | Chatterie du Diamant Sauvage</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 28px;
            font-family: Inter, Arial, sans-serif;
            color: #17130d;
            background:
                radial-gradient(circle at 86% 8%, rgba(224, 201, 130, .18), transparent 34%),
                radial-gradient(circle at 8% 90%, rgba(151, 105, 35, .14), transparent 30%),
                linear-gradient(145deg, #17110b 0%, #070604 100%);
        }

        a,
        button,
        input {
            font: inherit;
        }

        .login-shell {
            width: min(100%, 1080px);
            display: grid;
            grid-template-columns: minmax(0, .95fr) minmax(360px, .7fr);
            overflow: hidden;
            border-radius: 38px;
            background: #fffaf1;
            border: 1px solid rgba(224, 201, 130, .26);
            box-shadow: 0 34px 100px rgba(0, 0, 0, .34);
        }

        .login-visual {
            position: relative;
            min-height: 640px;
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            color: #fff;
            background:
                linear-gradient(to top, rgba(7, 6, 4, .82), rgba(7, 6, 4, .18)),
                url('{{ asset('images/home/hero-bengal.jpg') }}') center/cover;
        }

        .login-visual::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 76% 8%, rgba(224, 201, 130, .22), transparent 32%),
                linear-gradient(90deg, rgba(7, 6, 4, .55), transparent 58%);
        }

        .login-visual > * {
            position: relative;
            z-index: 2;
        }

        .login-brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
        }

        .login-brand img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            padding: 10px;
            border-radius: 22px;
            background: rgba(255, 250, 241, .94);
            border: 1px solid rgba(224, 201, 130, .28);
        }

        .login-brand strong,
        .login-brand span {
            display: block;
        }

        .login-brand strong {
            font-size: 22px;
            line-height: 1;
        }

        .login-brand span {
            margin-top: 5px;
            color: rgba(255, 255, 255, .68);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 10px;
            font-weight: 900;
        }

        .login-visual h1 {
            max-width: 620px;
            margin: 0;
            font-size: clamp(54px, 6vw, 90px);
            line-height: .86;
            letter-spacing: -4px;
        }

        .login-visual p {
            max-width: 560px;
            margin: 18px 0 0;
            color: rgba(255, 255, 255, .72);
            font-size: 16px;
            line-height: 1.75;
        }

        .login-panel {
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #a7782d;
            text-transform: uppercase;
            letter-spacing: 2.2px;
            font-size: 10px;
            font-weight: 900;
        }

        .login-kicker::before {
            content: "";
            width: 34px;
            height: 1px;
            background: currentColor;
        }

        .login-panel h2 {
            margin: 18px 0 10px;
            font-size: clamp(38px, 4vw, 58px);
            line-height: .9;
            letter-spacing: -2.5px;
        }

        .login-panel > p {
            margin: 0 0 28px;
            color: rgba(28, 23, 15, .62);
            line-height: 1.65;
        }

        .login-alert,
        .login-errors {
            margin-bottom: 18px;
            padding: 15px 16px;
            border-radius: 18px;
            font-weight: 800;
            line-height: 1.5;
        }

        .login-alert {
            color: #223615;
            background: rgba(219, 232, 193, .92);
            border: 1px solid rgba(100, 130, 70, .18);
        }

        .login-errors {
            color: #4d1e16;
            background: rgba(255, 230, 220, .86);
            border: 1px solid rgba(150, 50, 35, .18);
        }

        .login-errors ul {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .login-form {
            display: grid;
            gap: 16px;
        }

        .login-form label {
            display: grid;
            gap: 8px;
        }

        .login-form label span,
        .remember-row span {
            color: rgba(151, 105, 35, .92);
            text-transform: uppercase;
            letter-spacing: 1.7px;
            font-size: 10px;
            font-weight: 900;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            min-height: 54px;
            padding: 0 16px;
            color: #17130d;
            background: rgba(255, 255, 255, .76);
            border: 1px solid rgba(200, 168, 90, .22);
            border-radius: 18px;
            outline: none;
            font-weight: 800;
        }

        .login-form input:focus {
            border-color: rgba(151, 105, 35, .48);
            box-shadow: 0 0 0 4px rgba(200, 168, 90, .12);
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 18px;
            background: rgba(200, 168, 90, .08);
            border: 1px solid rgba(200, 168, 90, .13);
        }

        .remember-row input {
            width: 18px;
            height: 18px;
            accent-color: #a7782d;
        }

        .login-submit {
            min-height: 56px;
            margin-top: 6px;
            border: 0;
            border-radius: 999px;
            color: #17130d;
            background: #e8d7a1;
            font-weight: 950;
            cursor: pointer;
            box-shadow: 0 16px 38px rgba(151, 105, 35, .16);
        }

        .login-back {
            width: fit-content;
            margin-top: 24px;
            color: rgba(28, 23, 15, .58);
            text-decoration: none;
            font-weight: 900;
        }

        .login-back:hover {
            color: #a7782d;
        }

        @media (max-width: 900px) {
            body {
                padding: 16px;
            }

            .login-shell {
                grid-template-columns: 1fr;
            }

            .login-visual {
                min-height: 360px;
            }

            .login-panel {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
<div class="login-shell">
    <section class="login-visual">
        <div class="login-brand">
            <img src="{{ asset('images/logo-diamant-sauvage.png') }}" alt="Chatterie du Diamant Sauvage">
            <div>
                <strong>Diamant Sauvage</strong>
                <span>Administration</span>
            </div>
        </div>

        <div>
            <h1>Accès privé.</h1>
            <p>
                Cet espace est réservé à la gestion de la chatterie : fiches chats, photos,
                mariages à venir, croquettes et contenus administrables.
            </p>
        </div>
    </section>

    <main class="login-panel">
        <span class="login-kicker">Connexion admin</span>
        <h2>Bienvenue.</h2>
        <p>Connectez-vous pour accéder au tableau de bord de la Chatterie du Diamant Sauvage.</p>

        @if(session('success'))
            <div class="login-alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="login-errors">
                <strong>Connexion impossible :</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="login-form">
            @csrf

            <label>
                <span>Email</span>
                <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
            </label>

            <label>
                <span>Mot de passe</span>
                <input type="password" name="password" autocomplete="current-password" required>
            </label>

            <label class="remember-row">
                <input type="checkbox" name="remember" value="1">
                <span>Rester connectée</span>
            </label>

            <button type="submit" class="login-submit">
                Se connecter
            </button>
        </form>

        <a href="{{ route('home') }}" class="login-back">
            ← Retour au site
        </a>
    </main>
</div>
</body>
</html>
