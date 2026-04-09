@extends('layouts.app')

@section('content')
    <h2 class="page-title">Datos de libros</h2>
    <p class="page-subtitle">Explore los libros disponibles y navegue a sus autores y editoriales relacionadas.</p>

    <div class="top-actions">
        <a href="{{ route('books.create') }}" class="btn">Agregar libro</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Portada</th>
                <th>ID</th>
                <th>Título</th>
                <th>Edición</th>
                <th>Copyright</th>
                <th>Idioma</th>
                <th>Páginas</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>
                        @if($book->image)
                            <img src="{{ asset($book->image) }}" alt="{{ $book->title }}" class="book-thumb">
                        @endif
                    </td>
                    <td>{{ $book->id }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                    </td>
                    <td>{{ $book->edition }}</td>
                    <td>{{ $book->copyright }}</td>
                    <td>{{ $book->language }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>
                        <a href="{{ route('authors.show', $book->author->id) }}">
                            {{ $book->author->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('publishers.show', $book->publisher->id) }}">
                            {{ $book->publisher->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">Editar</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este libro?');" class="table-action-form">
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