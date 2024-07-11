<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Owner;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        // Cargar los vehículos con sus conductores y propietarios
        $vehicles = Vehicle::with('drivers', 'owners')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'model' => 'required',
            'matricula' => 'required|unique:vehicles',
            'type' => 'required',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'marca' => 'required',
            'model' => 'required',
            'matricula' => 'required|unique:vehicles,matricula,'.$vehicle->id,
            'type' => 'required',
        ]);

        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

    public function assignDriverForm(Vehicle $vehicle)
    {
        $drivers = Driver::all();
        return view('vehicles.assign_driver', compact('vehicle', 'drivers'));
    }

    public function assignDriver(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
        ]);

        $vehicle->drivers()->attach($request->driver_id);
        return redirect()->route('vehicles.index')->with('success', 'Driver assigned successfully.');
    }

    public function unassignDriver(Vehicle $vehicle, Driver $driver)
    {
        $vehicle->drivers()->detach($driver->id);
        return redirect()->route('vehicles.index')->with('success', 'Driver unassigned successfully.');
    }

    public function assignOwnerForm(Vehicle $vehicle)
    {
        $owners = Owner::all();
        return view('vehicles.assign_owner', compact('vehicle', 'owners'));
    }

    public function assignOwner(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
        ]);

        $vehicle->owners()->attach($request->owner_id);
        return redirect()->route('vehicles.index')->with('success', 'Owner assigned successfully.');
    }

    public function unassignOwner(Vehicle $vehicle, Owner $owner)
    {
        $vehicle->owners()->detach($owner->id);
        return redirect()->route('vehicles.index')->with('success', 'Owner unassigned successfully.');
    }
}
