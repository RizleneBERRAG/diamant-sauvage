@php
    $availabilityOptions = [
        'available' => 'Disponible',
        'reserved' => 'Réservé',
        'adoption_pending' => 'En cours d’adoption',
        'not_available' => 'Non disponible',
        'to_define' => 'À définir',
    ];

    $priceOptions = [
        'hidden' => 'Ne pas afficher le prix',
        'on_request' => 'Afficher “Prix sur demande”',
        'fixed' => 'Afficher un prix précis',
    ];

    $visibilityOptions = [
        'visible' => 'Visible sur le site',
        'hidden' => 'Masqué / brouillon',
    ];

    $categoryOptions = [
        'female' => 'Femelle',
        'male' => 'Mâle',
    ];
@endphp

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

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="admin-cat-form">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <section class="admin-form-grid">
        <div class="admin-form-main">
            <div class="admin-form-card">
                <div class="admin-form-card-head">
                    <span class="admin-kicker">Identité</span>
                    <h2>Informations principales</h2>
                </div>

                <div class="admin-fields-grid">
                    <label>
                        <span>Nom complet *</span>
                        <input type="text" name="name" value="{{ old('name', $cat->name) }}" required>
                    </label>

                    <label>
                        <span>Nom court</span>
                        <input type="text" name="short_name" value="{{ old('short_name', $cat->short_name) }}">
                    </label>

                    <label>
                        <span>Catégorie *</span>
                        <select name="category" required>
                            @foreach($categoryOptions as $value => $label)
                                <option value="{{ $value }}" @selected(old('category', $cat->category) === $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <label>
                        <span>Sexe</span>
                        <input type="text" name="sex" value="{{ old('sex', $cat->sex) }}" placeholder="Mâle ou Femelle">
                    </label>

                    <label>
                        <span>Date de naissance</span>
                        <input type="date" name="birth_date" value="{{ old('birth_date', optional($cat->birth_date)->format('Y-m-d')) }}">
                    </label>

                    <label>
                        <span>Couleur des yeux</span>
                        <input type="text" name="eyes" value="{{ old('eyes', $cat->eyes) }}" placeholder="Vert, or, aigue-marine...">
                    </label>
                </div>

                <label class="admin-full-field">
                    <span>Robe</span>
                    <input type="text" name="coat" value="{{ old('coat', $cat->coat) }}" placeholder="Black silver tabby rosetted/spotted">
                </label>
            </div>

            <div class="admin-form-card">
                <div class="admin-form-card-head">
                    <span class="admin-kicker">Présentation</span>
                    <h2>Texte de la fiche</h2>
                </div>

                <label class="admin-full-field">
                    <span>Phrase courte visible sur la carte</span>
                    <textarea name="highlight" rows="3">{{ old('highlight', $cat->highlight) }}</textarea>
                </label>

                <label class="admin-full-field">
                    <span>Description complète</span>
                    <textarea name="description" rows="6">{{ old('description', $cat->description) }}</textarea>
                </label>
            </div>

            <div class="admin-form-card">
                <div class="admin-form-card-head">
                    <span class="admin-kicker">Identification</span>
                    <h2>LOOF, I-CAD et parents</h2>
                </div>

                <div class="admin-fields-grid">
                    <label>
                        <span>I-CAD</span>
                        <input type="text" name="icad" value="{{ old('icad', $cat->icad) }}">
                    </label>

                    <label>
                        <span>Numéro LOOF</span>
                        <input type="text" name="loof" value="{{ old('loof', $cat->loof) }}">
                    </label>

                    <label>
                        <span>Nom du père</span>
                        <input type="text" name="father_name" value="{{ old('father_name', $cat->father_name) }}">
                    </label>

                    <label>
                        <span>Nom de la mère</span>
                        <input type="text" name="mother_name" value="{{ old('mother_name', $cat->mother_name) }}">
                    </label>
                </div>
            </div>

            <div class="admin-form-card">
                <div class="admin-form-card-head">
                    <span class="admin-kicker">Santé</span>
                    <h2>Tests et suivi</h2>
                </div>

                <div class="admin-fields-grid">
                    <label>
                        <span>HCM</span>
                        <input type="text" name="health_hcm" value="{{ old('health_hcm', $cat->health_hcm) }}">
                    </label>

                    <label>
                        <span>PKD</span>
                        <input type="text" name="health_pkd" value="{{ old('health_pkd', $cat->health_pkd) }}">
                    </label>

                    <label>
                        <span>FIV/FELV</span>
                        <input type="text" name="health_fiv_felv" value="{{ old('health_fiv_felv', $cat->health_fiv_felv) }}">
                    </label>

                    <label>
                        <span>PRA-b</span>
                        <input type="text" name="health_pra_b" value="{{ old('health_pra_b', $cat->health_pra_b) }}">
                    </label>

                    <label>
                        <span>PKDef</span>
                        <input type="text" name="health_pkdef" value="{{ old('health_pkdef', $cat->health_pkdef) }}">
                    </label>

                    <label>
                        <span>Tests des parents</span>
                        <input type="text" name="health_parents_tests" value="{{ old('health_parents_tests', $cat->health_parents_tests) }}">
                    </label>
                </div>
            </div>
        </div>

        <aside class="admin-form-side">
            <div class="admin-form-card admin-sticky-card">
                <div class="admin-form-card-head">
                    <span class="admin-kicker">Publication</span>
                    <h2>Affichage</h2>
                </div>

                <label>
                    <span>Statut</span>
                    <select name="availability">
                        @foreach($availabilityOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('availability', $cat->availability) === $value)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    <span>Libellé personnalisé du statut</span>
                    <input type="text" name="availability_label" value="{{ old('availability_label', $cat->availability_label) }}" placeholder="Ex : Reproducteur">
                </label>

                <label>
                    <span>Visibilité</span>
                    <select name="visibility">
                        @foreach($visibilityOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('visibility', $cat->visibility) === $value)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    <span>Prix</span>
                    <select name="price_mode" id="priceMode">
                        @foreach($priceOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('price_mode', $cat->price_mode) === $value)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label id="priceField">
                    <span>Montant du prix</span>
                    <input type="number" name="price" value="{{ old('price', $cat->price) }}" min="0" step="1" placeholder="1200">
                </label>

                <label>
                    <span>Ordre d’affichage</span>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $cat->sort_order ?? 0) }}" min="0">
                </label>

                <label class="admin-checkbox">
                    <input type="checkbox" name="featured" value="1" @checked(old('featured', $cat->featured))>
                    <span>Mettre ce chat en avant</span>
                </label>

                <button type="submit" class="admin-submit-btn">
                    {{ $submitLabel }}
                </button>
            </div>

            <div class="admin-form-card">
                <div class="admin-form-card-head">
                    <span class="admin-kicker">Photos</span>
                    <h2>Ajouter des photos</h2>
                </div>

                <label class="admin-upload-box">
                    <input type="file" name="images[]" id="imagesInput" accept="image/jpeg,image/png,image/webp" multiple>
                    <strong>Ajouter des photos</strong>
                    <span>JPG, PNG ou WEBP — plusieurs photos possibles.</span>
                </label>

                <div class="admin-preview-images" id="imagesPreview"></div>
            </div>
        </aside>
    </section>
