@extends('layouts.admin')

@section('title', 'Edit Brosur PPDB')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<h1 class="h3 mb-3 text-gray-800"><a href="{{ route('ppdb.index') }}" class="text-dark"><i class="fas fa-fw fa-arrow-left mr-3"></i></a> Edit Brosur PPDB</h1>

<form action="{{ route('ppdb.update', $ppdb->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran" required value="{{ old('tahun_ajaran', $ppdb->tahun_ajaran) }}">
                @error('tahun_ajaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="image">Brosur</label>
                <input type="file" onchange="previewImage()" class="form-control @error('brosur') is-invalid @enderror" id="image" name="brosur">
                @error('brosur')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @if ($ppdb->brosur)
                    <img src="{{ asset('storage/' . $ppdb->brosur) }}" alt="brosur" class="img-thumbnail img-preview mt-2" width="200">
                @endif
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mb-5">Update</button>
</form>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#summernote').summernote({
            height: 300
        });
    </script>
    <script src="{{ asset('js/imgpreview.js') }}"></script>
@endpush
