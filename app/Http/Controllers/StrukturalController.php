<?php

namespace App\Http\Controllers;

use App\Models\Struktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'nullable',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'foto' => 'required|image|max:2048',
            // 'tanggal_mulai_kerja' => 'required|date',
            // 'status_pegawai' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        Struktural::create($data);

        return redirect()->route('guru-dan-staff.index')->with('message', 'Guru dan Staff berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('guru-dan-staff.index');
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
        $data = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'nullable',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            // 'tanggal_mulai_kerja' => 'required|date',
            // 'status_pegawai' => 'required|string|max:255',
        ]);

        $struktural = Struktural::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($struktural->foto) {
                Storage::disk('public')->delete($struktural->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $struktural->update($data);

        return redirect()->route('guru-dan-staff.index')->with('message', 'Guru dan Staff berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $struktural = Struktural::findOrFail($id);
        $struktural->delete();
        return redirect()->route('guru-dan-staff.index')->with('message', 'Guru dan Staff berhasil dihapus');
    }
}
