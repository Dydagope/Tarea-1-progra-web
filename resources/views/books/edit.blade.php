@extends('layouts.app')

@section('content')
    <h2 class="page-title">Editar libro</h2>
    <p class="page-subtitle">Modifique la información del libro seleccionado.</p>

    <div class="card">
        <form action="{{ route('books.update', $book->id) }}" method="POST" class="form-grid">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="form-group">
                <label for="edition">Edición</label>
                <input type="text" id="edition" name="edition" value="{{ old('edition', $book->edition) }}" required>
            </div>

            <div class="form-group">
                <label for="copyright">Copyright</label>
                <input type="number" id="copyright" name="copyright" value="{{ old('copyright', $book->copyright) }}" required>
            </div>

            <div class="form-group">
                <label for="language">Idioma</label>
                <input type="text" id="language" name="language" value="{{ old('language', $book->language) }}" required>
            </div>

            <div class="form-group">
                <label for="pages">Páginas</label>
                <input type="number" id="pages" name="pages" value="{{ old('pages', $book->pages) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Ruta de imagen</label>
                <input type="text" id="image" name="image" value="{{ old('image', $book->image) }}">
            </div>

            <div class="form-group">
                <label for="author_id">Autor</label>
                <select id="author_id" name="author_id" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="publisher_id">Editorial</label>
                <select id="publisher_id" name="publisher_id" required>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="btn">Actualizar libro</button>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection