@extends('layouts.app')

@section('content')
    <h2 class="page-title">Detalle del autor</h2>
    <p class="page-subtitle">Información del autor y obras relacionadas.</p>

    <div class="card">
        <div class="meta">
            <p><strong>ID:</strong> {{ $author['id'] }}</p>
            <p><strong>Nombre:</strong> {{ $author['name'] }}</p>
            <p><strong>Nacionalidad:</strong> {{ $author['nationality'] }}</p>
            <p><strong>Año de nacimiento:</strong> {{ $author['birth_year'] }}</p>
            <p><strong>Campos:</strong> {{ $author['fields'] }}</p>

            <p><strong>Libros:</strong></p>
            <ul>
                @foreach($author['books'] as $book)
                    <li>
                        <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('authors.index') }}" class="btn">Volver a autores</a>
        </div>
    </div>
@endsection