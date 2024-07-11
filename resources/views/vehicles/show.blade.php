@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Vehículo</h1>
    <div class="card">
        <div class="card-header">
            {{ $vehicle->marca }} {{ $vehicle->model }}
        </div>
        <div class="card-body">
            <p><strong>Matrícula:</strong> {{ $vehicle->matricula }}</p>
            <p><strong>Tipo:</strong> {{ $vehicle->type }}</p>
            <p><strong>Activo:</strong> {{ $vehicle->is_active ? 'Sí' : 'No' }}</p>
            <p><strong>Propietario:</strong> {{ $vehicle->owner ? $vehicle->owner->name : 'Sin propietario' }}</p>
            <p><strong>Conductor:</strong> {{ $vehicle->driver ? $vehicle->driver->name : 'Sin conductor' }}</p>
        </div>
    </div>
    <a href="{{ route('vehicles.assignDriverForm', $vehicle->id) }}" class="btn btn-secondary mt-3">Asignar Conductor</a>
    <a href="{{ route('vehicles.assignOwnerForm', $vehicle->id) }}" class="btn btn-secondary mt-3">Asignar Propietario</a>
</div>
@endsection
