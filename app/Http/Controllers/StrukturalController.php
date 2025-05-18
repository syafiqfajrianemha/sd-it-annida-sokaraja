<?php

namespace App\Http\Controllers;

use App\Models\Struktural;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struktural = Struktural::latest()->get();
        return view('admin.struktural.index', compact('struktural'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.struktural.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'tanggal_mulai_kerja' => 'required|date',
            'status_pegawai' => 'required|string|max:255',
        ]);

        Struktural::create($request->all());

        return redirect()->route('struktural.index')->with('message', 'Struktural berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('struktural.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $struktural = Struktural::findOrFail($id);
        return view('admin.struktural.edit', compact('struktural'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'tanggal_mulai_kerja' => 'required|date',
            'status_pegawai' => 'required|string|max:255',
        ]);

        $struktural = Struktural::findOrFail($id);

        $struktural->update($request->all());

        return redirect()->route('struktural.index')->with('message', 'Struktural berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $struktural = Struktural::findOrFail($id);
        $struktural->delete();
        return redirect()->route('struktural.index')->with('message', 'Struktural berhasil dihapus');
    }
}
