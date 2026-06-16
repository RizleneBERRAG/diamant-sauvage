@extends('admin.layout')

@section('title', 'Gestion des chats | Administration')

@section('content')

    @php
        $total = $cats->count();
        $visible = $cats->where('visibility', 'visible')->count();
        $hidden = $cats->where('visibility', 'hidden')->count();
        $featured = $cats->where('featured', true)->count();

        $placeholderImages = [
            'images/home/kitten-12.jpg',
            'images/home/gallery-11.jpg',
            'images/home/kitten-13.jpg',
            'images/home/gallery-12.jpg',
        ];

        $statusClasses = [
            'available' => 'is-available',
            'reserved' => 'is-reserved',
            'adoption_pending' => 'is-pending',
            'not_available' => 'is-not-available',
            'to_define' => 'is-to-define',
        ];
    @endphp

    <section class="admin-hero">
        <div>
            <span class="admin-kicker">Tableau de bord</span>

            <h1>Gestion des chats</h1>

            <p>
                Ajoutez, modifiez et organisez les fiches Bengal visibles sur le site :
                photos, statut, prix, informations LOOF, santé, disponibilité et cadrage des visuels.
            </p>
        </div>

        <a href="{{ route('admin.chats.create') }}" class="admin-primary-btn">
            Ajouter un chat
        </a>
    </section>

    <section class="admin-stats">
        <article>
            <span>Total</span>
            <strong>{{ $total }}</strong>
            <small>fiches enregistrées</small>
        </article>

        <article>
            <span>Visibles</span>
            <strong>{{ $visible }}</strong>
            <small>affichées sur le site</small>
        </article>

        <article>
            <span>Masquées</span>
            <strong>{{ $hidden }}</strong>
            <small>brouillons ou archives</small>
        </article>

        <article>
            <span>Mises en avant</span>
            <strong>{{ $featured }}</strong>
            <small>profils prioritaires</small>
        </article>
    </section>

    <section class="admin-panel">
        <div class="admin-panel-head">
            <div>
                <span class="admin-kicker">Fiches Bengal</span>
                <h2>Vos chats enregistrés</h2>
            </div>

            <div class="admin-search">
                <input type="search" id="catSearch" placeholder="Rechercher un chat...">
            </div>
        </div>

        <div class="admin-cat-grid" id="catAdminGrid">
            @forelse($cats as $cat)
                @php
                    $mainImageModel = $cat->mainImage ?: $cat->images->first();

                    $mainImage = $mainImageModel
                        ? asset('storage/' . $mainImageModel->path)
                        : asset($placeholderImages[$loop->index % count($placeholderImages)]);

                    $positionX = $mainImageModel->position_x ?? 50;
                    $positionY = $mainImageModel->position_y ?? 50;
                    $zoom = $mainImageModel->zoom ?? 1;

                    $statusClass = $statusClasses[$cat->availability] ?? 'is-to-define';

                    $searchText = \Illuminate\Support\Str::lower(trim(
                        $cat->name . ' ' .
                        $cat->short_name . ' ' .
                        $cat->coat . ' ' .
                        $cat->sex . ' ' .
                        $cat->availability_text
                    ));
                @endphp

                <article
                    class="admin-cat-card"
                    data-cat-card
                    data-search="{{ $searchText }}"
                >
                    <figure>
                        <img
                            src="{{ $mainImage }}"
                            alt="{{ $cat->name }}"
                            style="
                            object-position: {{ $positionX }}% {{ $positionY }}%;
                            transform: scale({{ $zoom }});
                        "
                        >

                        <span class="admin-status {{ $statusClass }}">
                        {{ $cat->availability_text }}
                    </span>
                    </figure>

                    <div class="admin-cat-content">
                        <div class="admin-cat-title">
                            <div>
                                <h3>{{ $cat->display_name }}</h3>
                                <p>{{ $cat->name }}</p>
                            </div>

                            <span class="admin-sex">
                            {{ $cat->sex ?: 'Sexe à compléter' }}
                        </span>
                        </div>

                        <div class="admin-cat-meta">
                            <div>
                                <small>Naissance</small>
                                <strong>{{ $cat->birth_label }}</strong>
                            </div>

                            <div>
                                <small>Âge</small>
                                <strong>{{ $cat->age_label }}</strong>
                            </div>

                            <div>
                                <small>Robe</small>
                                <strong>{{ $cat->coat ?: 'À compléter' }}</strong>
                            </div>

                            <div>
                                <small>Prix</small>
                                <strong>{{ $cat->price_text ?: 'Non affiché' }}</strong>
                            </div>
                        </div>

                        <div class="admin-cat-flags">
                        <span class="{{ $cat->visibility === 'visible' ? 'is-visible' : 'is-hidden' }}">
                            {{ $cat->visibility === 'visible' ? 'Visible' : 'Masqué' }}
                        </span>

                            @if($cat->featured)
                                <span class="is-featured">Mise en avant</span>
                            @endif

                            <span>{{ $cat->images->count() }} photo(s)</span>
                        </div>

                        <div class="admin-cat-actions">
                            <a href="{{ route('admin.chats.edit', $cat) }}">
                                Modifier
                            </a>

                            <form action="{{ route('admin.chats.destroy', $cat) }}" method="POST" onsubmit="return confirm('Supprimer cette fiche ?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="admin-empty">
                    <h3>Aucun chat enregistré</h3>
                    <p>Commencez par ajouter une première fiche Bengal.</p>

                    <a href="{{ route('admin.chats.create') }}">
                        Ajouter un chat
                    </a>
                </div>
            @endforelse
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const search = document.getElementById('catSearch');
            const cards = document.querySelectorAll('[data-cat-card]');

            function normalizeText(value) {
                return value
                    .toLowerCase()
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .trim();
            }

            if (!search) return;

            search.addEventListener('input', function () {
                const value = normalizeText(search.value);

                cards.forEach((card) => {
                    const content = normalizeText(card.dataset.search || '');
                    card.classList.toggle('is-filtered', !content.includes(value));
                });
            });
        });
    </script>
@endsection
