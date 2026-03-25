<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private function getAuthors()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Abraham Silberschatz',
                'nationality' => 'Israeli / American',
                'birth_year' => 1952,
                'fields' => 'Database Systems, Operating Systems'
            ],
            2 => [
                'id' => 2,
                'name' => 'Andrew S. Tanenbaum',
                'nationality' => 'Dutch / American',
                'birth_year' => 1944,
                'fields' => 'Distributed Computing, Operating Systems'
            ]
        ];
    }

    private function getPublishers()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'John Wiley & Sons',
                'country' => 'United States',
                'founded' => 1807,
                'genre' => 'Academic'
            ],
            2 => [
                'id' => 2,
                'name' => 'Pearson Education',
                'country' => 'United Kingdom',
                'founded' => 1844,
                'genre' => 'Education'
            ]
        ];
    }

    private function getBooks()
{
    return [
        [
            'id' => 1,
            'title' => 'Operating System Concepts',
            'edition' => '10th',
            'copyright' => 2018,
            'language' => 'ENGLISH',
            'pages' => 976,
            'author_id' => 1,
            'publisher_id' => 1,
            'image' => 'images/operating.png'
        ],
        [
            'id' => 2,
            'title' => 'Database System Concepts',
            'edition' => '7th',
            'copyright' => 2019,
            'language' => 'ENGLISH',
            'pages' => 1376,
            'author_id' => 1,
            'publisher_id' => 1,
            'image' => 'images/database.png'
        ],
        [
            'id' => 3,
            'title' => 'Computer Networks',
            'edition' => '5th',
            'copyright' => 2011,
            'language' => 'ENGLISH',
            'pages' => 960,
            'author_id' => 2,
            'publisher_id' => 2,
            'image' => 'images/computer.png'
        ],
        [
            'id' => 4,
            'title' => 'Modern Operating Systems',
            'edition' => '5th',
            'copyright' => 2022,
            'language' => 'ENGLISH',
            'pages' => 1136,
            'author_id' => 2,
            'publisher_id' => 2,
            'image' => 'images/modern.jpg'
        ]
    ];
}

    public function index()
    {
        $books = $this->getBooks();
        $authors = $this->getAuthors();
        $publishers = $this->getPublishers();

        foreach ($books as &$book) {
            $book['author'] = $authors[$book['author_id']]['name'];
            $book['publisher'] = $publishers[$book['publisher_id']]['name'];
        }

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $books = $this->getBooks();
        $authors = $this->getAuthors();
        $publishers = $this->getPublishers();

        $book = collect($books)->firstWhere('id', (int)$id);

        if (!$book) {
            abort(404);
        }

        $book['author'] = $authors[$book['author_id']];
        $book['publisher'] = $publishers[$book['publisher_id']];

        return view('books.show', compact('book'));
    }
}