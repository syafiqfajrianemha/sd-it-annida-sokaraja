@extends('layouts.admin')

@section('title', 'Guru dan Staff')

@push('style')
    <link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div id="flash-data" data-flashdata="{{ session('message') }}"></div>

<h1 class="h3 mb-3 text-gray-800">Guru dan Staff</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('guru-dan-staff.create') }}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>NIY</th>
                        <th>L/P</th>
                        <th>Jabatan</th>
                        <th>Pendidikan Terakhir</th>
                        {{-- <th>Tanggal Mulai Kerja</th> --}}
                        {{-- <th>Status Pegawai</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($struktural as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $item->foto != null ? asset('storage/' . $item->foto) : asset('images/default-image.jpg') }}" alt="Foto Guru" width="150">
                            </td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nip ?? '-' }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->pendidikan_terakhir }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai_kerja)->format('d-m-Y') }}</td> --}}
                            {{-- <td>{{ $item->status_pegawai }}</td> --}}
                            <td>
                                <a href="{{ route('guru-dan-staff.edit', $item->id) }}" class="btn btn-success btn-sm mb-1">Edit</a>

                                <form action="{{ route('guru-dan-staff.destroy', $item->id) }}" method="POST" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/datatables.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
