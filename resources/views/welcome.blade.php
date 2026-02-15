<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portfolio Saya') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            color: white;
        }

        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-portfolio {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card-portfolio:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MyPortfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Proyek</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                </ul>

                <div class="d-flex">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section text-center">
        <div class="container">
            <img src="https://placehold.co/200x200/png?text=Me" alt="Profile" class="rounded-circle profile-img mb-4">
            <h1 class="display-4 fw-bold">Halo, Saya Developer!</h1>
            <p class="lead mb-4">Membangun aplikasi web modern dengan Laravel & Bootstrap.</p>
            <a href="#projects" class="btn btn-light btn-lg px-4 gap-3">Lihat Karya Saya</a>
        </div>
    </header>

    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Tentang Saya</h2>
                    <p class="text-muted">
                        Saya adalah seorang pengembang web yang bersemangat dalam menciptakan pengalaman pengguna yang
                        intuitif dan dinamis. Dengan keahlian di Laravel, saya fokus pada penulisan kode yang bersih dan
                        efisien.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Fullstack Web
                            Development</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Laravel Expert</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Database Management
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://placehold.co/500x300/e9ecef/495057?text=Coding+Image"
                        class="img-fluid rounded-3 shadow" alt="About Image">
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Portfolio Terbaru</h2>
                <p class="text-muted">Beberapa proyek yang telah saya kerjakan.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-portfolio h-100">
                        <img src="https://placehold.co/600x400/0d6efd/ffffff?text=E-Commerce" class="card-img-top"
                            alt="Project 1">
                        <div class="card-body">
                            <h5 class="card-title">Toko Online Laravel</h5>
                            <p class="card-text text-muted">Aplikasi e-commerce lengkap dengan fitur keranjang belanja
                                dan payment gateway.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-portfolio h-100">
                        <img src="https://placehold.co/600x400/198754/ffffff?text=Sistem+Akademik" class="card-img-top"
                            alt="Project 2">
                        <div class="card-body">
                            <h5 class="card-title">Sistem Informasi Sekolah</h5>
                            <p class="card-text text-muted">Manajemen data siswa, guru, dan nilai menggunakan Laravel
                                12.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-portfolio h-100">
                        <img src="https://placehold.co/600x400/dc3545/ffffff?text=Company+Profile"
                            class="card-img-top" alt="Project 3">
                        <div class="card-body">
                            <h5 class="card-title">Company Profile</h5>
                            <p class="card-text text-muted">Website profil perusahaan yang responsif dan SEO friendly.
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 text-center" id="contact">
        <div class="container">
            <div class="mb-3">
                <a href="#" class="text-white me-3 fs-5"><i class="bi bi-github"></i></a>
                <a href="#" class="text-white me-3 fs-5"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-white me-3 fs-5"><i class="bi bi-twitter-x"></i></a>
            </div>
            <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. Dibuat dengan Laravel 12 & Bootstrap
                5.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
