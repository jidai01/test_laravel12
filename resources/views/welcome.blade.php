<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Creative Portfolio') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020617;
            /* Darker background for premium feel */
            color: #f8fafc;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        /* --- Custom Scrollbar --- */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }

        /* --- Navbar (Glassmorphism) --- */
        .navbar {
            backdrop-filter: blur(20px);
            background-color: rgba(15, 23, 42, 0.7) !important;
            padding: 1.2rem 0;
            border-bottom: 1px solid var(--glass-border);
        }

        /* --- Hero Section --- */
        .hero-section {
            padding: 180px 0 120px;
            background: radial-gradient(circle at top right, rgba(99, 102, 241, 0.15), transparent),
                radial-gradient(circle at bottom left, rgba(168, 85, 247, 0.15), transparent);
        }

        .profile-wrapper {
            position: relative;
            display: inline-block;
        }

        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 4px solid var(--glass-border);
            padding: 10px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .profile-img:hover {
            transform: scale(1.05) rotate(2deg);
            border-color: #6366f1;
        }

        /* --- Glow Effect --- */
        .text-glow {
            text-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            border: none;
            color: white;
            padding: 14px 32px;
            border-radius: 14px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.4);
            color: white;
        }

        /* --- Glass Cards --- */
        .card-glass {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .card-glass:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(99, 102, 241, 0.4);
            transform: translateY(-10px);
        }

        .feature-icon-box {
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        /* --- Section Titles --- */
        .section-tag {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
            font-weight: 800;
            color: #6366f1;
            display: block;
            margin-bottom: 10px;
        }

        footer {
            border-top: 1px solid var(--glass-border);
            padding: 100px 0 50px;
        }

        .social-link {
            width: 55px;
            height: 55px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: white;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary-gradient);
            transform: translateY(-5px) rotate(8deg);
            color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-extrabold fs-3 d-flex align-items-center" href="#">
                <i class="fa-solid fa-code logo-icon me-2" style="color: #6366f1;"></i>
                <span>DEV<span style="color: #a855f7;">PORT</span></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link px-3" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#projects">Work</a></li>
                    <li class="nav-item me-lg-4"><a class="nav-link px-3" href="#contact">Contact</a></li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-4 border-secondary">
                            <i class="fa-solid fa-download me-2"></i>CV
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section text-center">
        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <div class="badge rounded-pill px-4 py-2 mb-4"
                style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.2); color: #818cf8;">
                <i class="fa-solid fa-sparkles me-2 text-warning"></i> Available for New Opportunities
            </div>

            <div class="profile-wrapper mb-4">
                <img src="https://ui-avatars.com/api/?name=JS&background=6366f1&color=fff&size=200" alt="Profile"
                    class="rounded-circle profile-img shadow-lg">
            </div>

            <h1 class="display-2 fw-bolder mb-3">Crafting <span class="text-glow"
                    style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Future-Proof</span>
                Software</h1>

            <p class="lead mb-5 text-secondary mx-auto" style="max-width: 700px; font-weight: 400;">
                Full-stack Developer spesialis <b>Laravel 12</b> & <b>Modern UI</b>. Mengubah ide kompleks menjadi
                pengalaman digital yang memukau.
            </p>

            <div class="d-flex justify-content-center gap-3">
                <a href="#projects" class="btn btn-primary-custom">
                    Explore My Work <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
                <a href="#contact" class="btn btn-link text-white text-decoration-none px-4">
                    Get in Touch
                </a>
            </div>
        </div>
    </header>

    <section id="about" class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="section-tag">Identity</span>
                    <h2 class="fw-bold mb-4 display-5">Driven by Code, <br>Defined by Design.</h2>
                    <p class="text-secondary lh-lg mb-4">
                        Saya percaya bahwa setiap baris kode harus memiliki tujuan. Fokus saya adalah membangun sistem
                        yang tidak hanya bekerja dengan sempurna secara backend, tetapi juga memanjakan mata secara
                        frontend.
                    </p>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="card-glass p-3 d-flex align-items-center">
                                <i class="fa-solid fa-bolt text-warning me-3"></i>
                                <span>Fast Delivery</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card-glass p-3 d-flex align-items-center">
                                <i class="fa-solid fa-lock text-info me-3"></i>
                                <span>Security First</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card-glass p-2">
                        <img src="https://placehold.co/600x400/0f172a/6366f1?text=Clean+Code+Minimalist"
                            class="img-fluid rounded-4 shadow-lg" alt="Coding">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-tag">Portfolio</span>
                <h2 class="fw-bold display-6">Featured Creations</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-glass h-100">
                        <img src="https://placehold.co/600x400/1e293b/ffffff?text=Fintech+App"
                            class="card-img-top p-2 rounded-5" alt="Project">
                        <div class="card-body p-4">
                            <div class="d-flex gap-2 mb-3">
                                <span class="badge bg-dark border border-secondary small">Laravel</span>
                                <span class="badge bg-dark border border-secondary small">React</span>
                            </div>
                            <h5 class="fw-bold">Nexus Banking System</h5>
                            <p class="text-secondary small">Sistem perbankan digital dengan fitur enkripsi tingkat
                                tinggi.</p>
                            <a href="#" class="text-decoration-none text-primary fw-bold small">Case Study <i
                                    class="fa-solid fa-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact" class="text-white">
        <div class="container text-center" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-4">Ready to start a project?</h2>
            <p class="text-secondary mb-5">Saya selalu terbuka untuk diskusi teknologi atau tawaran kolaborasi yang
                menarik.</p>

            <div class="d-flex justify-content-center gap-3 mb-5">
                <a href="#" class="social-link"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fa-regular fa-envelope"></i></a>
            </div>

            <div class="mt-5 pt-4 opacity-50 small">
                &copy; 2026 {{ config('app.name') }}. Built with passion & Laravel 12.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>

</html>
