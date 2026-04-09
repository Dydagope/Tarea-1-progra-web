@extends('layouts.app')

@section('content')
    <h2 class="page-title">Detalle del libro</h2>
    <p class="page-subtitle">Información completa del libro seleccionado.</p>

    <div class="top-actions">
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar libro</a>

        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este libro?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar libro</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Volver a libros</a>
    </div>

    <div class="card">
        <div class="detail-grid">
            <div>
                @if($book->image)
                    <img src="{{ asset($book->image) }}" alt="{{ $book->title }}" class="book-cover">
                @endif
            </div>

            <div class="meta">
                <p><strong>ID:</strong> {{ $book->id }}</p>
                <p><strong>Título:</strong> {{ $book->title }}</p>
                <p><strong>Edición:</strong> {{ $book->edition }}</p>
                <p><strong>Copyright:</strong> {{ $book->copyright }}</p>
                <p><strong>Idioma:</strong> {{ $book->language }}</p>
                <p><strong>Páginas:</strong> {{ $book->pages }}</p>

                <p>
                    <strong>Autor:</strong>
                    <a href="{{ route('authors.show', $book->author->id) }}">
                        {{ $book->author->name }}
                    </a>
                </p>

                <p>
                    <strong>Editorial:</strong>
                    <a href="{{ route('publishers.show', $book->publisher->id) }}">
                        {{ $book->publisher->name }}
                    </a>
                </p>

                <div class="chips">
                    <span class="chip">Libro académico</span>
                    <span class="chip">{{ $book->language }}</span>
                    <span class="chip">{{ $book->pages }} páginas</span>
                </div>
            </div>
        </div>
    </div>
@endsection