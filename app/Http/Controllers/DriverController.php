<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nif_cif' => 'required|string|max:255|unique:drivers',
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $driver = new Driver();
        $driver->name = $request->name;
        $driver->nif_cif = $request->nif_cif;
        $driver->direccion = $request->direccion;
        $driver->codigo_postal = $request->codigo_postal;
        $driver->provincia = $request->provincia;
        $driver->localidad = $request->localidad;
        $driver->telefono = $request->telefono;
        $driver->password = Hash::make($request->password); // Hashear la contraseña
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver created successfully');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'nif_cif' => 'required|string|max:255|unique:drivers,nif_cif,' . $driver->id,
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $driver->name = $request->name;
        $driver->nif_cif = $request->nif_cif;
        $driver->direccion = $request->direccion;
        $driver->codigo_postal = $request->codigo_postal;
        $driver->provincia = $request->provincia;
        $driver->localidad = $request->localidad;
        $driver->telefono = $request->telefono;
        if ($request->filled('password')) {
            $driver->password = Hash::make($request->password); // Hashear la contraseña si se proporciona
        }
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }
}
