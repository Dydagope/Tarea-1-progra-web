@extends('layouts.app')

@section('content')
    <h2 class="page-title">Agregar autor</h2>
    <p class="page-subtitle">Complete la información del nuevo autor.</p>

    <div class="card">
        <form action="{{ route('authors.store') }}" method="POST" class="form-grid">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="nationality">Nacionalidad</label>
                <input type="text" id="nationality" name="nationality" value="{{ old('nationality') }}" required>
            </div>

            <div class="form-group">
                <label for="birth_year">Año de nacimiento</label>
                <input type="number" id="birth_year" name="birth_year" value="{{ old('birth_year') }}" required>
            </div>

            <div class="form-group">
                <label for="fields">Campos</label>
                <input type="text" id="fields" name="fields" value="{{ old('fields') }}" required>
            </div>

            <div>
                <button type="submit" class="btn">Guardar autor</button>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection