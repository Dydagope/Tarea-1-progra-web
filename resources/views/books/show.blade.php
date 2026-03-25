@extends('layouts.app')

@section('content')
    <h2 class="page-title">Detalle del libro</h2>
    <p class="page-subtitle">Información completa del libro seleccionado.</p>

    <div class="card">
        <div class="detail-grid">
            <div>
                <img src="{{ asset($book['image']) }}" alt="{{ $book['title'] }}" class="book-cover">
            </div>

            <div class="meta">
                <p><strong>ID:</strong> {{ $book['id'] }}</p>
                <p><strong>Título:</strong> {{ $book['title'] }}</p>
                <p><strong>Edición:</strong> {{ $book['edition'] }}</p>
                <p><strong>Copyright:</strong> {{ $book['copyright'] }}</p>
                <p><strong>Idioma:</strong> {{ $book['language'] }}</p>
                <p><strong>Páginas:</strong> {{ $book['pages'] }}</p>

                <p>
                    <strong>Autor:</strong>
                    <a href="{{ route('authors.show', $book['author']['id']) }}">
                        {{ $book['author']['name'] }}
                    </a>
                </p>

                <p>
                    <strong>Editorial:</strong>
                    <a href="{{ route('publishers.show', $book['publisher']['id']) }}">
                        {{ $book['publisher']['name'] }}
                    </a>
                </p>

                <div class="chips">
                    <span class="chip">Libro académico</span>
                    <span class="chip">{{ $book['language'] }}</span>
                    <span class="chip">{{ $book['pages'] }} páginas</span>
                </div>

                <a href="{{ route('books.index') }}" class="btn">Volver a libros</a>
            </div>
        </div>
    </div>
@endsection