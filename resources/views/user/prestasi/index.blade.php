@extends('layouts.guest')

@section('title', 'Prestasi')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/default-image.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Prestasi
            <br>
            SD Islam Terpadu Annida Sokaraja
        </h1>
    </div>
</section>

<section>
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Prestasi<br></span>
        <h2>Prestasi</h2>
    </div>

    <div class="container">
        <div class="row gy-4">
            @forelse ($prestasi as $item)
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="card flex-md-row border-0 shadow">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded h-100 w-100 object-fit-cover"
                                alt="Foto" style="max-height: 250px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center col-md-8">
                            <h3 class="h3">{{ $item->judul }}</h3>
                            <p class="card-text text-justify" style="text-align: justify;">
                                {!! nl2br($item->isi) !!}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-danger">Belum ada data prestasi.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
