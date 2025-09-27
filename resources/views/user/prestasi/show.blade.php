@extends('layouts.guest')

@section('title', 'Detail Prestasi')

@section('content')
<div class="page-title">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Detail Prestasi</h1>
    </div>
</div>

<section id="service-details" class="service-details section">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto" class="img-fluid services-img">
                <h3>{{ $prestasi->judul }}</h3>
                <p>{!! nl2br($prestasi->isi) !!}</p>
            </div>

            <div class="col-lg-4 ps-lg-5" data-aos="fade-up" data-aos-delay="100">
                <div class="service-box">
                    <h4>Prestasi Terbaru</h4>
                    <div class="services-list">
                        @foreach ($prestasiTerbaru as $item)
                            <a href="{{ route('guest.prestasi.detail', $item->id) }}"><i class="bi bi-arrow-right-circle"></i><span>{{ $item->judul }}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
