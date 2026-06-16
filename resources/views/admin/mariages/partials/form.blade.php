@php
    $item = $mating;

    $statusOptions = [
        'planned' => 'Mariage prévu',
        'in_progress' => 'Mariage en cours',
        'confirmed' => 'Gestation confirmée',
        'born' => 'Chatons nés',
        'closed' => 'Archivé',
    ];
@endphp

<div class="admin-form-card">
    <div class="admin-form-card-head">
        <span class="admin-kicker">Identité</span>
        <h2>Parents du mariage</h2>
    </div>

    <label class="admin-full-field">
        <span>Titre facultatif</span>
        <input
            type="text"
            name="title"
            value="{{ old('title', $item?->title) }}"
            placeholder="Ex : Mariage Uroboros × Talullah"
        >
    </label>

    <div class="admin-fields-grid">
        <label>
            <span>Nom du père *</span>
            <input
                type="text"
                name="father_name"
                value="{{ old('father_name', $item?->father_name) }}"
                placeholder="Pardusdei Uroboros"
                required
            >
        </label>

        <label>
            <span>Nom de la mère *</span>
            <input
                type="text"
                name="mother_name"
                value="{{ old('mother_name', $item?->mother_name) }}"
                placeholder="Pardusdei Talullah"
                required
            >
        </label>
    </div>

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

    @if($item?->father_photo || $item?->mother_photo)
        <div class="admin-parent-preview-grid">
            @if($item?->father_photo)
                <div>
                    <img src="{{ asset('storage/' . $item->father_photo) }}" alt="Photo du père">

                    <label class="admin-checkbox">
                        <input type="checkbox" name="remove_father_photo" value="1">
                        <span>Supprimer la photo du père</span>
                    </label>
                </div>
            @endif

            @if($item?->mother_photo)
                <div>
                    <img src="{{ asset('storage/' . $item->mother_photo) }}" alt="Photo de la mère">

                    <label class="admin-checkbox">
                        <input type="checkbox" name="remove_mother_photo" value="1">
                        <span>Supprimer la photo de la mère</span>
                    </label>
                </div>
            @endif
        </div>
    @endif
</div>

<div class="admin-form-card">
    <div class="admin-form-card-head">
        <span class="admin-kicker">Suivi</span>
        <h2>Dates & statut</h2>
    </div>

    <div class="admin-fields-grid">
        <label>
            <span>Date de saillie début</span>
            <input
                type="date"
                name="mating_start_date"
                value="{{ old('mating_start_date', optional($item?->mating_start_date)->format('Y-m-d')) }}"
            >
        </label>

        <label>
            <span>Date de saillie fin</span>
            <input
                type="date"
                name="mating_end_date"
                value="{{ old('mating_end_date', optional($item?->mating_end_date)->format('Y-m-d')) }}"
            >
        </label>

        <label>
            <span>Arrivée potentielle des chatons</span>
            <input
                type="date"
                name="expected_birth_date"
                value="{{ old('expected_birth_date', optional($item?->expected_birth_date)->format('Y-m-d')) }}"
            >
        </label>

        <label>
            <span>Statut *</span>
            <select name="status" required>
                @foreach($statusOptions as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', $item?->status ?? 'in_progress') === $value)>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </label>
    </div>
</div>

<div class="admin-form-card">
    <div class="admin-form-card-head">
        <span class="admin-kicker">Prévisions</span>
        <h2>Couleurs possibles</h2>
    </div>

    <label class="admin-full-field">
        <span>Couleurs possibles des chatons</span>
        <textarea
            name="expected_colors"
            rows="5"
            placeholder="Ex : Brown rosetted, silver rosetted, snow..."
        >{{ old('expected_colors', $item?->expected_colors) }}</textarea>
    </label>

    <label class="admin-full-field">
        <span>Texte complémentaire facultatif</span>
        <textarea
            name="description"
            rows="4"
            placeholder="Quelques mots sur le mariage, les attentes, le caractère recherché..."
        >{{ old('description', $item?->description) }}</textarea>
    </label>

    <div class="admin-fields-grid">
        <label>
            <span>Ordre d’affichage</span>
            <input
                type="number"
                name="sort_order"
                value="{{ old('sort_order', $item?->sort_order ?? 0) }}"
                min="0"
            >
        </label>

        <label class="admin-checkbox">
            <input
                type="checkbox"
                name="is_visible"
                value="1"
                {{ old('is_visible', $item?->is_visible ?? true) ? 'checked' : '' }}
            >
            <span>Afficher sur le site</span>
        </label>
    </div>
</div>
