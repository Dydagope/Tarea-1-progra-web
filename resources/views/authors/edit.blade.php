@extends('layouts.app')

@section('content')
    <h2 class="page-title">Editar autor</h2>
    <p class="page-subtitle">Modifique la información del autor seleccionado.</p>

    <div class="card">
        <form action="{{ route('authors.update', $author->id) }}" method="POST" class="form-grid">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $author->name) }}" required>
            </div>

            <div class="form-group">
                <label for="nationality">Nacionalidad</label>
                <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $author->nationality) }}" required>
            </div>

            <div class="form-group">
                <label for="birth_year">Año de nacimiento</label>
                <input type="number" id="birth_year" name="birth_year" value="{{ old('birth_year', $author->birth_year) }}" required>
            </div>

            <div class="form-group">
                <label for="fields">Campos</label>
                <input type="text" id="fields" name="fields" value="{{ old('fields', $author->fields) }}" required>
            </div>

            <div>
                <button type="submit" class="btn">Actualizar autor</button>
                <a href="{{ route('authors.show', $author->id) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection