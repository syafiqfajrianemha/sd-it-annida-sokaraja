@extends('layouts.admin')

@section('title', 'Edit Struktural Komite')

@section('content')
<h1 class="h3 mb-3 text-gray-800">
    <a href="{{ route('struktural-komite.index') }}" class="text-dark">
        <i class="fas fa-fw fa-arrow-left mr-3"></i>
    </a>
    Edit Struktural Komite
</h1>

<form action="{{ route('struktural-komite.update', $strukturalKomite->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-3">
                <label>Jabatan <span class="text-danger">*</span></label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $strukturalKomite->jabatan) }}" class="form-control @error('jabatan') is-invalid @enderror" required>
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>Nama <span class="text-danger">*</span></label>
                <input type="text" name="nama" value="{{ old('nama', $strukturalKomite->nama) }}" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4 mb-5">Update</button>
</form>
@endsection
