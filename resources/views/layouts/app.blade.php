<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ELDIEF</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="{{ asset('css/user/app.css') }}">

@yield('styles')

</head>

<body>

<nav class="navbar">

    <div class="logo-title">
    <img src="{{ asset('images/uho.jpg') }}" class="uho-logo">

    <img src="{{ asset('images/dokja.jpg') }}" class="brand-logo">

    <span>ELDIEF</span>
    </div>

    <a href="{{ route('dashboard') }}" class="logout-nav">
        ← Dashboard
    </a>

</nav>

<div class="p-6">

    @yield('content')

</div>

</body>
</html>