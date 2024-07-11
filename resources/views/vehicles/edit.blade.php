@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Vehículo</h1>
    <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ $vehicle->marca }}" required>
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}" required>
        </div>
        <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $vehicle->matricula }}" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select class="form-control" id="type" name="type" required>
                <option value="normal" {{ $vehicle->type == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="gran_carga" {{ $vehicle->type == 'gran_carga' ? 'selected' : '' }}>Gran Carga</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_active">Activo</label>
            <input type="checkbox" id="is_active" name="is_active" {{ $vehicle->is_active ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="owner_id">Propietario</label>
            <select class="form-control" id="owner_id" name="owner_id">
                <option value="">Sin propietario</option>
                @foreach($owners as $owner)
                    <option value="{{ $owner->id }}" {{ $vehicle->owner_id == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="driver_id">Conductor</label>
            <select class="form-control" id="driver_id" name="driver_id">
                <option value="">Sin conductor</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ $vehicle->driver_id == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
