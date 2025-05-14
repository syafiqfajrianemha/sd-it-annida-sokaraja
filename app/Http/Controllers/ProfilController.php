<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visimisi()
    {
        $visimisi = VisiMisi::latest()->first();
        return view('user.profil.visi-dan-misi.index', compact('visimisi'));
    }
}
