@extends('layouts.admin')

@section('title', 'Administration — Croquettes')

@section('content')

    <section class="admin-hero">
        <div>
            <span class="admin-kicker">Tableau de bord</span>

            <h1>Gestion des croquettes</h1>

            <p>
                Modifiez le titre de la section, sa description et les gammes affichées sur la page
                Besoins & alimentation.
            </p>
        </div>

        <a href="{{ route('bengal.besoins') }}" target="_blank" class="admin-primary-btn">
            Voir la page
        </a>
    </section>

    @if($errors->any())
        <div class="admin-error-box">
            <strong>Il y a une erreur :</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="admin-panel">
        <div class="admin-panel-head">
            <div>
                <span class="admin-kicker">Section publique</span>
                <h2>Titre de la section</h2>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.croquettes.section.update') }}" class="admin-cat-form">
            @csrf
            @method('PUT')

            <div class="admin-form-card">
                <div class="admin-fields-grid">
                    <label>
                        <span>Petit label</span>
                        <input
                            type="text"
                            name="label"
                            value="{{ old('label', $section->label) }}"
                        >
                    </label>

                    <label>
                        <span>Titre</span>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $section->title) }}"
                            required
                        >
                    </label>
                </div>

                <label class="admin-full-field">
                    <span>Description</span>
                    <textarea name="description" rows="4">{{ old('description', $section->description) }}</textarea>
                </label>

                <button type="submit" class="admin-submit-btn">
                    Enregistrer la section
                </button>
            </div>
        </form>
    </section>

    <section class="admin-panel">
        <div class="admin-panel-head">
            <div>
                <span class="admin-kicker">Nouvelle gamme</span>
                <h2>Ajouter une gamme</h2>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.croquettes.store') }}" enctype="multipart/form-data" class="admin-cat-form">
            @csrf

            <div class="admin-form-card">
                @include('admin.croquettes.partials.form', ['croquette' => null])

                <button type="submit" class="admin-submit-btn">
                    Ajouter la gamme
                </button>
            </div>
        </form>
    </section>

    <section class="admin-panel">
        <div class="admin-panel-head">
            <div>
                <span class="admin-kicker">Gammes enregistrées</span>
                <h2>Vos croquettes</h2>
            </div>
        </div>

        <div class="admin-croquettes-list">
            @forelse($croquettes as $croquette)
                <article class="admin-croquette-card">
                    <div class="admin-croquette-head">
                        <div>
                            <span class="admin-croquette-tag">
                                {{ $croquette->tag ?: 'Gamme' }}
                            </span>

                            <h3>{{ $croquette->title }}</h3>

                            @if($croquette->description)
                                <p>{{ $croquette->description }}</p>
                            @endif
                        </div>

                        <div class="admin-croquette-status">
                            @if($croquette->is_active)
                                <span class="is-visible">Affichée</span>
                            @else
                                <span class="is-hidden">Masquée</span>
                            @endif

                            @if($croquette->is_featured)
                                <span class="is-featured">Mise en avant</span>
                            @endif
                        </div>
                    </div>

                    @if($croquette->image)
                        <figure class="admin-croquette-preview">
                            <img
                                src="{{ asset('storage/' . $croquette->image) }}"
                                alt="{{ $croquette->image_alt ?: $croquette->title }}"
                            >
                        </figure>
                    @endif

                    <form method="POST" action="{{ route('admin.croquettes.update', $croquette) }}" enctype="multipart/form-data" class="admin-cat-form">
                        @csrf
                        @method('PUT')

                        <div class="admin-form-card">
                            @include('admin.croquettes.partials.form', ['croquette' => $croquette])

                            <button type="submit" class="admin-submit-btn">
                                Modifier cette gamme
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('admin.croquettes.destroy', $croquette) }}" class="admin-delete-form">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Supprimer cette gamme ?')">
                            Supprimer cette gamme
                        </button>
                    </form>
                </article>
            @empty
                <div class="admin-empty">
                    <h3>Aucune gamme enregistrée</h3>
                    <p>Ajoutez une première gamme pour l’afficher sur la page Besoins & alimentation.</p>
                </div>
            @endforelse
        </div>
    </section>

@endsection
