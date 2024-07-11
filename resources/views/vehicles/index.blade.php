<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice de Vehículos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</head>
<body>
    @include('layouts.header')
    <div class="container mt-5">
        <h1>Índice de Vehículos</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matrícula</th>
                    <th>Tipo</th>
                    <th>Conductores Asignados</th>
                    <th>Propietarios Asignados</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->marca }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->matricula }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>
                            @if ($vehicle->drivers->isEmpty())
                                No tiene conductores asignados
                            @else
                                <ul>
                                    @foreach ($vehicle->drivers as $driver)
                                        <li>{{ $driver->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>
                            @if ($vehicle->owners->isEmpty())
                                No tiene propietarios asignados
                            @else
                                <ul>
                                    @foreach ($vehicle->owners as $owner)
                                        <li>{{ $owner->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{ route('vehicles.assign_driver_form', $vehicle) }}" class="btn btn-secondary">Asignar Conductor</a>
                            <a href="{{ route('vehicles.assign_owner_form', $vehicle) }}" class="btn btn-secondary">Asignar Propietario</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('vehicles.create') }}" class="btn btn-success">Crear Vehículo</a>
    </div>
</body>
</html>
