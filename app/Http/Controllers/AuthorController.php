<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::with('books')->orderBy('id')->get();
        return view('authors.index', compact('authors'));
    }

    public function show(int $id): View
    {
        $author = Author::with('books')->findOrFail($id);
        return view('authors.show', compact('author'));
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth_year' => 'required|integer|min:1800|max:' . date('Y'),
            'fields' => 'required|string|max:255',
        ]);

        $author = Author::create($validated);

        return redirect()
            ->route('authors.show', $author->id)
            ->with('success', 'Autor creado correctamente.');
    }

    public function edit(int $id): View
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth_year' => 'required|integer|min:1800|max:' . date('Y'),
            'fields' => 'required|string|max:255',
        ]);

        $author->update($validated);

        return redirect()
            ->route('authors.show', $author->id)
            ->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()
            ->route('authors.index')
            ->with('success', 'Autor eliminado correctamente.');
    }
}