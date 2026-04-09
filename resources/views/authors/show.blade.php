@extends('layouts.app')

@section('content')
    <h2 class="page-title">Detalle del autor</h2>
    <p class="page-subtitle">Información del autor y obras relacionadas.</p>

    <div class="top-actions">
        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar autor</a>

        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este autor? Esto también eliminará sus libros asociados.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar autor</button>
        </form>

        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Volver a autores</a>
    </div>

    <div class="card">
        <div class="meta">
            <p><strong>ID:</strong> {{ $author->id }}</p>
            <p><strong>Nombre:</strong> {{ $author->name }}</p>
            <p><strong>Nacionalidad:</strong> {{ $author->nationality }}</p>
            <p><strong>Año de nacimiento:</strong> {{ $author->birth_year }}</p>
            <p><strong>Campos:</strong> {{ $author->fields }}</p>

            <p><strong>Libros:</strong></p>
            <ul>
                @foreach($author->books as $book)
                    <li>
                        <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection