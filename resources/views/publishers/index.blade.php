@extends('layouts.app')

@section('content')
    <h2 class="page-title">Datos de editoriales</h2>
    <p class="page-subtitle">Editoriales disponibles y libros publicados.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Editorial</th>
                <th>País</th>
                <th>Fundación</th>
                <th>Género</th>
                <th>Libros</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>{{ $publisher['id'] }}</td>
                    <td><a href="{{ route('publishers.show', $publisher['id']) }}">{{ $publisher['name'] }}</a></td>
                    <td>{{ $publisher['country'] }}</td>
                    <td>{{ $publisher['founded'] }}</td>
                    <td>{{ $publisher['genre'] }}</td>
                    <td>
                        <ul>
                            @foreach($publisher['books'] as $book)
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