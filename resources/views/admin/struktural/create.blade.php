@extends('layouts.admin')

@section('title', 'Tambah Guru dan Staff')

@section('content')
<h1 class="h3 mb-3 text-gray-800">
    <a href="{{ route('guru-dan-staff.index') }}" class="text-dark">
        <i class="fas fa-fw fa-arrow-left mr-3"></i>
    </a>
    Tambah Guru dan Staff
</h1>

<form action="{{ route('guru-dan-staff.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror" required>
                @error('nama_lengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                    <option value="" selected disabled>-- Pilih --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="image">Foto<span class="text-danger">*</span></label>
                <input type="file" onchange="previewImage()" class="form-control @error('foto') is-invalid @enderror" id="image" name="foto" required>
                @error('foto')
                    <div id="foto" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <img src="{{ asset('images/default-image.jpg') }}" alt="Default Image" class="img-thumbnail img-preview mt-2" width="200">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>NIY</label>
                <input type="text" name="nip" value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror">
                @error('nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" required>
                @error('pendidikan_terakhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Jabatan <span class="text-danger">*</span></label>
                <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control @error('jabatan') is-invalid @enderror" required>
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label>Tanggal Mulai Kerja <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_mulai_kerja" value="{{ old('tanggal_mulai_kerja') }}" class="form-control @error('tanggal_mulai_kerja') is-invalid @enderror" required>
                @error('tanggal_mulai_kerja')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            {{-- <div class="form-group mt-3">
                <label>Status Pegawai <span class="text-danger">*</span></label>
                <input type="text" name="status_pegawai" value="{{ old('status_pegawai') }}" class="form-control @error('status_pegawai') is-invalid @enderror" required>
                @error('status_pegawai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4 mb-5">Simpan</button>
</form>
@endsection

@push('script')
    <script src="{{ asset('js/imgpreview.js') }}"></script>
@endpush
