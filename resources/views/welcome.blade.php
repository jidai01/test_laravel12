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
        }

        /* --- UI Enhancements --- */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: var(--primary-gradient);
            z-index: 9999;
        }

        .section-padding {
            padding: 100px 0;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            transition: 0.4s ease;
        }

        /* --- Hero --- */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .profile-img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border: 6px solid var(--glass-border);
            padding: 8px;
            background: var(--glass-bg);
        }

        /* --- Tech Stack --- */
        .tech-icon {
            font-size: 2.5rem;
            transition: 0.3s;
            filter: grayscale(1) opacity(0.6);
        }

        .tech-box:hover .tech-icon {
            filter: grayscale(0) opacity(1);
            transform: scale(1.2);
        }

        /* --- Timeline --- */
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
            box-shadow: 0 0 10px var(--accent);
        }

        /* --- Forms --- */
        .form-control-custom {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: white;
            border-radius: 12px;
            padding: 12px;
        }

        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            border-color: var(--accent);
            box-shadow: none;
        }

        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>
    <div class="scroll-progress" id="scrollBar"></div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">
                <i class="fa-solid fa-bolt-lightning text-gradient me-2"></i>DEV.JS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Work</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a href="#contact" class="btn btn-primary btn-sm rounded-pill px-4">Contact
                            Me</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <h5 class="text-accent mb-3 fw-bold">🚀 OPEN FOR PROJECTS</h5>
                    <h1 class="display-2 fw-bold mb-4">Crafting <span id="typewriter"
                            class="text-gradient"></span><br>With Precision.</h1>
                    <p class="lead text-secondary mb-5">Saya membantu bisnis membangun infrastruktur digital yang kuat
                        menggunakan Laravel & teknologi modern lainnya.</p>
                    <div class="d-flex gap-3">
                        <a href="#projects" class="btn btn-primary px-4 py-3 rounded-4">View Portfolio</a>
                        <a href="#" class="btn btn-outline-light px-4 py-3 rounded-4"><i
                                class="fa-solid fa-download me-2"></i>Download CV</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block" data-aos="zoom-in">
                    <img src="https://ui-avatars.com/api/?name=JS&background=6366f1&color=fff&size=300"
                        class="rounded-circle profile-img" alt="Profile">
                </div>
            </div>
        </div>
    </header>

    <section id="skills" class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">My Tech Stack</h2>
                <div class="mx-auto bg-primary" style="height: 4px; width: 60px;"></div>
            </div>
            <div class="row g-4 text-center justify-content-center">
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="100">
                    <i class="fa-brands fa-laravel tech-icon text-danger"></i>
                    <p class="mt-2">Laravel</p>
                </div>
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="200">
                    <i class="fa-brands fa-vuejs tech-icon text-success"></i>
                    <p class="mt-2">Vue.js</p>
                </div>
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="300">
                    <i class="fa-brands fa-js tech-icon text-warning"></i>
                    <p class="mt-2">Javascript</p>
                </div>
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="400">
                    <i class="fa-brands fa-docker tech-icon text-info"></i>
                    <p class="mt-2">Docker</p>
                </div>
                <div class="col-6 col-md-2 tech-box" data-aos="fade-up" data-aos-delay="500">
                    <i class="fa-brands fa-git-alt tech-icon text-white"></i>
                    <p class="mt-2">Git</p>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="section-padding bg-black bg-opacity-25">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <h2 class="fw-bold mb-5">Working Experience</h2>
                    <div class="timeline-item">
                        <h5 class="fw-bold">Senior Backend Developer</h5>
                        <p class="text-accent mb-1">Tech Corp • 2022 - Present</p>
                        <p class="text-secondary small">Memimpin tim dalam migrasi sistem microservices dan optimasi
                            database.</p>
                    </div>
                    <div class="timeline-item">
                        <h5 class="fw-bold">Web Developer</h5>
                        <p class="text-accent mb-1">Creative Agency • 2020 - 2022</p>
                        <p class="text-secondary small">Membangun lebih dari 20+ proyek klien menggunakan ekosistem
                            Laravel.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-5">Education</h2>
                    <div class="timeline-item">
                        <h5 class="fw-bold">Computer Science Degree</h5>
                        <p class="text-accent mb-1">Brawijaya University • 2016 - 2020</p>
                        <p class="text-secondary small">Fokus pada rekayasa perangkat lunak dan keamanan sistem.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding">
        <div class="container">
            <div class="glass-card p-5">
                <div class="row g-5">
                    <div class="col-lg-5" data-aos="fade-right">
                        <h2 class="fw-bold mb-4">Let's Talk!</h2>
                        <p class="text-secondary mb-4">Punya ide luar biasa? Mari kita wujudkan bersama.</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="social-link me-3"><i class="fa-solid fa-envelope"></i></div>
                            <span>hello@domain.com</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="social-link me-3"><i class="fa-solid fa-location-dot"></i></div>
                            <span>Jakarta, Indonesia</span>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-left">
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-custom"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control form-control-custom"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control form-control-custom" rows="5" placeholder="Project Description"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-4 fw-bold">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 text-center border-top border-secondary border-opacity-25">
        <div class="container">
            <div class="d-flex justify-content-center gap-4 mb-4">
                <a href="#" class="social-link"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-dribbble"></i></a>
            </div>
            <p class="text-secondary small">© 2026 Developed with <i class="fa-solid fa-heart text-danger"></i> by
                MyPortfolio</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Scroll Progress Bar
        window.onscroll = function() {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            document.getElementById("scrollBar").style.width = scrolled + "%";
        };

        // Typewriter Effect
        const phrases = ['Scalable Apps', 'Modern UI', 'Secure Backend'];
        let i = 0,
            j = 0,
            current = '',
            isDeleting = false;

        function type() {
            current = phrases[i];
            if (isDeleting) j--;
            else j++;
            document.getElementById('typewriter').innerHTML = current.substring(0, j);
            if (!isDeleting && j == current.length) {
                isDeleting = true;
                setTimeout(type, 2000);
            } else if (isDeleting && j == 0) {
                isDeleting = false;
                i = (i + 1) % phrases.length;
                setTimeout(type, 500);
            } else setTimeout(type, isDeleting ? 50 : 100);
        }
        type();

        // Particles
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
                    "speed": 1
                }
            }
        });

        // Initialize Tilt
        VanillaTilt.init(document.querySelectorAll(".glass-card"), {
            max: 5,
            speed: 400
        });
    </script>
</body>

</html>
