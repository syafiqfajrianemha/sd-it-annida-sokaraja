@extends('layouts.guest')

@section('title', 'PPDB')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Selamat Datang Calon Peserta Didik Baru
            <br>
            SD Islam Terpadu Annida Sokaraja
        </h1>
    </div>
</section>

<section>
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Informasi<br></span>
        <h2>Informasi</h2>
    </div>

    <div class="container">
        <div class="row gy-4">
            @forelse ($ppdb as $item)
                <div class="col-lg position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center bg-warning text-white py-2">
                        <span>Tahun Ajaran {{ $item->tahun_ajaran }}</span>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $item->brosur) }}" class="img-thumbnail mt-4" alt="Brosur">
                    </div>
                </div>
            @empty
                <p class="text-center text-danger">Belum ada informasi PPDB.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
