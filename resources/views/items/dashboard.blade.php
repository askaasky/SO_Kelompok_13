<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | ELDIEF</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/user/dashboard.css') }}">
</head>

<body>

<div class="wrapper">

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="nav-left">

            <img src="{{ asset('images/uho.jpg') }}" class="uho-logo">

            <img src="{{ asset('images/dokja.jpg') }}" class="brand-logo">

            <span class="brand-name">
                ELDIEF
            </span>

        </div>

        <div class="nav-center">

            <form action="{{ route('dashboard') }}" method="GET">

                <input
                    type="text"
                    name="q"
                    placeholder="Cari barang..."
                    value="{{ request('q') }}"
                >

            </form>

        </div>

        <div class="nav-right">

            <a href="{{ route('profile.show', auth()->id()) }}" class="profile-mini">

                {{ strtoupper(substr(auth()->user()->display_name,0,1)) }}

            </a>

        </div>

    </nav>



    <div class="dashboard">

        <!-- SIDEBAR -->

        <aside class="sidebar">

            <div class="profile-card">

                <div class="avatar">

                    {{ strtoupper(substr(auth()->user()->display_name,0,1)) }}

                </div>

                <h3>

                    {{ auth()->user()->display_name }}

                </h3>

                <p>{{ auth()->user()->nim }}</p>

                <a href="{{ route('profile.show', auth()->id()) }}" class="profile-btn">

                    Lihat Profil

                </a>

            </div>



            <div class="stats-card">

                <h4>Statistik</h4>

                <div class="stat">

                    <span>Total Postingan</span>

                    <strong>{{ auth()->user()->items()->count() }}</strong>

                </div>

                <div class="stat">

                    <span>Barang Hilang</span>

                    <strong>{{ $lostCount }}</strong>

                </div>

                <div class="stat">

                    <span>Barang Ditemukan</span>

                    <strong>{{ $foundCount }}</strong>

                </div>

            </div>
            <div class="sidebar-actions">
                <a href="{{ route('items.create') }}" class="post-btn">
                    + Posting Barang
                </a>

            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <button class="logout-btn">
                    Logout
                </button>
            </form>
            </div>

        </aside>

        <!-- CONTENT -->

        <main class="content">
            <div class="card-grid">

                @forelse($items as $item)

                <div class="item-card">

                    @if($item->image_path)

                    <img
                        src="{{ asset('storage/'.$item->image_path) }}"
                        class="item-image"
                    >

                    @else

                    <div class="image-placeholder">

                        Tidak ada gambar

                    </div>

                    @endif
                                        <div class="item-body">

                        <div class="item-top">

                            <div>

                                <h3 class="item-title">

                                    {{ $item->title }}

                                </h3>

                                <span class="item-time">

                                    {{ $item->created_at->diffForHumans() }}

                                </span>

                            </div>

                            <span class="status {{ $item->status }}">

                                {{ strtoupper($item->status) }}

                            </span>

                        </div>

                        <p class="item-desc">

                            {{ Str::limit($item->description, 150) }}

                        </p>

                        <div class="item-info">

                            <span>
                                📂 {{ $item->category->name ?? '-' }}
                            </span>

                            <span>
                                📍 {{ $item->location->name ?? '-' }}
                            </span>

                        </div>

                        <div class="item-footer">

                            <div class="user-info">

                                <div class="mini-avatar">

                                    {{ strtoupper(substr($item->user->display_name,0,1)) }}

                                </div>

                                <div>

                                    <strong>

                                        {{ $item->user->display_name }}

                                    </strong>

                                    <small>

                                        {{ $item->user->phone }}

                                    </small>

                                </div>

                            </div>

                            @if($item->user_id==auth()->id())

                            <div class="card-action">

                                <a
                                    href="{{ route('items.edit',$item->id) }}"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('items.destroy',$item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus postingan?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button class="delete-btn">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                            @endif

                        </div>

                    </div>

                </div>

                @empty

                <div class="empty-card">

                    <h3>

                        Belum ada postingan.

                    </h3>

                    <p>

                        Jadilah yang pertama membagikan informasi barang
                        hilang atau ditemukan.

                    </p>

                    <a
                        href="{{ route('items.create') }}"
                        class="post-btn"
                    >
                        + Posting Barang
                    </a>

                </div>

                @endforelse

            </div>

        </main>

    </div>

</div>

</body>
</html>