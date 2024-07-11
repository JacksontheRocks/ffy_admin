@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Driver</h1>
    <div class="card">
        <div class="card-header">
            {{ $driver->name }}
        </div>
        <div class="card-body">
            <p><strong>NIF/CIF:</strong> {{ $driver->nif_cif }}</p>
            <p><strong>Dirección:</strong> {{ $driver->direccion }}</p>
            <p><strong>Código Postal:</strong> {{ $driver->codigo_postal }}</p>
            <p><strong>Provincia:</strong> {{ $driver->provincia }}</p>
            <p><strong>Localidad:</strong> {{ $driver->localidad }}</p>
            <p><strong>Teléfono:</strong> {{ $driver->telefono }}</p>
        </div>
    </div>
</div>
@endsection
