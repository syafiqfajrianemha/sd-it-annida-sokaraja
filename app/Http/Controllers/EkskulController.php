<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekskul = Ekskul::latest()->get();
        return view('admin.ekskul.index', compact('ekskul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ekskul.create');
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

        Ekskul::create($data);

        return redirect()->route('ekskul.index')->with('message', 'Ektrakulikuler berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('ekskul.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('admin.ekskul.edit', compact('ekskul'));
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

        $ekskul = Ekskul::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($ekskul->foto) {
                Storage::disk('public')->delete($ekskul->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $ekskul->update($data);

        return redirect()->route('ekskul.index')->with('message', 'Ektrakulikuler berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        if ($ekskul->foto) {
            Storage::disk('public')->delete($ekskul->foto);
        }
        $ekskul->delete();
        return redirect()->route('ekskul.index')->with('message', 'Ekstrakulikuler berhasil dihapus');
    }

    public function guest()
    {
        $ekskul = Ekskul::latest()->get();
        return view('user.ekskul.index', compact('ekskul'));
    }
}
