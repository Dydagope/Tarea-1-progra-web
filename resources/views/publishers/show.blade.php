@extends('layouts.app')

@section('content')
    <h2 class="page-title">Detalle de la editorial</h2>
    <p class="page-subtitle">Información de la editorial y sus libros asociados.</p>

    <div class="card">
        <div class="meta">
            <p><strong>ID:</strong> {{ $publisher['id'] }}</p>
            <p><strong>Nombre:</strong> {{ $publisher['name'] }}</p>
            <p><strong>País:</strong> {{ $publisher['country'] }}</p>
            <p><strong>Fundación:</strong> {{ $publisher['founded'] }}</p>
            <p><strong>Género:</strong> {{ $publisher['genre'] }}</p>

            <p><strong>Libros publicados:</strong></p>
            <ul>
                @foreach($publisher['books'] as $book)
                    <li>
                        <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('publishers.index') }}" class="btn">Volver a editoriales</a>
        </div>
    </div>
@endsection