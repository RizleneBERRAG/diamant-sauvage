<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration | Chatterie du Diamant Sauvage')</title>

    <link rel="stylesheet" href="{{ asset('css/admin/chats-admin.css') }}">
</head>
<body class="admin-body">

<aside class="admin-sidebar">
    <a href="{{ route('admin.chats.index') }}" class="admin-brand">
        <span>DS</span>
        <strong>Diamant Sauvage</strong>
        <small>Administration</small>
    </a>

    <nav class="admin-nav">
        <a href="{{ route('admin.chats.index') }}" class="is-active">Gestion des chats</a>
        <a href="{{ route('home') }}" target="_blank">Voir le site</a>
    </nav>
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
