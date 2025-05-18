<?php

namespace App\Http\Controllers;

use App\Models\ProgramPaguyubanKomite;
use App\Models\ProgramUnggulan;
use App\Models\Struktural;
use App\Models\StrukturalKomite;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function visimisi()
    {
        $visimisi = VisiMisi::latest()->get();
        return view('user.profil.visi-dan-misi.index', compact('visimisi'));
    }

    public function identitassekolah()
    {
        return view('user.profil.identitas-sekolah.index');
    }

    public function struktural()
    {
        $struktural = Struktural::latest()->get();
        $strukturalKomite = StrukturalKomite::latest()->get();
        return view('user.profil.struktural.index', compact('struktural', 'strukturalKomite'));
    }

    public function programSekolah()
    {
        $programUnggulan = ProgramUnggulan::latest()->get();
        $programPaguyubanKomite = ProgramPaguyubanKomite::latest()->get();
        return view('user.profil.program-sekolah.index', compact('programUnggulan', 'programPaguyubanKomite'));
    }
}
