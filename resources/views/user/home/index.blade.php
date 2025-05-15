@extends('layouts.guest')

@section('title', 'Home')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/default-image.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di SD Islam Terpadu Annida Sokaraja</h1>
    </div>
</section>

<section class="pb-0">
    <div class="container">
        <div class="row">
            <div class="col position-relative align-self-start text-center" data-aos="fade-up"
                data-aos-delay="100">
                <img src="{{ asset('images/logo-slogan.svg') }}" class="img-fluid mb-4"
                    alt="Logo dengan Slogan">
                <p class="m-0">Cinta Al-Quran dan As-Sunah, Unggul dalam Teknologi Informasi</p>
                <p class="m-0">SDIT Annida Sokaraja? Religius, Cerdas, Humanis. Annida? Jaya. 3x</p>
            </div>
        </div>
    </div>
</section>

<section class="pb-0">
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Sambutan Kepala Sekolah<br></span>
        <h2>Sambutan Kepala Sekolah</h2>
    </div>

    <div class="container">
        @forelse ($sambutan as $item)
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid" alt="About Image">
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-justify">{!! nl2br($item->isi) !!}</p>
                </div>
            </div>
        @empty
            <p class="text-center text-danger">Belum ada Sambutan.</p>
        @endforelse
    </div>
</section>

<section class="pb-0">
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Prestasi Terbaru<br></span>
        <h2>Prestasi Terbaru</h2>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            @forelse ($prestasi as $item)
                <div class="col">
                    <div class="card h-100 shadow-sm" data-aos="fade-up">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                            alt="Gambar Prestasi">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-justify">{{ Str::limit(strip_tags($item->isi), 100) }}
                            </p>
                            <a href="#" class="btn btn-warning text-white btn-sm">Baca Selengkapnya</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-danger">Belum ada Prestasi.</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('guest.prestasi') }}" class="btn btn-warning text-white">Lihat Semua Prestasi</a>
        </div>
    </div>
</section>

<section class="pb-0">
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Berita Terbaru<br></span>
        <h2>Berita Terbaru</h2>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            @forelse ($berita as $item)
                <div class="col">
                    <div class="card h-100 shadow-sm" data-aos="fade-up">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                            alt="Gambar Berita">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-justify">{{ Str::limit(strip_tags($item->isi), 100) }}
                            </p>
                            <a href="#" class="btn btn-warning text-white btn-sm">Baca Selengkapnya</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-danger">Belum ada Berita.</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('guest.berita') }}" class="btn btn-warning text-center text-white">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<section>
    <div class="container" data-aos="fade-up">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.2125998852534!2d109.27227959999999!3d-7.441714100000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c04a4f4d4ad%3A0x2929705afcea301c!2sSD%20Islam%20Terpadu%20Annida%20Sokaraja!5e0!3m2!1sid!2sid!4v1747131657154!5m2!1sid!2sid"
            frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
@endsection
