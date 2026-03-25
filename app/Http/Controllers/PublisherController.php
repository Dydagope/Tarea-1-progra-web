<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private function getPublishers()
    {
        return [
            [
                'id' => 1,
                'name' => 'John Wiley & Sons',
                'country' => 'United States',
                'founded' => 1807,
                'genre' => 'Academic'
            ],
            [
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
                'publisher_id' => 1,
                'image' => 'images/operating.png'
            ],
            [
                'id' => 2,
                'title' => 'Database System Concepts',
                'publisher_id' => 1,
                'image' => 'images/database.png'
            ],
            [
                'id' => 3,
                'title' => 'Computer Networks',
                'publisher_id' => 2,
                'image' => 'images/computer.png'
            ],
            [
                'id' => 4,
                'title' => 'Modern Operating Systems',
                'publisher_id' => 2,
                'image' => 'images/modern.png'
            ]
        ];
    }

    public function index()
    {
        $publishers = $this->getPublishers();
        $books = $this->getBooks();

        foreach ($publishers as &$publisher) {
            $publisher['books'] = array_values(array_filter($books, function ($book) use ($publisher) {
                return $book['publisher_id'] == $publisher['id'];
            }));
        }

        return view('publishers.index', compact('publishers'));
    }

    public function show($id)
    {
        $publishers = $this->getPublishers();
        $books = $this->getBooks();

        $publisher = collect($publishers)->firstWhere('id', (int)$id);

        if (!$publisher) {
            abort(404);
        }

        $publisher['books'] = array_values(array_filter($books, function ($book) use ($publisher) {
            return $book['publisher_id'] == $publisher['id'];
        }));

        return view('publishers.show', compact('publisher'));
    }
}