@php
    $item = $croquette;
@endphp

<div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;">
    <label>
        <span>Tag</span>
        <input type="text" name="tag" value="{{ old('tag', $item?->tag) }}" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">
    </label>

    <label>
        <span>Titre</span>
        <input type="text" name="title" value="{{ old('title', $item?->title) }}" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;" required>
    </label>

    <label style="grid-column:1 / -1;">
        <span>Description courte</span>
        <textarea name="description" rows="3" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">{{ old('description', $item?->description) }}</textarea>
    </label>

    <label>
        <span>Image</span>
        <input type="file" name="image" accept="image/*" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;background:white;color:black;">
    </label>

    <label>
        <span>Texte alternatif image</span>
        <input type="text" name="image_alt" value="{{ old('image_alt', $item?->image_alt) }}" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">
    </label>

    <label>
        <span>Protéines</span>
        <input type="text" name="protein" value="{{ old('protein', $item?->protein) }}" placeholder="44%" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">
    </label>

    <label>
        <span>Matières grasses</span>
        <input type="text" name="fat" value="{{ old('fat', $item?->fat) }}" placeholder="18%" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">
    </label>

    <label>
        <span>Taurine</span>
        <input type="text" name="taurine" value="{{ old('taurine', $item?->taurine) }}" placeholder="2387" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">
    </label>

    <label>
        <span>Ordre</span>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item?->sort_order ?? 0) }}" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">
    </label>

    <label style="grid-column:1 / -1;">
        <span>Composition</span>
        <textarea name="composition" rows="5" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">{{ old('composition', $item?->composition) }}</textarea>
    </label>

    <label style="grid-column:1 / -1;">
        <span>Constituants analytiques</span>
        <textarea name="analytical_components" rows="5" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">{{ old('analytical_components', $item?->analytical_components) }}</textarea>
    </label>

    <label style="grid-column:1 / -1;">
        <span>Additifs nutritionnels</span>
        <textarea name="nutritional_additives" rows="4" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">{{ old('nutritional_additives', $item?->nutritional_additives) }}</textarea>
    </label>

    <label style="grid-column:1 / -1;">
        <span>Additifs technologiques</span>
        <textarea name="technological_additives" rows="3" style="width:100%;padding:14px;border-radius:12px;margin-top:8px;">{{ old('technological_additives', $item?->technological_additives) }}</textarea>
    </label>

    <label>
        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $item?->is_featured) ? 'checked' : '' }}>
        Mettre en avant
    </label>

    <label>
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item?->is_active ?? true) ? 'checked' : '' }}>
        Afficher sur le site
    </label>
</div>
