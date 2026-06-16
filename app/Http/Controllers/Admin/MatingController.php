<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MatingController extends Controller
{
    public function index()
    {
        $matings = Mating::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.mariages.index', compact('matings'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data = $this->prepareData($request, $data);
        $data = $this->handleImages($request, $data);

        Mating::create($data);

        return back()->with('success', 'Le mariage a bien été ajouté.');
    }

    public function update(Request $request, Mating $mating)
    {
        $data = $this->validatedData($request);
        $data = $this->prepareData($request, $data);
        $data = $this->handleImages($request, $data, $mating);

        $mating->update($data);

        return back()->with('success', 'Le mariage a bien été modifié.');
    }

    public function destroy(Mating $mating)
    {
        if ($mating->father_photo) {
            Storage::disk('public')->delete($mating->father_photo);
        }

        if ($mating->mother_photo) {
            Storage::disk('public')->delete($mating->mother_photo);
        }

        $mating->delete();

        return back()->with('success', 'Le mariage a bien été supprimé.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['nullable', 'string', 'max:255'],

            'father_name' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],

            'father_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
            'mother_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],

            'mating_start_date' => ['nullable', 'date'],
            'mating_end_date' => ['nullable', 'date', 'after_or_equal:mating_start_date'],
            'expected_birth_date' => ['nullable', 'date'],

            'status' => [
                'required',
                Rule::in(['planned', 'in_progress', 'confirmed', 'born', 'closed']),
            ],

            'expected_colors' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],

            'remove_father_photo' => ['nullable', 'boolean'],
            'remove_mother_photo' => ['nullable', 'boolean'],
        ]);
    }

    private function prepareData(Request $request, array $data): array
    {
        $data['is_visible'] = $request->boolean('is_visible');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        unset(
            $data['remove_father_photo'],
            $data['remove_mother_photo']
        );

        return $data;
    }

    private function handleImages(Request $request, array $data, ?Mating $mating = null): array
    {
        if ($mating && $request->boolean('remove_father_photo') && $mating->father_photo) {
            Storage::disk('public')->delete($mating->father_photo);
            $data['father_photo'] = null;
        }

        if ($mating && $request->boolean('remove_mother_photo') && $mating->mother_photo) {
            Storage::disk('public')->delete($mating->mother_photo);
            $data['mother_photo'] = null;
        }

        if ($request->hasFile('father_photo')) {
            if ($mating && $mating->father_photo) {
                Storage::disk('public')->delete($mating->father_photo);
            }

            $data['father_photo'] = $request->file('father_photo')->store('mariages/parents', 'public');
        }

        if ($request->hasFile('mother_photo')) {
            if ($mating && $mating->mother_photo) {
                Storage::disk('public')->delete($mating->mother_photo);
            }

            $data['mother_photo'] = $request->file('mother_photo')->store('mariages/parents', 'public');
        }

        return $data;
    }
}
