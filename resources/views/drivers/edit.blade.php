@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Driver</h1>
    <form method="POST" action="{{ route('drivers.update', $driver->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $driver->name }}" required>
        </div>
        <div class="form-group">
            <label for="nif_cif">NIF/CIF</label>
            <input type="text" class="form-control" id="nif_cif" name="nif_cif" value="{{ $driver->nif_cif }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $driver->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ $driver->codigo_postal }}" required>
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" value="{{ $driver->provincia }}" required>
        </div>
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" value="{{ $driver->localidad }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $driver->telefono }}" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
