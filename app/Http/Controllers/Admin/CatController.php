<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\CatImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::with('images')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.chats.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.chats.create', [
            'cat' => new Cat([
                'category' => 'female',
                'availability' => 'to_define',
                'visibility' => 'visible',
                'price_mode' => 'hidden',
                'featured' => false,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['slug'] = $this->uniqueSlug($data['name']);
        $data['featured'] = $request->boolean('featured');

        if (($data['price_mode'] ?? 'hidden') !== 'fixed') {
            $data['price'] = null;
        }

        $cat = Cat::create($data);

        $this->storeImages($request, $cat);

        return redirect()
            ->route('admin.chats.edit', $cat)
            ->with('success', 'Le chat a bien été ajouté.');
    }

    public function edit(Cat $cat)
    {
        $cat->load('images');

        return view('admin.chats.edit', compact('cat'));
    }

    public function update(Request $request, Cat $cat)
    {
        $data = $this->validatedData($request, $cat);

        $data['slug'] = $this->uniqueSlug($data['name'], $cat->id);
        $data['featured'] = $request->boolean('featured');

        if (($data['price_mode'] ?? 'hidden') !== 'fixed') {
            $data['price'] = null;
        }

        $cat->update($data);

        $this->storeImages($request, $cat);

        return redirect()
            ->route('admin.chats.edit', $cat)
            ->with('success', 'La fiche a bien été mise à jour.');
    }

    public function destroy(Cat $cat)
    {
        foreach ($cat->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $cat->delete();

        return redirect()
            ->route('admin.chats.index')
            ->with('success', 'La fiche a bien été supprimée.');
    }

    public function destroyImage(CatImage $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return back()->with('success', 'La photo a bien été supprimée.');
    }

    public function setMainImage(CatImage $image)
    {
        CatImage::where('cat_id', $image->cat_id)->update([
            'is_main' => false,
        ]);

        $image->update([
            'is_main' => true,
        ]);

        return back()->with('success', 'La photo principale a bien été modifiée.');
    }

    private function validatedData(Request $request, ?Cat $cat = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'short_name' => ['nullable', 'string', 'max:255'],

            'category' => ['required', Rule::in(['male', 'female'])],
            'sex' => ['nullable', 'string', 'max:50'],
            'birth_date' => ['nullable', 'date'],

            'icad' => ['nullable', 'string', 'max:255'],
            'loof' => ['nullable', 'string', 'max:255'],
            'coat' => ['nullable', 'string', 'max:255'],
            'eyes' => ['nullable', 'string', 'max:255'],

            'availability' => [
                'required',
                Rule::in(['available', 'reserved', 'adoption_pending', 'not_available', 'to_define']),
            ],
            'availability_label' => ['nullable', 'string', 'max:255'],

            'visibility' => ['required', Rule::in(['visible', 'hidden'])],

            'price_mode' => ['required', Rule::in(['hidden', 'on_request', 'fixed'])],
            'price' => ['nullable', 'numeric', 'min:0'],

            'highlight' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],

            'father_name' => ['nullable', 'string', 'max:255'],
            'mother_name' => ['nullable', 'string', 'max:255'],

            'health_hcm' => ['nullable', 'string', 'max:255'],
            'health_pkd' => ['nullable', 'string', 'max:255'],
            'health_fiv_felv' => ['nullable', 'string', 'max:255'],
            'health_pra_b' => ['nullable', 'string', 'max:255'],
            'health_pkdef' => ['nullable', 'string', 'max:255'],
            'health_parents_tests' => ['nullable', 'string', 'max:255'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
            'featured' => ['nullable', 'boolean'],

            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);
    }

    private function storeImages(Request $request, Cat $cat): void
    {
        if (!$request->hasFile('images')) {
            return;
        }

        $currentMaxOrder = (int) $cat->images()->max('sort_order');

        foreach ($request->file('images') as $index => $file) {
            $path = $file->store('cats', 'public');

            $cat->images()->create([
                'path' => $path,
                'alt' => $cat->name,
                'original_name' => $file->getClientOriginalName(),
                'is_main' => !$cat->images()->exists() && $index === 0,
                'sort_order' => $currentMaxOrder + $index + 1,
            ]);
        }
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (
        Cat::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function reorderImages(Request $request, Cat $cat)
    {
        $data = $request->validate([
            'images_order' => ['required', 'array'],
            'images_order.*' => ['integer', 'exists:cat_images,id'],
        ]);

        foreach ($data['images_order'] as $index => $imageId) {
            CatImage::where('id', $imageId)
                ->where('cat_id', $cat->id)
                ->update([
                    'sort_order' => $index + 1,
                    'is_main' => $index === 0,
                ]);
        }

        return back()->with('success', 'L’ordre des photos a bien été enregistré.');
    }
}
