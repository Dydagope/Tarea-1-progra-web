<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::with(['author', 'publisher'])->orderBy('id')->get();
        return view('books.index', compact('books'));
    }

    public function show(int $id): View
    {
        $book = Book::with(['author', 'publisher'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create(): View
    {
        $authors = Author::orderBy('name')->get();
        $publishers = Publisher::orderBy('name')->get();

        return view('books.create', compact('authors', 'publishers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'edition' => 'required|string|max:50',
            'copyright' => 'required|integer|min:1900|max:' . date('Y'),
            'language' => 'required|string|max:50',
            'pages' => 'required|integer|min:1',
            'image' => 'nullable|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book = Book::create($validated);

        return redirect()
            ->route('books.show', $book->id)
            ->with('success', 'Libro creado correctamente.');
    }

    public function edit(int $id): View
    {
        $book = Book::findOrFail($id);
        $authors = Author::orderBy('name')->get();
        $publishers = Publisher::orderBy('name')->get();

        return view('books.edit', compact('book', 'authors', 'publishers'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'edition' => 'required|string|max:50',
            'copyright' => 'required|integer|min:1900|max:' . date('Y'),
            'language' => 'required|string|max:50',
            'pages' => 'required|integer|min:1',
            'image' => 'nullable|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.show', $book->id)
            ->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}