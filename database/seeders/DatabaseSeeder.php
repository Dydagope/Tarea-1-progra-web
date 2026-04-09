<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Book::query()->delete();
        Author::query()->delete();
        Publisher::query()->delete();

        $author1 = Author::create([
            'id' => 1,
            'name' => 'Abraham Silberschatz',
            'nationality' => 'Israeli / American',
            'birth_year' => 1952,
            'fields' => 'Database Systems, Operating Systems',
        ]);

        $author2 = Author::create([
            'id' => 2,
            'name' => 'Andrew S. Tanenbaum',
            'nationality' => 'Dutch / American',
            'birth_year' => 1944,
            'fields' => 'Distributed Computing, Operating Systems',
        ]);

        $publisher1 = Publisher::create([
            'id' => 1,
            'name' => 'John Wiley & Sons',
            'country' => 'United States',
            'founded' => 1807,
            'genre' => 'Academic',
        ]);

        $publisher2 = Publisher::create([
            'id' => 2,
            'name' => 'Pearson Education',
            'country' => 'United Kingdom',
            'founded' => 1844,
            'genre' => 'Education',
        ]);

        Book::create([
            'id' => 1,
            'title' => 'Operating System Concepts',
            'edition' => '9th',
            'copyright' => 2012,
            'language' => 'ENGLISH',
            'pages' => 976,
            'image' => 'images/operating.png',
            'author_id' => $author1->id,
            'publisher_id' => $publisher1->id,
        ]);

        Book::create([
            'id' => 2,
            'title' => 'Database System Concepts',
            'edition' => '6th',
            'copyright' => 2010,
            'language' => 'ENGLISH',
            'pages' => 1376,
            'image' => 'images/database.png',
            'author_id' => $author1->id,
            'publisher_id' => $publisher1->id,
        ]);

        Book::create([
            'id' => 3,
            'title' => 'Computer Networks',
            'edition' => '5th',
            'copyright' => 2010,
            'language' => 'ENGLISH',
            'pages' => 960,
            'image' => 'images/computer.png',
            'author_id' => $author2->id,
            'publisher_id' => $publisher2->id,
        ]);

        Book::create([
            'id' => 4,
            'title' => 'Modern Operating Systems',
            'edition' => '4th',
            'copyright' => 2014,
            'language' => 'ENGLISH',
            'pages' => 1136,
            'image' => 'images/modern.jpg',
            'author_id' => $author2->id,
            'publisher_id' => $publisher2->id,
        ]);
    }
}