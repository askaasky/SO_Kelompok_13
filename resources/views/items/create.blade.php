@extends('layouts.app')

@section('styles')

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/user/item-form.css') }}">

@endsection

@section('content')

<div class="item-form-container">

    {{-- Header --}}
    <div class="form-header">

        <h1>Posting Barang</h1>

        <p>
            Lengkapi informasi barang agar mahasiswa lain lebih mudah mengenali dan menghubungimu.
        </p>

    </div>

    {{-- Card --}}
    <div class="form-card">

        <form
            action="{{ route('items.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            {{-- Nama Barang --}}
            <div class="form-group">

                <label>Nama Barang</label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Contoh : Dompet Hitam"
                    required
                >

            </div>

            {{-- Deskripsi --}}
            <div class="form-group">

                <label>Deskripsi Barang</label>

                <textarea
                    name="description"
                    rows="6"
                    placeholder="Jelaskan warna, ciri-ciri, lokasi terakhir, isi barang, atau informasi lain yang membantu..."
                    required
                >{{ old('description') }}</textarea>

            </div>

            {{-- Upload Foto --}}
            <div class="form-group">

                <label>Foto Barang</label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                >

                <small>
                    JPG, PNG atau JPEG • Maksimal 2 MB
                </small>

            </div>

            <div class="form-grid">
                                {{-- Kategori --}}
                <div class="form-group">

                    <label>Kategori</label>

                    <select name="category_id" required>

                        <option value="">Pilih Kategori</option>

                        @foreach($categories as $cat)
                            <option
                                value="{{ $cat->id }}"
                                {{ old('category_id') == $cat->id ? 'selected' : '' }}
                            >
                                {{ $cat->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

                {{-- Lokasi --}}
                <div class="form-group">

                    <label>Lokasi Terakhir</label>

                    <select name="location_id" required>

                        <option value="">Pilih Lokasi</option>

                        @foreach($locations as $loc)
                            <option
                                value="{{ $loc->id }}"
                                {{ old('location_id') == $loc->id ? 'selected' : '' }}
                            >
                                {{ $loc->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

            {{-- Status --}}
            <div class="form-group">

                <label>Status Barang</label>

                <select name="status" required>

                    <option value="lost"
                        {{ old('status') == 'lost' ? 'selected' : '' }}>
                        🔴 Barang Hilang
                    </option>

                    <option value="found"
                        {{ old('status') == 'found' ? 'selected' : '' }}>
                        🟢 Barang Ditemukan
                    </option>

                </select>

            </div>

            {{-- Tombol --}}
            <div class="form-action">

                <a
                    href="{{ route('dashboard') }}"
                    class="btn-cancel"
                >
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="btn-submit"
                >
                    📤 Posting Barang
                </button>

            </div>

        </form>

    </div>

</div>

@endsection