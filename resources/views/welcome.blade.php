@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ config('app.name', 'Laravel') }}
        </div>

        <div class="menu">
            <div class="menu-item">
                <a href="{{ route('drivers.index') }}">Conductores</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('owners.index') }}">Propietarios</a>
            </div>
            <div class="menu-item">
                <a href="{{ route('vehicles.index') }}">Vehículos</a>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
