<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublisherController extends Controller
{
    public function index(): View
    {
        $publishers = Publisher::with('books')->orderBy('id')->get();
        return view('publishers.index', compact('publishers'));
    }

    public function show(int $id): View
    {
        $publisher = Publisher::with('books')->findOrFail($id);
        return view('publishers.show', compact('publisher'));
    }

    public function create(): View
    {
        return view('publishers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'founded' => 'required|integer|min:1400|max:' . date('Y'),
            'genre' => 'required|string|max:255',
        ]);

        $publisher = Publisher::create($validated);

        return redirect()
            ->route('publishers.show', $publisher->id)
            ->with('success', 'Editorial creada correctamente.');
    }

    public function edit(int $id): View
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $publisher = Publisher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'founded' => 'required|integer|min:1400|max:' . date('Y'),
            'genre' => 'required|string|max:255',
        ]);

        $publisher->update($validated);

        return redirect()
            ->route('publishers.show', $publisher->id)
            ->with('success', 'Editorial actualizada correctamente.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return redirect()
            ->route('publishers.index')
            ->with('success', 'Editorial eliminada correctamente.');
    }
}