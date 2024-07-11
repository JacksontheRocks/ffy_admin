<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Propietario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</head>
<body>
    @include('layouts.header')
    <div class="container mt-5">
        <h1>Asignar Propietario</h1>
        <form method="POST" action="{{ route('vehicles.assign_owner', $vehicle) }}">
            @csrf
            <div class="form-group">
                <label for="owner_id">Seleccionar Propietario</label>
                <select class="form-control" id="owner_id" name="owner_id" required>
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Asignar Propietario</button>
        </form>
    </div>
</body>
</html>
