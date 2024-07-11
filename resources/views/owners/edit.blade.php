@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Propietario</h1>
    <form method="POST" action="{{ route('owners.update', $owner->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $owner->name }}" required>
        </div>
        <div class="form-group">
            <label for="nif_cif">NIF/CIF</label>
            <input type="text" class="form-control" id="nif_cif" name="nif_cif" value="{{ $owner->nif_cif }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $owner->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ $owner->codigo_postal }}" required>
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" value="{{ $owner->provincia }}" required>
        </div>
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" value="{{ $owner->localidad }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $owner->telefono }}" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
