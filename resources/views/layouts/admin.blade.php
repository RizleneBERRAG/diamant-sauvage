<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration | Chatterie du Diamant Sauvage')</title>

    <link rel="stylesheet" href="{{ asset('css/admin/chats-admin.css') }}">

    <style>
        .admin-session-card {
            margin-top: 26px;
            padding: 16px;
            border-radius: 22px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(224, 201, 130, .18);
        }

        .admin-session-card span,
        .admin-session-card small {
            display: block;
            color: rgba(255, 255, 255, .48);
            text-transform: uppercase;
            letter-spacing: 1.6px;
            font-size: 9px;
            font-weight: 900;
        }

        .admin-session-card strong {
            display: block;
            margin-top: 6px;
            color: #fff;
            font-size: 15px;
            line-height: 1.35;
        }

        .admin-logout-form {
            margin-top: 14px;
        }

        .admin-logout-form button {
            width: 100%;
            min-height: 42px;
            border: 0;
            border-radius: 999px;
            color: #17130d;
            background: #e8d7a1;
            font-weight: 950;
            cursor: pointer;
        }
    </style>
</head>

<body class="admin-body">

<aside class="admin-sidebar">
    <a href="{{ route('admin.chats.index') }}" class="admin-brand">
        <span>DS</span>
        <strong>Diamant Sauvage</strong>
        <small>Administration</small>
    </a>

    <nav class="admin-nav">
        <a
            href="{{ route('admin.chats.index') }}"
            class="{{ request()->routeIs('admin.chats.*') || request()->routeIs('admin.cat-images.*') ? 'is-active' : '' }}"
        >
            Gestion des chats
        </a>

        <a
            href="{{ route('admin.mariages.index') }}"
            class="{{ request()->routeIs('admin.mariages.*') ? 'is-active' : '' }}"
        >
            Mariages à venir
        </a>

        <a
            href="{{ route('admin.croquettes.index') }}"
            class="{{ request()->routeIs('admin.croquettes.*') ? 'is-active' : '' }}"
        >
            Gestion des croquettes
        </a>

        <a href="{{ route('home') }}" target="_blank">
            Voir le site
        </a>
    </nav>

    <div class="admin-session-card">
        <span>Connectée</span>
        <strong>{{ auth()->user()?->name ?? 'Administrateur' }}</strong>
        <small>{{ auth()->user()?->email }}</small>

        <form method="POST" action="{{ route('admin.logout') }}" class="admin-logout-form">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    </div>
</aside>

<main class="admin-main">
    @if(session('success'))
        <div class="admin-alert">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

@yield('scripts')

</body>
</html>
