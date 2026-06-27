@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin-form.css') }}">
@endpush

@section('content')

<h1 class="page-title">
    Edit Kategori
</h1>

<div class="form-card">

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Nama Kategori</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $category->name) }}"
                required
            >

        </div>

        <div class="form-actions">

            <button type="submit" class="btn-save">
                Update
            </button>

            <a href="{{ route('admin.categories.index') }}" class="btn-back">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection