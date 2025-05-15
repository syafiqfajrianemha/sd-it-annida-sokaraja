<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'foto' => 'required|image|max:2048',
            'isi' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        Prestasi::create($data);

        return redirect()->route('prestasi.index')->with('message', 'Prestasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('prestasi.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'foto' => 'nullable|image|max:2048',
            'isi' => 'required',
        ]);

        $prestasi = Prestasi::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('prestasi.index')->with('message', 'Prestasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }
        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('message', 'Prestasi berhasil dihapus');
    }

    public function guest()
    {
        $prestasi = Prestasi::latest()->get();
        return view('user.prestasi.index', compact('prestasi'));
    }
}
