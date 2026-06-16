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

                <div class="admin-form-card">
                    <div class="admin-form-card-head">
                        <span class="admin-kicker">Origines</span>
                        <h2>Pedigree & parents</h2>
                    </div>

                    <label class="admin-full-field">
                        <span>Mention pedigree</span>
                        <textarea
                            name="pedigree_note"
                            rows="3"
                            placeholder="Issue du mariage de Pardusdei Uroboros et Pardusdei Talullah."
                        >{{ old('pedigree_note', $cat->pedigree_note) }}</textarea>
                    </label>

                    <label class="admin-full-field">
                        <span>PDF du pedigree</span>
                        <input type="file" name="pedigree_pdf" accept="application/pdf">
                    </label>

                    @if($cat->pedigree_pdf)
                        <div class="admin-pedigree-current">
                            <strong>Pedigree actuel</strong>
                            <a href="{{ asset('storage/' . $cat->pedigree_pdf) }}" target="_blank">
                                Voir le PDF
                            </a>

                            <label class="admin-checkbox">
                                <input type="checkbox" name="remove_pedigree_pdf" value="1">
                                <span>Supprimer le PDF actuel</span>
                            </label>
                        </div>
                    @endif

                    <div class="admin-fields-grid">
                        <label>
                            <span>Photo du père</span>
                            <input type="file" name="father_photo" accept="image/jpeg,image/png,image/webp">
                        </label>

                        <label>
                            <span>Photo de la mère</span>
                            <input type="file" name="mother_photo" accept="image/jpeg,image/png,image/webp">
                        </label>
                    </div>

                    @if($cat->father_photo || $cat->mother_photo)
                        <div class="admin-parent-preview-grid">
                            @if($cat->father_photo)
                                <div>
                                    <img src="{{ asset('storage/' . $cat->father_photo) }}" alt="Photo du père">
                                    <label class="admin-checkbox">
                                        <input type="checkbox" name="remove_father_photo" value="1">
                                        <span>Supprimer la photo du père</span>
                                    </label>
                                </div>
                            @endif

                            @if($cat->mother_photo)
                                <div>
                                    <img src="{{ asset('storage/' . $cat->mother_photo) }}" alt="Photo de la mère">
                                    <label class="admin-checkbox">
                                        <input type="checkbox" name="remove_mother_photo" value="1">
                                        <span>Supprimer la photo de la mère</span>
                                    </label>
                                </div>
                            @endif
                        </div>
                    @endif
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
                    Modifiez directement le numéro pour déplacer une photo, utilisez les boutons si besoin,
                    cliquez sur la miniature pour l’aperçu grand format, puis enregistrez l’ordre.
                </p>
            </div>

            <div class="admin-gallery-layout">
                @php
                    $coverImage = $cat->images->first();
                    $coverPositionX = $coverImage->position_x ?? 50;
                    $coverPositionY = $coverImage->position_y ?? 50;
                    $coverZoom = $coverImage->zoom ?? 1;
                @endphp

                <aside class="admin-cover-preview" id="coverPreview">
                    <span>Photo principale</span>

                    <figure>
                        <img
                            src="{{ asset('storage/' . $coverImage->path) }}"
                            alt="{{ $coverImage->alt ?: $cat->name }}"
                            id="coverPreviewImage"
                            style="
                                object-position: {{ $coverPositionX }}% {{ $coverPositionY }}%;
                                transform: scale({{ $coverZoom }});
                            "
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
                        @php
                            $positionX = $image->position_x ?? 50;
                            $positionY = $image->position_y ?? 50;
                            $zoom = $image->zoom ?? 1;
                            $imageName = $image->original_name ?: 'Photo ' . $loop->iteration;
                        @endphp

                        <article
                            class="admin-photo-row"
                            data-image-id="{{ $image->id }}"
                            data-image-src="{{ asset('storage/' . $image->path) }}"
                            data-image-name="{{ $imageName }}"
                            data-crop-x="{{ $positionX }}"
                            data-crop-y="{{ $positionY }}"
                            data-crop-zoom="{{ $zoom }}"
                        >
                            <label class="admin-photo-rank-editor">
                                <span>Photo</span>

                                <input
                                    type="number"
                                    min="1"
                                    value="{{ $loop->iteration }}"
                                    data-photo-position
                                    aria-label="Modifier la position de la photo {{ $loop->iteration }}"
                                >
                            </label>

                            <figure class="admin-photo-thumb" data-photo-preview>
                                <img
                                    src="{{ asset('storage/' . $image->path) }}"
                                    alt="{{ $image->alt ?: $cat->name }}"
                                    style="
                                        object-position: {{ $positionX }}% {{ $positionY }}%;
                                        transform: scale({{ $zoom }});
                                    "
                                >
                            </figure>

                            <div class="admin-photo-row-info">
                                <strong>{{ $imageName }}</strong>

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

                                    <button type="submit" class="is-danger">
                                        Supprimer
                                    </button>
                                </form>
                            </div>

                            <details class="admin-crop-details">
                                <summary>Recadrer / replacer</summary>

                                <form action="{{ route('admin.cat-images.crop', $image) }}" method="POST" class="admin-crop-form" data-crop-form>
                                    @csrf
                                    @method('PATCH')

                                    <div class="admin-crop-preview">
                                        <img
                                            src="{{ asset('storage/' . $image->path) }}"
                                            alt="{{ $image->alt ?: $cat->name }}"
                                            style="
                                                object-position: {{ $positionX }}% {{ $positionY }}%;
                                                transform: scale({{ $zoom }});
                                            "
                                            data-crop-preview
                                        >
                                    </div>

                                    <div class="admin-crop-controls">
                                        <label>
                                            <span>Horizontal</span>
                                            <input
                                                type="range"
                                                name="position_x"
                                                min="-100"
                                                max="200"
                                                step="1"
                                                value="{{ $positionX }}"
                                                data-crop-x
                                            >
                                        </label>

                                        <label>
                                            <span>Vertical</span>
                                            <input
                                                type="range"
                                                name="position_y"
                                                min="-100"
                                                max="200"
                                                step="1"
                                                value="{{ $positionY }}"
                                                data-crop-y
                                            >
                                        </label>

                                        <label>
                                            <span>Zoom</span>
                                            <input
                                                type="range"
                                                name="zoom"
                                                min="0.5"
                                                max="5"
                                                step="0.01"
                                                value="{{ $zoom }}"
                                                data-crop-zoom
                                            >
                                        </label>

                                        <div class="admin-crop-buttons">
                                            <button type="button" data-crop-reset>
                                                Réinitialiser
                                            </button>

                                            <button type="submit">
                                                Enregistrer le cadrage
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </details>
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

