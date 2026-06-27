<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Croquette;
use App\Models\CroquetteSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CroquetteController extends Controller
{
    public function index()
    {
        $section = CroquetteSection::firstOrCreate(
            ['id' => 1],
            [
                'label' => 'À la chatterie',
                'title' => 'Les 3 gammes de croquettes utilisées chez nous.',
                'description' => 'Pour rendre la page plus claire, chaque gamme est présentée sous forme de carte avec les informations essentielles visibles immédiatement et la composition complète accessible au clic.',
            ]
        );

        $croquettes = Croquette::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.croquettes.index', compact('section', 'croquettes'));
    }

    public function updateSection(Request $request)
    {
        $data = $request->validate([
            'label' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        CroquetteSection::firstOrCreate(['id' => 1])->update($data);

        return back()->with('success', 'La section croquettes a bien été mise à jour.');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('croquettes', 'public');
        }

        Croquette::create($data);

        return back()->with('success', 'La gamme de croquettes a bien été ajoutée.');
    }

    public function update(Request $request, Croquette $croquette)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            if ($croquette->image) {
                Storage::disk('public')->delete($croquette->image);
            }

            $data['image'] = $request->file('image')->store('croquettes', 'public');
        }

        $croquette->update($data);

        return back()->with('success', 'La gamme de croquettes a bien été modifiée.');
    }

    public function destroy(Croquette $croquette)
    {
        if ($croquette->image) {
            Storage::disk('public')->delete($croquette->image);
        }

        $croquette->delete();

        return back()->with('success', 'La gamme de croquettes a bien été supprimée.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'image' => ['nullable', 'image', 'max:4096'],
            'image_alt' => ['nullable', 'string', 'max:255'],

            'protein' => ['nullable', 'string', 'max:50'],
            'fat' => ['nullable', 'string', 'max:50'],
            'taurine' => ['nullable', 'string', 'max:50'],

            'composition' => ['nullable', 'string'],
            'analytical_components' => ['nullable', 'string'],
            'nutritional_additives' => ['nullable', 'string'],
            'technological_additives' => ['nullable', 'string'],

            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
