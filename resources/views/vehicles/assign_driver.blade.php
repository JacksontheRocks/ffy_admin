<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Conductor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</head>
<body>
    @include('layouts.header')
    <div class="container mt-5">
        <h1>Asignar Conductor</h1>
        <form method="POST" action="{{ route('vehicles.assign_driver', $vehicle) }}">
            @csrf
            <div class="form-group">
                <label for="driver_id">Seleccionar Conductor</label>
                <select class="form-control" id="driver_id" name="driver_id" required>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Asignar Conductor</button>
        </form>
    </div>
</body>
</html>
