<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | ELDIEF</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/user/login.css') }}">
</head>

<body>

<div class="wrapper">

    <div class="login-container">

        <div class="left-panel">

            <div class="badge">
                <img src="{{ asset('images/uho.jpg') }}" alt="UHO">
                <span>Universitas Halu Oleo</span>
            </div>

            <div class="brand-header">

            <div class="logo">
                <img src="{{ asset('images/dokja.jpg') }}" alt="Logo UHO">
            </div>

            <h1>ELDIEF</h1>

            </div>
            <h2>Lost & Found Campus</h2>
            <p class="description">
                Jangan panik kalau barangmu hilang. Lapor di ELDIEF, siapa tahu udah ada yang nemuin
            </p>

            <div class="info-list">

                <div class="info-item">

                    <h3>Pelaporan Barang</h3>

                    <p>
                        Laporkan barang hilang maupun
                        barang yang ditemukan.
                    </p>

                </div>

                <div class="info-item">

                    <h3>Pencarian Cepat</h3>

                    <p>
                        Temukan pemilik barang melalui
                        sistem secara digital.
                    </p>

                </div>

            </div>

        </div>

        <div class="right-panel">

            <div class="login-card">

                <h2>
                    Selamat Datang
                </h2>

                <p class="subtitle">
                    Masuk ke akun ELDIEF untuk melanjutkan.
                </p>

                <form method="POST" action="/login">

                    @csrf

                    <div class="input-group">

                        <label>NIM</label>

                        <input
                            type="text"
                            name="nim"
                            placeholder="Masukkan NIM"
                            required
                        >

                    </div>
                                        <div class="input-group">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Masukkan Password"
                            required
                        >

                    </div>

                    <button type="submit">
                        Login
                    </button>

                </form>

                <div class="divider"></div>

                <div class="footer">

                    <p>
                        © {{ date('Y') }}
                        <strong>ELDIEF</strong>
                    </p>

                    <span>
                        Lost & Found Universitas Halu Oleo
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>