@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Drivers</h1>
    <a href="{{ route('drivers.create') }}" class="btn btn-primary mb-3">Agregar Driver</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>NIF/CIF</th>
                <th>Dirección</th>
                <th>Código Postal</th>
                <th>Provincia</th>
                <th>Localidad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->nif_cif }}</td>
                    <td>{{ $driver->direccion }}</td>
                    <td>{{ $driver->codigo_postal }}</td>
                    <td>{{ $driver->provincia }}</td>
                    <td>{{ $driver->localidad }}</td>
                    <td>{{ $driver->telefono }}</td>
                    <td>
                        <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
