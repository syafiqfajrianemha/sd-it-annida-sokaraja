@extends('layouts.admin')

@section('title', 'Ekstrakulikuler')

@push('style')
    <link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div id="flash-data" data-flashdata="{{ session('message') }}"></div>

<h1 class="h3 mb-3 text-gray-800">Ekstrakulikuler</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('ekskul.create') }}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekskul as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Ekskul" width="200">
                            </td>
                            <td>{!! nl2br($item->deskripsi) !!}</td>
                            <td>
                                <a href="{{ route('ekskul.edit', $item->id) }}" class="btn btn-success btn-sm mb-1">Edit</a>

                                <form action="{{ route('ekskul.destroy', $item->id) }}" method="POST" class="d-inline form-delete">
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
