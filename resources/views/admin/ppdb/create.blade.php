@extends('layouts.admin')

@section('title', 'Tambah Brosur PPDB')

@section('content')
<h1 class="h3 mb-3 text-gray-800"><a href="{{ route('ppdb.index') }}" class="text-dark"><i class="fas fa-fw fa-arrow-left mr-3"></i></a> Tambah Brosur PPDB</h1>

<form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran" required>
                @error('tahun_ajaran')
                    <div id="tahun_ajaran" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="image">Brosur<span class="text-danger">*</span></label>
                <input type="file" onchange="previewImage()" class="form-control @error('brosur') is-invalid @enderror" id="image" name="brosur" required>
                @error('brosur')
                    <div id="brosur" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <img src="{{ asset('images/default-image.jpg') }}" alt="Default Image" class="img-thumbnail img-preview mt-2" width="200">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Simpan</button>
</form>
@endsection

@push('script')
    <script src="{{ asset('js/imgpreview.js') }}"></script>
@endpush
