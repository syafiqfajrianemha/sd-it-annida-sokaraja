<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ppdb = Ppdb::latest()->get();
        return view('admin.ppdb.index', compact('ppdb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Ppdb::get()->count() >= 1) {
            return redirect()->route('ppdb.index');
        }
        return view('admin.ppdb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Ppdb::get()->count() >= 1) {
            return redirect()->route('ppdb.index');
        }

        $data = $request->validate([
            'brosur' => 'required|image|max:2048',
            'tahun_ajaran' => 'required',
        ]);

        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->store('images', 'public');
        }

        Ppdb::create($data);

        return redirect()->route('ppdb.index')->with('message', 'Brosur PPDB berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('ppdb.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'brosur' => 'nullable|image|max:2048',
            'tahun_ajaran' => 'required',
        ]);

        $ppdb = Ppdb::findOrFail($id);

        if ($request->hasFile('brosur')) {
            if ($ppdb->brosur) {
                Storage::disk('public')->delete($ppdb->brosur);
            }
            $data['brosur'] = $request->file('brosur')->store('images', 'public');
        }

        $ppdb->update($data);

        return redirect()->route('ppdb.index')->with('message', 'Brosur PPDB berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        if ($ppdb->brosur) {
            Storage::disk('public')->delete($ppdb->brosur);
        }
        $ppdb->delete();
        return redirect()->route('ppdb.index')->with('message', 'Brosur PPDB berhasil dihapus');
    }

    public function guest()
    {
        $ppdb = Ppdb::latest()->get();
        return view('user.ppdb.index', compact('ppdb'));
    }
}
