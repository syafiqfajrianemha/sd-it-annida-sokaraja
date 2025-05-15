<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\SambutanKepalaSekolah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sambutan = SambutanKepalaSekolah::latest()->get();
        $prestasi = Prestasi::latest()->limit(3)->get();
        $berita = Berita::latest()->limit(3)->get();
        return view('user.home.index', compact('sambutan', 'prestasi', 'berita'));
    }
}
