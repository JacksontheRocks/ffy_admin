@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Propietarios</h1>
    <a href="{{ route('owners.create') }}" class="btn btn-primary mb-3">Agregar Propietario</a>
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
            @foreach($owners as $owner)
                <tr>
                    <td>{{ $owner->id }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->nif_cif }}</td>
                    <td>{{ $owner->direccion }}</td>
                    <td>{{ $owner->codigo_postal }}</td>
                    <td>{{ $owner->provincia }}</td>
                    <td>{{ $owner->localidad }}</td>
                    <td>{{ $owner->telefono }}</td>
                    <td>
                        <a href="{{ route('owners.show', $owner->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline-block;">
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
