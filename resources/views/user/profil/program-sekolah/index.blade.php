@extends('layouts.guest')

@section('title', 'Program Sekolah')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Program Sekolah
            <br>
            SD Islam Terpadu Annida Sokaraja
        </h1>
    </div>
</section>

<section>
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Program Sekolah<br></span>
        <h2>Program Sekolah</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center bg-primary text-white py-2 rounded-top">
                    <span><strong>PROGRAM UNGGULAN</strong></span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Program</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programUnggulan as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Program Unggulan" width="200">
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{!! nl2br($item->isi) !!}</td>
                                </tr>
                            @endforeach

                            @if ($programUnggulan->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="text-center bg-warning text-white py-2 rounded-top">
                    <span><strong>PROGRAM PAGUYUBAN/KOMITE</strong></span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programPaguyubanKomite as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{!! nl2br($item->keterangan) !!}</td>
                                </tr>
                            @endforeach

                            @if ($programPaguyubanKomite->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <img src="{{ asset('images/program-harian.png') }}" class="img-thumbnail" alt="Program Harian">
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/program-mingguan.png') }}" class="img-thumbnail" alt="Program Mingguan">
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <img src="{{ asset('images/program-bulanan.png') }}" class="img-thumbnail" alt="Program Bulanan">
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/program-semester.png') }}" class="img-thumbnail" alt="Program Semester">
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <img src="{{ asset('images/program-tahunan.png') }}" class="img-thumbnail" alt="Program Tahunan">
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/program-insidental.png') }}" class="img-thumbnail" alt="Program Insidental">
            </div>
        </div>
    </div>
</section>
@endsection
