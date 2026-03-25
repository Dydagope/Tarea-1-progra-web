@extends('layouts.app')

@section('content')
    <h2 class="page-title">Datos de autores</h2>
    <p class="page-subtitle">Autores disponibles y sus libros relacionados.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Nacionalidad</th>
                <th>Año de nacimiento</th>
                <th>Campos</th>
                <th>Libros</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td><a href="{{ route('authors.show', $author['id']) }}">{{ $author['name'] }}</a></td>
                    <td>{{ $author['nationality'] }}</td>
                    <td>{{ $author['birth_year'] }}</td>
                    <td>{{ $author['fields'] }}</td>
                    <td>
                        <ul>
                            @foreach($author['books'] as $book)
                                <li>
                                    <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection