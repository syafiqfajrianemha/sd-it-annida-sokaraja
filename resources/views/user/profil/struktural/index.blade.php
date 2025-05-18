@extends('layouts.guest')

@section('title', 'Struktural')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/default-image.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Struktural
            <br>
            SD Islam Terpadu Annida Sokaraja
        </h1>
    </div>
</section>

<section>
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Struktural<br></span>
        <h2>Struktural</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center bg-primary text-white py-2 rounded-top">
                    <span><strong>SD IT ANNIDA SOKARAJA</strong></span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Tanggal Mulai Kerja</th>
                                <th>Status Pegawai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($struktural as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td class="text-center">
                                        {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->pendidikan_terakhir }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai_kerja)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $item->status_pegawai }}</td>
                                </tr>
                            @endforeach

                            @if ($struktural->isEmpty())
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
                    <span><strong>KOMITE</strong></span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($strukturalKomite as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @endforeach

                            @if ($strukturalKomite->isEmpty())
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
@endsection
