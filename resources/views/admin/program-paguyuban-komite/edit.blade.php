@extends('layouts.admin')

@section('title', 'Edit Program Paguyuban/Komite')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
<h1 class="h3 mb-3 text-gray-800"><a href="{{ route('program-paguyuban-komite.index') }}" class="text-dark"><i class="fas fa-fw fa-arrow-left mr-3"></i></a> Edit Program Paguyuban/Komite</h1>

<form action="{{ route('program-paguyuban-komite.update', $programPaguyubanKomite->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="jenis">Jenis<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required value="{{ old('jenis', $programPaguyubanKomite->jenis) }}">
                @error('jenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="form-group">
                <label for="summernote">Keterangan<span class="text-danger">*</span></label>
                <textarea name="keterangan" id="summernote" rows="5" class="form-control @error('keterangan') is-invalid @enderror" required>{{ old('keterangan', $programPaguyubanKomite->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
