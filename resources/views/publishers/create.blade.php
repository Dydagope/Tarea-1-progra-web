@extends('layouts.app')

@section('content')
    <h2 class="page-title">Agregar editorial</h2>
    <p class="page-subtitle">Complete la información de la nueva editorial.</p>

    <div class="card">
        <form action="{{ route('publishers.store') }}" method="POST" class="form-grid">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="country">País</label>
                <input type="text" id="country" name="country" value="{{ old('country') }}" required>
            </div>

            <div class="form-group">
                <label for="founded">Año de fundación</label>
                <input type="number" id="founded" name="founded" value="{{ old('founded') }}" required>
            </div>

            <div class="form-group">
                <label for="genre">Género</label>
                <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required>
            </div>

            <div>
                <button type="submit" class="btn">Guardar editorial</button>
                <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection