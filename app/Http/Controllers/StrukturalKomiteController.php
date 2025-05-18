<?php

namespace App\Http\Controllers;

use App\Models\StrukturalKomite;
use Illuminate\Http\Request;

class StrukturalKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strukturalKomite = StrukturalKomite::latest()->get();
        return view('admin.struktural-komite.index', compact('strukturalKomite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.struktural-komite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        StrukturalKomite::create($request->all());

        return redirect()->route('struktural-komite.index')->with('message', 'Struktural Komite berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('struktural-komite.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $strukturalKomite = StrukturalKomite::findOrFail($id);
        return view('admin.struktural-komite.edit', compact('strukturalKomite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        $strukturalKomite = StrukturalKomite::findOrFail($id);

        $strukturalKomite->update($request->all());

        return redirect()->route('struktural-komite.index')->with('message', 'Struktural Komite berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $strukturalKomite = StrukturalKomite::findOrFail($id);
        $strukturalKomite->delete();
        return redirect()->route('struktural-komite.index')->with('message', 'Struktural Komite berhasil dihapus');
    }
}
