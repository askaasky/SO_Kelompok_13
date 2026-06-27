<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AdminLocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('id', 'desc')->get();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.locations.index')
            ->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $location->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.locations.index')
            ->with('success', 'Lokasi berhasil diperbarui');
    }

    public function destroy(Location $location)
{
    try {
        $location->delete();

        return back()->with('success', 'Lokasi berhasil dihapus');

    } catch (QueryException $e) {

        return back()->with(
            'error',
            'Lokasi tidak dapat dihapus karena masih digunakan oleh data barang.'
        );
    }
}
}