</form>

@if($cat->exists && $cat->images->isNotEmpty())
    <section class="admin-form-card admin-photo-manager">
        <div class="admin-gallery-manager admin-gallery-comfort">
            <div class="admin-gallery-head">
                <span class="admin-kicker">Galerie existante</span>

                <h3>Choisir la photo principale</h3>

                <p>
                    La photo de couverture est celle qui apparaît en premier sur le site.
                    Réorganisez les photos facilement avec les boutons, puis enregistrez.
                </p>
            </div>

            <div class="admin-gallery-layout">
                @php
                    $coverImage = $cat->images->first();
                @endphp

                <aside class="admin-cover-preview" id="coverPreview">
                    <span>Photo principale</span>

                    <figure>
                        <img
                            src="{{ asset('storage/' . $coverImage->path) }}"
                            alt="{{ $coverImage->alt ?: $cat->name }}"
                            id="coverPreviewImage"
                        >
                    </figure>

                    <strong id="coverPreviewName">
                        {{ $coverImage->original_name ?: 'Photo 1' }}
                    </strong>

                    <p>
                        Cette photo sera utilisée comme visuel principal sur les cartes et dans la fiche du chat.
                    </p>
                </aside>

                <div class="admin-photo-list" id="photoList">
                    @foreach($cat->images as $image)
                        <article
                            class="admin-photo-row"
                            data-image-id="{{ $image->id }}"
                            data-image-src="{{ asset('storage/' . $image->path) }}"
                            data-image-name="{{ $image->original_name ?: 'Photo ' . $loop->iteration }}"
                        >
                            <div class="admin-photo-row-rank">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <figure>
                                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt ?: $cat->name }}">
                            </figure>

                            <div class="admin-photo-row-info">
                                <strong>{{ $image->original_name ?: 'Photo ' . $loop->iteration }}</strong>
                                <span class="admin-photo-role">
                                    {{ $loop->first || $image->is_main ? 'Photo principale' : 'Photo secondaire' }}
                                </span>
                            </div>

                            <div class="admin-photo-row-actions">
                                <button type="button" data-photo-action="up">Monter</button>
                                <button type="button" data-photo-action="down">Descendre</button>
                                <button type="button" data-photo-action="cover">Mettre en couverture</button>

                                <form action="{{ route('admin.cat-images.destroy', $image) }}" method="POST" onsubmit="return confirm('Supprimer cette photo ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="is-danger">Supprimer</button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <form action="{{ route('admin.chats.images.reorder', $cat) }}" method="POST" class="admin-reorder-form" id="reorderForm">
                @csrf
                @method('PATCH')

                <div id="orderInputs"></div>

                <button type="submit" class="admin-submit-btn admin-save-order-btn">
                    Enregistrer l’ordre des photos
                </button>
            </form>
        </div>
    </section>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const priceMode = document.getElementById('priceMode');
        const priceField = document.getElementById('priceField');
        const imagesInput = document.getElementById('imagesInput');
        const imagesPreview = document.getElementById('imagesPreview');

        const photoList = document.getElementById('photoList');
        const orderInputs = document.getElementById('orderInputs');
        const coverPreviewImage = document.getElementById('coverPreviewImage');
        const coverPreviewName = document.getElementById('coverPreviewName');

        function togglePriceField() {
            if (!priceMode || !priceField) return;

            priceField.style.display = priceMode.value === 'fixed' ? 'grid' : 'none';
        }

        function previewSelectedImages() {
            if (!imagesInput || !imagesPreview) return;

            imagesPreview.innerHTML = '';

            Array.from(imagesInput.files).forEach((file) => {
                const reader = new FileReader();

                reader.onload = function (event) {
                    const figure = document.createElement('figure');
                    const img = document.createElement('img');

                    img.src = event.target.result;
                    img.alt = file.name;

                    figure.appendChild(img);
                    imagesPreview.appendChild(figure);
                };

                reader.readAsDataURL(file);
            });
        }

        function getPhotoRows() {
            if (!photoList) return [];

            return Array.from(photoList.querySelectorAll('[data-image-id]'));
        }

        function refreshPhotoOrder() {
            if (!photoList || !orderInputs) return;

            orderInputs.innerHTML = '';

            const rows = getPhotoRows();

            rows.forEach((row, index) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'images_order[]';
                input.value = row.dataset.imageId;
                orderInputs.appendChild(input);

                const rank = row.querySelector('.admin-photo-row-rank');
                const role = row.querySelector('.admin-photo-role');
                const upButton = row.querySelector('[data-photo-action="up"]');
                const downButton = row.querySelector('[data-photo-action="down"]');
                const coverButton = row.querySelector('[data-photo-action="cover"]');

                if (rank) {
                    rank.textContent = String(index + 1).padStart(2, '0');
                }

                row.classList.toggle('is-cover', index === 0);

                if (role) {
                    role.textContent = index === 0 ? 'Photo principale' : 'Photo secondaire';
                }

                if (upButton) {
                    upButton.disabled = index === 0;
                }

                if (downButton) {
                    downButton.disabled = index === rows.length - 1;
                }

                if (coverButton) {
                    coverButton.disabled = index === 0;
                }
            });

            const firstRow = rows[0];

            if (firstRow && coverPreviewImage && coverPreviewName) {
                coverPreviewImage.src = firstRow.dataset.imageSrc;
                coverPreviewName.textContent = firstRow.dataset.imageName || 'Photo principale';
            }
        }

        function movePhoto(row, action) {
            if (!photoList || !row) return;

            if (action === 'up' && row.previousElementSibling) {
                photoList.insertBefore(row, row.previousElementSibling);
            }

            if (action === 'down' && row.nextElementSibling) {
                photoList.insertBefore(row.nextElementSibling, row);
            }

            if (action === 'cover') {
                photoList.insertBefore(row, photoList.firstElementChild);
            }

            refreshPhotoOrder();
        }

        function initPhotoList() {
            if (!photoList) return;

            photoList.addEventListener('click', function (event) {
                const actionButton = event.target.closest('[data-photo-action]');
                if (!actionButton) return;

                const row = actionButton.closest('[data-image-id]');
                const action = actionButton.dataset.photoAction;

                movePhoto(row, action);
            });

            refreshPhotoOrder();
        }

        togglePriceField();
        initPhotoList();

        if (priceMode) {
            priceMode.addEventListener('change', togglePriceField);
        }

        if (imagesInput) {
            imagesInput.addEventListener('change', previewSelectedImages);
        }
    });
</script>
