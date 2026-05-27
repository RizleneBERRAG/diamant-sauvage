@extends('admin.layout')

@section('title', 'Modifier ' . $cat->display_name . ' | Administration')

@section('content')

    <section class="admin-form-hero">
        <div>
            <span class="admin-kicker">Modification</span>
            <h1>Modifier la fiche</h1>
            <p>
                Gérez les informations, les photos, le prix, le statut et la visibilité de
                {{ $cat->display_name }}.
            </p>
        </div>

        <a href="{{ route('admin.chats.index') }}" class="admin-secondary-btn">
            Retour aux chats
        </a>
    </section>

    @include('admin.chats.form', [
        'cat' => $cat,
        'action' => route('admin.chats.update', $cat),
        'method' => 'PUT',
        'submitLabel' => 'Enregistrer les modifications'
    ])

@endsection
