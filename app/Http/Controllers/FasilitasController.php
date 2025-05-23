<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'foto' => 'required|image|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        Fasilitas::create($data);

        return redirect()->route('fasilitas.index')->with('message', 'Fasilitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('fasilitas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'required',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($fasilitas->foto) {
                Storage::disk('public')->delete($fasilitas->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $fasilitas->update($data);

        return redirect()->route('fasilitas.index')->with('message', 'Fasilitas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        if ($fasilitas->foto) {
            Storage::disk('public')->delete($fasilitas->foto);
        }
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('message', 'Fasilitas berhasil dihapus');
    }
}
