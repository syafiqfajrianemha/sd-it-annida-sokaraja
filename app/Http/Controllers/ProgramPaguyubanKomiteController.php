<?php

namespace App\Http\Controllers;

use App\Models\ProgramPaguyubanKomite;
use Illuminate\Http\Request;

class ProgramPaguyubanKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programPaguyubanKomite = ProgramPaguyubanKomite::latest()->get();
        return view('admin.program-paguyuban-komite.index', compact('programPaguyubanKomite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program-paguyuban-komite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        ProgramPaguyubanKomite::create($data);

        return redirect()->route('program-paguyuban-komite.index')->with('message', 'Program Paguyuban Komite berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('program-paguyuban-komite.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programPaguyubanKomite = ProgramPaguyubanKomite::findOrFail($id);
        return view('admin.program-paguyuban-komite.edit', compact('programPaguyubanKomite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $programPaguyubanKomite = ProgramPaguyubanKomite::findOrFail($id);

        $programPaguyubanKomite->update($data);

        return redirect()->route('program-paguyuban-komite.index')->with('message', 'Program Paguyuban Komite berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $programPaguyubanKomite = ProgramPaguyubanKomite::findOrFail($id);
        $programPaguyubanKomite->delete();
        return redirect()->route('program-paguyuban-komite.index')->with('message', 'Program Paguyuban Komite berhasil dihapus');
    }
}
