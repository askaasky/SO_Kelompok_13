<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Lost & Found</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    @stack('styles')

</head>

<body>

<div class="admin-container">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="admin-logo">

            <img
                src="{{ asset('images/gojo.jpeg') }}"
                alt="Administrator"
            >

            <h3>Administrator</h3>

        </div>

        <nav class="sidebar-menu">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.items') }}">
                Postingan
            </a>

            <a href="{{ route('admin.categories.index') }}">
                Kategori
            </a>

            <a href="{{ route('admin.locations.index') }}">
                Lokasi
            </a>

            <a href="{{ route('admin.users.index') }}">
                Users
            </a>

        </nav>

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="logout-form"
        >
            @csrf

            <button
                type="submit"
                class="logout"
            >
                Logout
            </button>

        </form>

    </aside>

    {{-- MAIN --}}
    <main class="main-content">

        {{-- TOPBAR --}}
        <header class="topbar">

            <span>
                Dashboard Admin
            </span>

            <span class="admin-name">
                ELDIEF
            </span>

        </header>

        {{-- CONTENT --}}
        <div class="content">

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>