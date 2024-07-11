<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nif_cif' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        Owner::create($request->all());

        return redirect()->route('owners.index')->with('success', 'Propietario creado correctamente');
    }

    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nif_cif' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        $owner->update($request->all());

        return redirect()->route('owners.index')->with('success', 'Propietario actualizado correctamente');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success', 'Propietario eliminado correctamente');
    }
}
