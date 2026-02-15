<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'JidaiIsHere | Data & Web Specialist') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
            --accent: #6366f1;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #020617;
            color: #f8fafc;
            overflow-x: hidden;
            scroll-behavior: auto;
            /* Dikelola oleh JS untuk presisi */
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            top: 0;
            left: 0;
        }

        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: var(--primary-gradient);
            z-index: 10000;
        }

        .navbar {
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            background: rgba(2, 6, 23, 0.85);
            transition: 0.4s;
            border-bottom: 1px solid var(--glass-border);
        }

        .nav-link.active-custom {
            color: #a855f7 !important;
            position: relative;
        }

        .nav-link.active-custom::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 5px;
            height: 5px;
            background: #a855f7;
            border-radius: 50%;
        }

        .section-padding {
            padding: 100px 0;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            transition: 0.4s ease;
            height: 100%;
        }

        .glass-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent);
            background: rgba(255, 255, 255, 0.06);
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .profile-img {
            width: 280px;
            height: 280px;
            object-fit: cover;
            border: 6px solid var(--glass-border);
            padding: 8px;
            background: var(--glass-bg);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .tech-icon {
            font-size: 2.5rem;
            transition: 0.3s;
            filter: grayscale(1) opacity(0.6);
        }

        .tech-box:hover .tech-icon {
            filter: grayscale(0) opacity(1);
            transform: scale(1.2);
        }

        .timeline-item {
            border-left: 2px solid var(--glass-border);
            padding-left: 30px;
            position: relative;
            padding-bottom: 40px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -9px;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 15px var(--accent);
        }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: white !important;
            border-radius: 12px;
            padding: 12px;
        }

        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .social-link {
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: white;
            transition: 0.3s;
            text-decoration: none;
        }

        .social-link:hover {
            background: var(--primary-gradient);
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>
    <div class="scroll-progress" id="scrollBar"></div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="/">
                <i class="fa-solid fa-microchip text-gradient me-2"></i>JidaiIsHere
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-lg-3 align-items-center">
                    <li class="nav-item"><a class="nav-link nav-clean" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-clean" href="/skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link nav-clean" href="/projects">Work</a></li>
                    <li class="nav-item"><a class="nav-link nav-clean" href="/experience">Experience</a></li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-gradient fw-bold" href="#"
                                data-bs-toggle="dropdown">Admin</a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end border-secondary shadow p-2">
                                <li><a class="dropdown-item rounded-2" href="/dashboard"><i
                                            class="fa-solid fa-gauge me-2"></i>Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger rounded-2">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i
                                    class="fa-solid fa-lock me-1"></i> Login</a></li>
                        <li class="nav-item"><a href="/contact"
                                class="btn btn-primary btn-sm rounded-pill px-4 nav-clean text-white">Contact Me</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <h5 class="text-accent mb-3 fw-bold">🚀 DATA DRIVEN DEVELOPER</h5>
                    <h1 class="display-2 fw-bold mb-4">Crafting <span id="typewriter"
                            class="text-gradient"></span><br>With Precision.</h1>
                    <p class="lead text-secondary mb-5">
                        Saya menjembatani dunia <strong class="text-light">Data Science</strong> dan <strong
                            class="text-light">Web Development</strong>. Mengubah data kompleks menjadi wawasan
                        strategis.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="/projects" class="btn btn-primary px-4 py-3 rounded-4 nav-clean text-white shadow">View
                            Portfolio</a>
                        <a href="#" class="btn btn-outline-light px-4 py-3 rounded-4 hover-glass"><i
                                class="fa-solid fa-download me-2"></i>Download CV</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block" data-aos="zoom-in">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('storage/jose.JPG') }}" class="rounded-circle profile-img shadow-lg"
                            alt="Profile">
                        <div class="position-absolute bottom-0 end-0 bg-primary p-3 rounded-circle shadow scale-up">
                            <i class="fa-solid fa-chart-pie text-white fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="skills" class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Expertise & Tech Stack</h2>
                <div class="mx-auto bg-primary" style="height: 4px; width: 60px;"></div>
            </div>
            <div class="row g-4 text-center justify-content-center">
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="100">
                    <i class="fa-brands fa-python tech-icon" style="color: #3776ab;"></i>
                    <p class="mt-2">Python / ML</p>
                </div>
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="200">
                    <i class="fa-solid fa-database tech-icon text-info"></i>
                    <p class="mt-2">SQL / Pandas</p>
                </div>
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="300">
                    <i class="fa-brands fa-laravel tech-icon text-danger"></i>
                    <p class="mt-2">Laravel</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding">
        <div class="container">
            <div class="glass-card p-5" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-5">
                        <h2 class="fw-bold mb-4">Let's Collaborate!</h2>
                        <p class="text-secondary mb-4">Butuh analisis data mendalam atau aplikasi web modern? Hubungi
                            saya.</p>
                        <div class="d-flex align-items-center mb-4">
                            <div class="social-link me-3"><i class="fa-solid fa-envelope"></i></div>
                            <span>jidaiishere@gmail.com</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="social-link me-3"><i class="fa-solid fa-location-dot"></i></div>
                            <span>Kupang, NTT, Indonesia</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form id="contactForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control form-control-custom"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control form-control-custom"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control form-control-custom" rows="5"
                                        placeholder="Tell me about your project..." required></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" id="btnSend"
                                        class="btn btn-primary px-5 py-3 rounded-4 fw-bold text-white shadow">
                                        Send Message <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                                <div class="col-12 mt-3" id="formResponse"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 text-center border-top border-secondary border-opacity-25 mt-5">
        <div class="container">
            <div class="d-flex justify-content-center gap-4 mb-4">
                <a href="https://github.com/jidai01" target="_blank" class="social-link"><i
                        class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/joseray-lopes-da-cruz-a8916b3b0/" target="_blank"
                    class="social-link"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://www.instagram.com/jerayldc/" target="_blank" class="social-link"><i
                        class="fa-brands fa-instagram"></i></a>
            </div>
            <p class="text-secondary small">© 2026 Developed with <i class="fa-solid fa-heart text-danger"></i> by
                JidaiIsHere</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

    <script>
        // 1. Inisialisasi library
        AOS.init({
            duration: 1000,
            once: true
        });
        VanillaTilt.init(document.querySelectorAll(".glass-card"), {
            max: 5,
            speed: 400,
            glare: true,
            "max-glare": 0.1
        });

        // 2. Navigasi & Smooth Scroll (Fixed logic)
        const navHeight = 90;
        document.querySelectorAll('.nav-clean').forEach(link => {
            link.addEventListener('click', function(e) {
                const path = this.getAttribute('href');

                // Jika link adalah anchor internal (misal /skills)
                if (path.startsWith('/') && path.length > 1) {
                    const targetId = path.substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        e.preventDefault();
                        window.history.pushState(null, null, path);
                        window.scrollTo({
                            top: targetElement.offsetTop - navHeight,
                            behavior: 'smooth'
                        });

                        // Tutup navbar mobile setelah klik
                        const bCollapse = bootstrap.Collapse.getInstance(document.getElementById(
                            'navbarNav'));
                        if (bCollapse) bCollapse.hide();
                    }
                } else if (path === '/') {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    window.history.pushState(null, null, '/');
                }
            });
        });

        // 3. Scroll Progress & Spy
        window.addEventListener('scroll', () => {
            const winScroll = document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById("scrollBar").style.width = scrolled + "%";

            // Scroll Spy
            const sections = ['home', 'skills', 'projects', 'experience', 'contact'];
            sections.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    const offset = el.offsetTop - (navHeight + 50);
                    if (winScroll >= offset && winScroll < offset + el.offsetHeight) {
                        document.querySelectorAll('.nav-link').forEach(nav => {
                            nav.classList.remove('active-custom');
                            const expectedPath = id === 'home' ? '/' : `/${id}`;
                            if (nav.getAttribute('href') === expectedPath) nav.classList.add(
                                'active-custom');
                        });
                    }
                }
            });
        });

        // 4. Typewriter (Fixed)
        const phrases = ['AI Models', 'Data Insights', 'Web Solutions', 'Smart Dashboards'];
        let i = 0,
            j = 0,
            isDeleting = false;

        function type() {
            const current = phrases[i];
            const typewriterEl = document.getElementById('typewriter');
            if (!typewriterEl) return;

            typewriterEl.textContent = isDeleting ? current.substring(0, j--) : current.substring(0, j++);

            if (!isDeleting && j > current.length) {
                isDeleting = true;
                setTimeout(type, 2000);
            } else if (isDeleting && j < 0) {
                isDeleting = false;
                i = (i + 1) % phrases.length;
                j = 0;
                setTimeout(type, 500);
            } else {
                setTimeout(type, isDeleting ? 50 : 100);
            }
        }
        type();

        // 5. Particles.js config
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 50
                },
                "color": {
                    "value": "#6366f1"
                },
                "opacity": {
                    "value": 0.2
                },
                "size": {
                    "value": 2
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#6366f1",
                    "opacity": 0.1,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1.5
                }
            }
        });

        // 6. Contact Form Ajax
        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSend');
            const responseDiv = document.getElementById('formResponse');

            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Sending...';
            btn.disabled = true;

            try {
                const response = await fetch('/contact/send', {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();
                if (response.ok) {
                    responseDiv.innerHTML =
                        `<div class="alert alert-success border-0 bg-success bg-opacity-10 text-success rounded-4"><i class="fa-solid fa-check me-2"></i>${result.success}</div>`;
                    this.reset();
                } else {
                    responseDiv.innerHTML =
                        `<div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-4">Something went wrong.</div>`;
                }
            } catch (error) {
                responseDiv.innerHTML =
                    `<div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-4">Server error.</div>`;
            } finally {
                btn.innerHTML = 'Send Message <i class="fa-solid fa-paper-plane ms-2"></i>';
                btn.disabled = false;
            }
        });
    </script>
</body>

</html>
