<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portfolio Saya') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --glass-bg: rgba(255, 255, 255, 0.8);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fdfdff;
            color: #1e293b;
            scroll-behavior: smooth;
        }

        /* Navbar Modern */
        .navbar {
            backdrop-filter: blur(10px);
            background-color: rgba(15, 23, 42, 0.9) !important;
            padding: 1rem 0;
        }

        /* Hero Section dengan Mesh Gradient */
        .hero-section {
            padding: 160px 0 100px;
            background-color: #0f172a;
            background-image:
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0, transparent 50%),
                radial-gradient(at 100% 100%, rgba(168, 85, 247, 0.15) 0, transparent 50%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .profile-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border: 8px solid rgba(255, 255, 255, 0.1);
            transition: all 0.5s ease;
        }

        .profile-img:hover {
            border-color: #6366f1;
            transform: scale(1.05) rotate(5deg);
        }

        /* Button Custom */
        .btn-primary-custom {
            background: var(--primary-gradient);
            border: none;
            color: white;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
            color: white;
        }

        /* Portfolio Cards */
        .card-portfolio {
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
        }

        .card-portfolio:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .card-portfolio img {
            transition: transform 0.6s;
        }

        .card-portfolio:hover img {
            transform: scale(1.1);
        }

        /* Section Title */
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        footer {
            background-color: #0f172a !important;
            padding: 60px 0 30px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-link:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-5px);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">My<span style="color: #6366f1;">Folio</span></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link px-3" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#projects">Proyek</a></li>
                    <li class="nav-item me-lg-3"><a class="nav-link px-3" href="#contact">Kontak</a></li>

                    @if (Route::has('login'))
                        <li class="nav-item">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="btn btn-outline-light btn-sm rounded-pill px-4">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-link text-white text-decoration-none me-2">Log
                                    in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="btn btn-primary-custom btn-sm rounded-pill">Sign Up</a>
                                @endif
                            @endauth
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section text-center">
        <div class="container">
            <div class="badge rounded-pill bg-primary bg-opacity-10 text-primary px-3 py-2 mb-4"
                style="backdrop-filter: blur(5px);">
                Available for New Projects
            </div>
            <img src="https://ui-avatars.com/api/?name=Dev&background=6366f1&color=fff&size=200" alt="Profile"
                class="rounded-circle profile-img mb-4 shadow-lg">
            <h1 class="display-3 fw-bold mb-3">Hi, I'm <span
                    style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Creative
                    Developer</span></h1>
            <p class="lead mb-5 text-secondary mx-auto" style="max-width: 600px;">Crafting high-performance web
                applications with Laravel 12 and cutting-edge frontend technologies.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#projects" class="btn btn-primary-custom shadow">View My Work</a>
                <a href="#contact" class="btn btn-outline-light px-4 py-2 rounded-12"
                    style="border-radius: 12px; border-color: rgba(255,255,255,0.2);">Let's Talk</a>
            </div>
        </div>
    </header>

    <section id="about" class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h4 class="text-primary fw-bold">About Me</h4>
                    <h2 class="fw-bold mb-4 display-6">Helping businesses with <br>clean and scalable code.</h2>
                    <p class="text-secondary lh-lg mb-4">
                        I specialize in Laravel development, creating robust backends and seamless user experiences. My
                        goal is to transform complex problems into simple, elegant digital solutions.
                    </p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-patch-check-fill text-primary fs-4 me-2"></i>
                                <span class="fw-semibold">Laravel Expert</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-patch-check-fill text-primary fs-4 me-2"></i>
                                <span class="fw-semibold">UI/UX Design</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-patch-check-fill text-primary fs-4 me-2"></i>
                                <span class="fw-semibold">API Integration</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-patch-check-fill text-primary fs-4 me-2"></i>
                                <span class="fw-semibold">Database Security</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative p-4">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-10 rounded-4 transform-rotate-3"
                            style="transform: rotate(3deg);"></div>
                        <img src="https://placehold.co/600x450/0f172a/ffffff?text=Modern+Workspace"
                            class="img-fluid rounded-4 shadow-lg position-relative" alt="Coding Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5 bg-light rounded-5 mx-2 mx-md-4">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h4 class="text-primary fw-bold">Portfolio</h4>
                <h2 class="fw-bold section-title">Featured Projects</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-portfolio h-100 p-3">
                        <div class="overflow-hidden rounded-4 mb-3">
                            <img src="https://placehold.co/600x400/4f46e5/ffffff?text=E-Commerce"
                                class="card-img-top rounded-4" alt="Project 1">
                        </div>
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary bg-opacity-10 text-primary">Web App</span>
                                <small class="text-muted">2026</small>
                            </div>
                            <h5 class="fw-bold">Modern E-Commerce</h5>
                            <p class="text-muted small">Full-stack solution with real-time analytics and payment
                                gateway.</p>
                            <a href="#" class="text-primary text-decoration-none fw-semibold">View Case Study <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-portfolio h-100 p-3">
                        <div class="overflow-hidden rounded-4 mb-3">
                            <img src="https://placehold.co/600x400/7c3aed/ffffff?text=SaaS+Dashboard"
                                class="card-img-top rounded-4" alt="Project 2">
                        </div>
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-success bg-opacity-10 text-success">SaaS</span>
                                <small class="text-muted">2025</small>
                            </div>
                            <h5 class="fw-bold">Analytics Dashboard</h5>
                            <p class="text-muted small">Complex data visualization with Laravel Echo and Chart.js.</p>
                            <a href="#" class="text-primary text-decoration-none fw-semibold">View Case Study <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-portfolio h-100 p-3">
                        <div class="overflow-hidden rounded-4 mb-3">
                            <img src="https://placehold.co/600x400/db2777/ffffff?text=Travel+API"
                                class="card-img-top rounded-4" alt="Project 3">
                        </div>
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-info bg-opacity-10 text-info">API</span>
                                <small class="text-muted">2025</small>
                            </div>
                            <h5 class="fw-bold">Travel Booking API</h5>
                            <p class="text-muted small">Headless CMS integration for seamless booking experiences.</p>
                            <a href="#" class="text-primary text-decoration-none fw-semibold">View Case Study <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-white mt-5" id="contact">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Let's work together</h2>
            <p class="text-secondary mb-5">Currently open to freelance opportunities and full-time positions.</p>
            <div class="d-flex justify-content-center gap-3 mb-5">
                <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                <a href="#" class="social-link"><i class="bi bi-envelope"></i></a>
            </div>
            <hr class="opacity-10 mb-4">
            <p class="text-secondary small mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. Built with ❤️ in
                Laravel 12.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
