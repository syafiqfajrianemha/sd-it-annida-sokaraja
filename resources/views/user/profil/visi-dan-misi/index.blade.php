@extends('layouts.guest')

@section('title', 'Visi dan Misi')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/default-image.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Visi dan Misi
            <br>
            SD Islam Terpadu Annida Sokaraja
        </h1>
    </div>
</section>

<section>
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Visi dan Misi<br></span>
        <h2>Visi dan Misi</h2>
    </div>

    <div class="container">
        <div class="row gy-4">
            @forelse ($visimisi as $item)
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center bg-warning text-white py-2 rounded-top">
                        <span><strong>VISI</strong></span>
                    </div>
                    <p class="text-justify">{!! nl2br($item->visi) !!}</p>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center bg-warning text-white py-2 rounded-top">
                        <span>MISI</span>
                    </div>
                    <p class="text-justify">{!! nl2br($item->misi) !!}</p>
                </div>
            @empty
                <p class="text-center text-danger">Belum ada Visi dan Misi.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
