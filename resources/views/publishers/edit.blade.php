@extends('layouts.app')

@section('content')
    <h2 class="page-title">Editar editorial</h2>
    <p class="page-subtitle">Modifique la información de la editorial seleccionada.</p>

    <div class="card">
        <form action="{{ route('publishers.update', $publisher->id) }}" method="POST" class="form-grid">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $publisher->name) }}" required>
            </div>

            <div class="form-group">
                <label for="country">País</label>
                <input type="text" id="country" name="country" value="{{ old('country', $publisher->country) }}" required>
            </div>

            <div class="form-group">
                <label for="founded">Año de fundación</label>
                <input type="number" id="founded" name="founded" value="{{ old('founded', $publisher->founded) }}" required>
            </div>

            <div class="form-group">
                <label for="genre">Género</label>
                <input type="text" id="genre" name="genre" value="{{ old('genre', $publisher->genre) }}" required>
            </div>

            <div>
                <button type="submit" class="btn">Actualizar editorial</button>
                <a href="{{ route('publishers.show', $publisher->id) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection