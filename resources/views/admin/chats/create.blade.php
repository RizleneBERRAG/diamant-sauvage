@extends('admin.layout')

@section('title', 'Ajouter un chat | Administration')

@section('content')

    <section class="admin-form-hero">
        <div>
            <span class="admin-kicker">Nouvelle fiche</span>
            <h1>Ajouter un chat</h1>
            <p>
                Remplissez les informations du Bengal, ajoutez ses photos, choisissez son statut,
                sa visibilité et les informations à afficher sur le site.
            </p>
        </div>

        <a href="{{ route('admin.chats.index') }}" class="admin-secondary-btn">
            Retour aux chats
        </a>
    </section>

    @include('admin.chats.form', [
        'cat' => $cat,
        'action' => route('admin.chats.store'),
        'method' => 'POST',
        'submitLabel' => 'Créer la fiche'
    ])

@endsection