<div class="admin-photo-lightbox" id="adminPhotoLightbox" aria-hidden="true">
    <div class="admin-photo-lightbox-backdrop" data-photo-lightbox-close></div>

    <div class="admin-photo-lightbox-panel">
        <button
            type="button"
            class="admin-photo-lightbox-close"
            data-photo-lightbox-close
            aria-label="Fermer l’aperçu"
        >
            ×
        </button>

        <div class="admin-photo-lightbox-media">
            <img src="" alt="" id="adminPhotoLightboxImage">
        </div>

        <div class="admin-photo-lightbox-caption">
            <span id="adminPhotoLightboxRank">Photo</span>
            <strong id="adminPhotoLightboxName">Aperçu</strong>
        </div>
    </div>
</div>

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

        function updateCoverPreview(firstRow) {
            if (!firstRow || !coverPreviewImage || !coverPreviewName) return;

            const cropX = firstRow.dataset.cropX || '50';
            const cropY = firstRow.dataset.cropY || '50';
            const cropZoom = firstRow.dataset.cropZoom || '1';

            coverPreviewImage.src = firstRow.dataset.imageSrc;
            coverPreviewImage.style.objectPosition = `${cropX}% ${cropY}%`;
            coverPreviewImage.style.transform = `scale(${cropZoom})`;

            coverPreviewName.textContent = firstRow.dataset.imageName || 'Photo principale';
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

                const rankInput = row.querySelector('[data-photo-position]');
                const role = row.querySelector('.admin-photo-role');
                const upButton = row.querySelector('[data-photo-action="up"]');
                const downButton = row.querySelector('[data-photo-action="down"]');
                const coverButton = row.querySelector('[data-photo-action="cover"]');

                if (rankInput) {
                    rankInput.value = index + 1;
                    rankInput.max = rows.length;
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

            updateCoverPreview(rows[0]);
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

        function initPositionInputs() {
            if (!photoList) return;

            function moveRowToPosition(row, wantedPosition) {
                const rows = getPhotoRows();

                if (!row || rows.length === 0) return;

                const total = rows.length;
                let targetPosition = parseInt(wantedPosition, 10);

                if (Number.isNaN(targetPosition)) {
                    refreshPhotoOrder();
                    return;
                }

                targetPosition = Math.max(1, Math.min(targetPosition, total));

                const currentIndex = rows.indexOf(row);
                const targetIndex = targetPosition - 1;

                if (currentIndex === targetIndex) {
                    refreshPhotoOrder();
                    return;
                }

                row.remove();

                const updatedRows = getPhotoRows();
                const referenceRow = updatedRows[targetIndex] || null;

                if (referenceRow) {
                    photoList.insertBefore(row, referenceRow);
                } else {
                    photoList.appendChild(row);
                }

                refreshPhotoOrder();
            }

            function applyPositionInput(input) {
                if (!input) return;

                const row = input.closest('[data-image-id]');

                if (!row) return;

                moveRowToPosition(row, input.value);
            }

            photoList.addEventListener('change', function (event) {
                const input = event.target.closest('[data-photo-position]');

                if (!input) return;

                applyPositionInput(input);
            });

            photoList.addEventListener('keydown', function (event) {
                const input = event.target.closest('[data-photo-position]');

                if (!input) return;

                if (event.key === 'Enter') {
                    event.preventDefault();
                    applyPositionInput(input);
                    input.blur();
                }
            });

            const reorderForm = document.getElementById('reorderForm');

            if (reorderForm) {
                reorderForm.addEventListener('submit', function () {
                    const activeInput = document.activeElement?.closest?.('[data-photo-position]');

                    if (activeInput) {
                        applyPositionInput(activeInput);
                    }

                    refreshPhotoOrder();
                });
            }
        }

        function initCropForms() {
            document.querySelectorAll('[data-crop-form]').forEach((form) => {
                const preview = form.querySelector('[data-crop-preview]');
                const inputX = form.querySelector('[data-crop-x]');
                const inputY = form.querySelector('[data-crop-y]');
                const inputZoom = form.querySelector('[data-crop-zoom]');
                const resetButton = form.querySelector('[data-crop-reset]');
                const row = form.closest('[data-image-id]');

                function updatePreview() {
                    if (!preview || !inputX || !inputY || !inputZoom) return;

                    const x = inputX.value;
                    const y = inputY.value;
                    const zoom = inputZoom.value;

                    preview.style.objectPosition = `${x}% ${y}%`;
                    preview.style.transform = `scale(${zoom})`;

                    if (row) {
                        row.dataset.cropX = x;
                        row.dataset.cropY = y;
                        row.dataset.cropZoom = zoom;

                        const rowImage = row.querySelector('.admin-photo-thumb img');

                        if (rowImage) {
                            rowImage.style.objectPosition = `${x}% ${y}%`;
                            rowImage.style.transform = `scale(${zoom})`;
                        }

                        if (row.classList.contains('is-cover')) {
                            updateCoverPreview(row);
                        }
                    }
                }

                if (resetButton) {
                    resetButton.addEventListener('click', function () {
                        if (inputX) inputX.value = 50;
                        if (inputY) inputY.value = 50;
                        if (inputZoom) inputZoom.value = 1;

                        updatePreview();
                    });
                }

                [inputX, inputY, inputZoom].forEach((input) => {
                    if (input) {
                        input.addEventListener('input', updatePreview);
                    }
                });

                updatePreview();
            });
        }

        function initPhotoLightbox() {
            const lightbox = document.getElementById('adminPhotoLightbox');
            const lightboxImage = document.getElementById('adminPhotoLightboxImage');
            const lightboxRank = document.getElementById('adminPhotoLightboxRank');
            const lightboxName = document.getElementById('adminPhotoLightboxName');
            const closeButtons = document.querySelectorAll('[data-photo-lightbox-close]');

            if (!lightbox || !lightboxImage) return;

            document.querySelectorAll('[data-photo-preview]').forEach((trigger) => {
                trigger.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const row = trigger.closest('[data-image-id]');

                    if (!row) return;

                    const img = row.querySelector('.admin-photo-thumb img');
                    const rank = row.querySelector('[data-photo-position]');
                    const name = row.dataset.imageName || 'Photo';

                    if (!img) return;

                    lightboxImage.src = img.src;
                    lightboxImage.alt = img.alt || name;
                    lightboxImage.style.objectPosition = img.style.objectPosition || '50% 50%';
                    lightboxImage.style.transform = img.style.transform || 'scale(1)';

                    if (lightboxRank && rank) {
                        lightboxRank.textContent = `Photo ${String(rank.value).padStart(2, '0')}`;
                    }

                    if (lightboxName) {
                        lightboxName.textContent = name;
                    }

                    lightbox.classList.add('is-open');
                    lightbox.setAttribute('aria-hidden', 'false');
                    document.body.classList.add('admin-lightbox-open');
                });
            });

            function closeLightbox() {
                lightbox.classList.remove('is-open');
                lightbox.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('admin-lightbox-open');
            }

            closeButtons.forEach((button) => {
                button.addEventListener('click', closeLightbox);
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && lightbox.classList.contains('is-open')) {
                    closeLightbox();
                }
            });
        }

        togglePriceField();
        initPhotoList();
        initPositionInputs();
        initCropForms();
        initPhotoLightbox();

        if (priceMode) {
            priceMode.addEventListener('change', togglePriceField);
        }

        if (imagesInput) {
            imagesInput.addEventListener('change', previewSelectedImages);
        }
    });
</script>
