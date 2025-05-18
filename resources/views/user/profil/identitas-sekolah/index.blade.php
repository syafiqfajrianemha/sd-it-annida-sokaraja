@extends('layouts.guest')

@section('title', 'Identitas Sekolah')

@section('content')
<section class="jumbotron text-white text-center d-flex align-items-center"
    style="background-image: url('{{ asset('images/default-image.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Identitas Sekolah
            <br>
            SD Islam Terpadu Annida Sokaraja
        </h1>
    </div>
</section>

<section>
    <div class="container section-title mb-0" data-aos="fade-up">
        <span>Identitas Sekolah<br></span>
        <h2>Identitas Sekolah</h2>
    </div>

    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center bg-warning text-white py-2 rounded-top">
                    <span><strong>SD IT ANNIDA SOKARAJA</strong></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">NPSN</th>
                                <td>20341614</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>Swasta</td>
                            </tr>
                            <tr>
                                <th scope="row">Bentuk Pendidikan</th>
                                <td>SD</td>
                            </tr>
                            <tr>
                                <th scope="row">Status Kepemilikan</th>
                                <td>Yayasan</td>
                            </tr>
                            <tr>
                                <th scope="row">SK Pendirian Sekolah</th>
                                <td>01-A/SK.A/YA.ND/I-06</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal SK Pendirian</th>
                                <td>2006-01-30</td>
                            </tr>
                            <tr>
                                <th scope="row">SK Izin Operasional</th>
                                <td>070/361/2010</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal SK Izin Operasional</th>
                                <td>2010-01-01</td>
                            </tr>
                            <tr>
                                <th scope="row">Sumber</th>
                                <td>
                                    <a href="https://dapo.dikdasmen.go.id/sekolah/9F355A17964F8E7BDD7F" target="_blank">
                                        Lihat di Dapodik
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
