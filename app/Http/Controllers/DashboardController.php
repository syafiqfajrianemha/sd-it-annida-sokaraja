<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Prestasi;
use App\Models\SambutanKepalaSekolah;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'prestasiCount' => Prestasi::count(),
            'beritaCount' => Berita::count(),
            'ekstraCount' => Ekskul::count(),
            'akunCount' => User::count(),
            'sambutan' => SambutanKepalaSekolah::first()
        ]);
    }
}
