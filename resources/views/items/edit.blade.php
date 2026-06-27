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

        <span class="form-badge">
            ✏️ Edit Laporan
        </span>

    </div>

    <div class="form-card">

        <form
            action="{{ route('items.update',$item->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            {{-- Nama Barang --}}
            <div class="form-group">

                <label>Nama Barang</label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title',$item->title) }}"
                    required
                >

            </div>

            {{-- Deskripsi --}}
            <div class="form-group">

                <label>Deskripsi Barang</label>

                <textarea
                    name="description"
                    rows="6"
                    required
                >{{ old('description',$item->description) }}</textarea>

            </div>

            <div class="form-grid">

                {{-- Kategori --}}
                <div class="form-group">

                    <label>Kategori</label>

                    <select name="category_id" required>

                        @foreach($categories as $cat)

                            <option
                                value="{{ $cat->id }}"
                                {{ old('category_id',$item->category_id)==$cat->id ? 'selected' : '' }}
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

                        @foreach($locations as $loc)

                            <option
                                value="{{ $loc->id }}"
                                {{ old('location_id',$item->location_id)==$loc->id ? 'selected' : '' }}
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

                    <option
                        value="lost"
                        {{ old('status',$item->status)=='lost' ? 'selected' : '' }}
                    >
                        🔴 Barang Hilang
                    </option>

                    <option
                        value="found"
                        {{ old('status',$item->status)=='found' ? 'selected' : '' }}
                    >
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
                    ← Batal
                </a>

                <button
                    type="submit"
                    class="btn-submit"
                >
                    💾 Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection