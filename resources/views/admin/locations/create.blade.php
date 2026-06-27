@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin-form.css') }}">
@endpush

@section('content')

<h1 class="page-title">
    Tambah Lokasi
</h1>

<div class="form-card">

    <form action="{{ route('admin.locations.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Nama Lokasi</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama lokasi..."
                required
            >

            @error('name')
                <small style="color:#ef4444; margin-top:8px;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <div class="form-actions">

            <button type="submit" class="btn-save">
                Simpan
            </button>

            <a href="{{ route('admin.locations.index') }}" class="btn-back">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection