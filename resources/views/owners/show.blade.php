@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Propietario</h1>
    <div class="card">
        <div class="card-header">
            {{ $owner->name }}
        </div>
        <div class="card-body">
            <p><strong>NIF/CIF:</strong> {{ $owner->nif_cif }}</p>
            <p><strong>Dirección:</strong> {{ $owner->direccion }}</p>
            <p><strong>Código Postal:</strong> {{ $owner->codigo_postal }}</p>
            <p><strong>Provincia:</strong> {{ $owner->provincia }}</p>
            <p><strong>Localidad:</strong> {{ $owner->localidad }}</p>
            <p><strong>Teléfono:</strong> {{ $owner->telefono }}</p>
        </div>
    </div>
</div>
@endsection
