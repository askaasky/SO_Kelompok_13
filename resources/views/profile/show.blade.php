@extends('layouts.app')

@section('styles')

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">

@endsection

@section('content')

<div class="profile-container">
    {{-- Header Profil --}}
    <div class="profile-header">

        <div class="profile-left">

            <div class="profile-avatar">
                {{ strtoupper(substr($user->display_name,0,1)) }}
            </div>

            <div class="profile-info">

                <h2>{{ $user->display_name }}</h2>

                <span class="profile-role">
                    Mahasiswa Universitas Halu Oleo
                </span>

                <div class="profile-meta">

                    <div>
                        <strong>{{ $items->count() }}</strong>
                        <span>Total Postingan</span>
                    </div>

                    <div>
                        <strong>{{ $items->where('status','lost')->count() }}</strong>
                        <span>Barang Hilang</span>
                    </div>

                    <div>
                        <strong>{{ $items->where('status','found')->count() }}</strong>
                        <span>Barang Ditemukan</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Judul --}}
    <div class="section-title">

        <h3>Postingan Saya</h3>

        <p>
            Semua barang yang pernah kamu laporkan akan muncul di sini.
        </p>

    </div>

    {{-- List Postingan --}}
    <div class="profile-posts">

        @forelse($items as $item)

        <div class="profile-card">

            @if($item->image_path)

                <img
                    src="{{ asset('storage/'.$item->image_path) }}"
                    class="profile-image"
                    alt="{{ $item->title }}"
                >

            @endif

            <div class="profile-body">

                <div class="profile-card-top">

                    <div>

                        <h3>{{ $item->title }}</h3>

                        <small>
                            {{ $item->created_at->diffForHumans() }}
                        </small>

                    </div>

                    <span class="status {{ $item->status }}">
                        {{ strtoupper($item->status) }}
                    </span>

                </div>

                <p class="profile-desc">
                    {{ $item->description }}
                </p>

                <div class="profile-info-row">

                    <span>📂 {{ $item->category->name ?? '-' }}</span>

                    <span>📍 {{ $item->location->location_name ?? '-' }}</span>

                </div>
                                @if($item->user_id === auth()->id())

                <div class="profile-actions">

                    <a
                        href="{{ route('items.edit',$item->id) }}"
                        class="edit-btn"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('items.destroy',$item->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus postingan ini?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-btn"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

                @endif

            </div>

        </div>

        @empty

        <div class="empty-post">

            <h3>Belum Ada Postingan</h3>

            <p>
                Kamu belum pernah membuat laporan barang hilang ataupun ditemukan.
            </p>

            <a
                href="{{ route('items.create') }}"
                class="create-btn"
            >
                + Buat Postingan Pertama
            </a>

        </div>

        @endforelse

    </div>

</div>

@endsection