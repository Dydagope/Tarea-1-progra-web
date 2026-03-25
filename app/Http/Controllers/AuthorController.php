<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private function getAuthors()
    {
        return [
            [
                'id' => 1,
                'name' => 'Abraham Silberschatz',
                'nationality' => 'Israeli / American',
                'birth_year' => 1952,
                'fields' => 'Database Systems, Operating Systems'
            ],
            [
                'id' => 2,
                'name' => 'Andrew S. Tanenbaum',
                'nationality' => 'Dutch / American',
                'birth_year' => 1944,
                'fields' => 'Distributed Computing, Operating Systems'
            ]
        ];
    }

    private function getBooks()
    {
        return [
            [
                'id' => 1,
                'title' => 'Operating System Concepts',
                'author_id' => 1,
                'image' => 'images/operating.png'
            ],
            [
                'id' => 2,
                'title' => 'Database System Concepts',
                'author_id' => 1,
                'image' => 'images/database.png'
            ],
            [
                'id' => 3,
                'title' => 'Computer Networks',
                'author_id' => 2,
                'image' => 'images/computer.png'
            ],
            [
                'id' => 4,
                'title' => 'Modern Operating Systems',
                'author_id' => 2,
                'image' => 'images/modern.png'
            ]
        ];
    }

    public function index()
    {
        $authors = $this->getAuthors();
        $books = $this->getBooks();

        foreach ($authors as &$author) {
            $author['books'] = array_values(array_filter($books, function ($book) use ($author) {
                return $book['author_id'] == $author['id'];
            }));
        }

        return view('authors.index', compact('authors'));
    }

    public function show($id)
    {
        $authors = $this->getAuthors();
        $books = $this->getBooks();

        $author = collect($authors)->firstWhere('id', (int)$id);

        if (!$author) {
            abort(404);
        }

        $author['books'] = array_values(array_filter($books, function ($book) use ($author) {
            return $book['author_id'] == $author['id'];
        }));

        return view('authors.show', compact('author'));
    }
}