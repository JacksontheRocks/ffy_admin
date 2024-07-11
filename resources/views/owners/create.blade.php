@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Propietario</h1>
    <form method="POST" action="{{ route('owners.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="nif_cif">NIF/CIF</label>
            <input type="text" class="form-control" id="nif_cif" name="nif_cif" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" required>
        </div>
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
