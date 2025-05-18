<?php

namespace App\Http\Controllers;

use App\Models\ProgramUnggulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramUnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programUnggulan = ProgramUnggulan::latest()->get();
        return view('admin.program-unggulan.index', compact('programUnggulan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program-unggulan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'foto' => 'required|image|max:2048',
            'isi' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        ProgramUnggulan::create($data);

        return redirect()->route('program-unggulan.index')->with('message', 'Program Unggulan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('program-unggulan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programUnggulan = ProgramUnggulan::findOrFail($id);
        return view('admin.program-unggulan.edit', compact('programUnggulan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|max:2048',
            'isi' => 'required',
        ]);

        $programUnggulan = ProgramUnggulan::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($programUnggulan->foto) {
                Storage::disk('public')->delete($programUnggulan->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $programUnggulan->update($data);

        return redirect()->route('program-unggulan.index')->with('message', 'Program Unggulan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $programUnggulan = ProgramUnggulan::findOrFail($id);
        if ($programUnggulan->foto) {
            Storage::disk('public')->delete($programUnggulan->foto);
        }
        $programUnggulan->delete();
        return redirect()->route('program-unggulan.index')->with('message', 'Program Unggulan berhasil dihapus');
    }
}
