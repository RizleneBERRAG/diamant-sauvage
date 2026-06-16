@extends('layouts.admin')

@section('title', 'Administration — Mariages à venir')

@section('content')

    <section class="admin-hero">
        <div>
            <span class="admin-kicker">Tableau de bord</span>

            <h1>Mariages à venir</h1>

            <p>
                Ajoutez, modifiez ou masquez les mariages de la chatterie : parents, dates de saillie,
                arrivée estimée des chatons, statut et couleurs possibles.
            </p>
        </div>

        <a href="{{ route('chats.mariages') }}" target="_blank" class="admin-primary-btn">
            Voir la page
        </a>
    </section>

    @if($errors->any())
        <div class="admin-error-box">
            <strong>Quelques informations sont à corriger :</strong>

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
                <span class="admin-kicker">Nouveau mariage</span>
                <h2>Créer une fiche</h2>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.mariages.store') }}" enctype="multipart/form-data" class="admin-cat-form">
            @csrf

            @include('admin.mariages.partials.form', ['mating' => null])

            <button type="submit" class="admin-submit-btn">
                Ajouter le mariage
            </button>
        </form>
    </section>

    <section class="admin-panel">
        <div class="admin-panel-head">
            <div>
                <span class="admin-kicker">Liste</span>
                <h2>Mariages enregistrés</h2>
            </div>
        </div>

        <div class="admin-mating-list">
            @forelse($matings as $mating)
                <article class="admin-mating-card">
                    <div class="admin-mating-head">
                        <div>
                            <span class="admin-mating-status">
                                {{ $mating->status_label }}
                            </span>

                            <h3>
                                {{ $mating->display_title }}
                            </h3>

                            <p>
                                Issue du mariage de {{ $mating->father_name }} et {{ $mating->mother_name }}.
                            </p>
                        </div>

                        @if($mating->is_visible)
                            <span class="admin-mating-badge is-visible">Visible</span>
                        @else
                            <span class="admin-mating-badge is-hidden">Masqué</span>
                        @endif
                    </div>

                    <details class="admin-mating-edit">
                        <summary>Modifier cette fiche</summary>

                        <form method="POST" action="{{ route('admin.mariages.update', $mating) }}" enctype="multipart/form-data" class="admin-cat-form">
                            @csrf
                            @method('PUT')

                            @include('admin.mariages.partials.form', ['mating' => $mating])

                            <button type="submit" class="admin-submit-btn">
                                Enregistrer les modifications
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.mariages.destroy', $mating) }}" class="admin-delete-form">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Supprimer ce mariage ?')">
                                Supprimer ce mariage
                            </button>
                        </form>
                    </details>
                </article>
            @empty
                <div class="admin-empty">
                    <h3>Aucun mariage enregistré</h3>
                    <p>Ajoutez le premier mariage à venir de la chatterie.</p>
                </div>
            @endforelse
        </div>
    </section>

@endsection
