@extends('layouts.app')

@section('content')
    <h2 class="page-title">Datos de autores</h2>
    <p class="page-subtitle">Autores disponibles y sus libros relacionados.</p>

    <div class="top-actions">
        <a href="{{ route('authors.create') }}" class="btn">Agregar autor</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Nacionalidad</th>
                <th>Año de nacimiento</th>
                <th>Campos</th>
                <th>Libros</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td><a href="{{ route('authors.show', $author->id) }}">{{ $author->name }}</a></td>
                    <td>{{ $author->nationality }}</td>
                    <td>{{ $author->birth_year }}</td>
                    <td>{{ $author->fields }}</td>
                    <td>
                        <ul>
                            @foreach($author->books as $book)
                                <li>
                                    <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('authors.edit', $author->id) }}">Editar</a>

                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este autor? Esto también eliminará sus libros asociados.');" class="table-action-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="table-action-btn">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection