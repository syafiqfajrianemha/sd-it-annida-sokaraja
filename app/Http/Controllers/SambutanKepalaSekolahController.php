<?php

namespace App\Http\Controllers;

use App\Models\SambutanKepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SambutanKepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sambutan = SambutanKepalaSekolah::latest()->get();
        return view('admin.sambutan-kepala-sekolah.index', compact('sambutan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (SambutanKepalaSekolah::get()->count() >= 1) {
            return redirect()->route('sambutan-kepala-sekolah.index');
        }
        return view('admin.sambutan-kepala-sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (SambutanKepalaSekolah::get()->count() >= 1) {
            return redirect()->route('sambutan-kepala-sekolah.index');
        }

        $data = $request->validate([
            'foto' => 'required|image|max:2048',
            'isi' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        SambutanKepalaSekolah::create($data);

        return redirect()->route('sambutan-kepala-sekolah.index')->with('message', 'Sambutan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('sambutan-kepala-sekolah.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sambutan = SambutanKepalaSekolah::findOrFail($id);
        return view('admin.sambutan-kepala-sekolah.edit', compact('sambutan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'isi' => 'required',
        ]);

        $sambutan = SambutanKepalaSekolah::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($sambutan->foto) {
                Storage::disk('public')->delete($sambutan->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $sambutan->update($data);

        return redirect()->route('sambutan-kepala-sekolah.index')->with('message', 'Sambutan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sambutan = SambutanKepalaSekolah::findOrFail($id);
        if ($sambutan->foto) {
            Storage::disk('public')->delete($sambutan->foto);
        }
        $sambutan->delete();
        return redirect()->route('sambutan-kepala-sekolah.index')->with('message', 'Sambutan berhasil dihapus');
    }
}
