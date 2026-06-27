@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin-form.css') }}">
@endpush

@section('content')

<h1 class="page-title">
    Tambah Kategori
</h1>

<div class="form-card">

    <form action="{{ route('admin.categories.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Nama Kategori</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama kategori..."
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

            <a href="{{ route('admin.categories.index') }}" class="btn-back">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection