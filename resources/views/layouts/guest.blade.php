<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JidaiIsHere') }} - Admin Login</title>

    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,<svg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'><circle cx='50' cy='50' r='45' fill='none' stroke='%2360a5fa' stroke-width='2' opacity='0.5' /><path d='M60 30 V60 C60 71 51 80 40 80 C29 80 20 71 20 60' fill='none' stroke='%2360a5fa' stroke-width='8' stroke-linecap='round' /><circle cx='60' cy='20' r='6' fill='%23a855f7' /></svg>">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            font-family: 'Figtree', sans-serif;
        }

        /* Container utama melebar untuk menampung logo + form */
        .auth-container {
            display: flex;
            align-items: center;
            gap: 4rem;
            /* Jarak antara logo dan form */
            width: 100%;
            max-width: 900px;
            z-index: 1;
        }

        /* Section Logo */
        .brand-section {
            flex: 1;
            text-align: right;
            padding-right: 2rem;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Section Form */
        .form-section {
            flex: 1;
            max-width: 400px;
        }

        .brand-text {
            background: linear-gradient(to right, #60a5fa, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: -1px;
            font-size: 2.5rem;
            display: block;
            margin-top: 1rem;
        }

        .brand-subtitle {
            color: #94a3b8;
            font-size: 1rem;
            margin-top: 0.5rem;
            font-weight: 400;
        }

        .bg-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill='%233b82f6' fill-opacity='0.03' d='M44.7,-76.4C58.1,-69.2,70.3,-59,79.1,-46.1C87.9,-33.1,93.3,-17.4,92.5,-1.9C91.7,13.5,84.7,28.8,75.1,42.2C65.5,55.5,53.4,66.9,39.6,74.1C25.8,81.2,10.4,84.1,-4.7,80.1C-19.8,76.1,-34.5,65.3,-47.5,54.1C-60.5,42.8,-71.7,31.2,-78.2,17.4C-84.7,3.6,-86.5,-12.4,-81.9,-26.8C-77.3,-41.2,-66.3,-54,-52.7,-61.2C-39.1,-68.4,-23,-70.1,-7.8,-74.6C7.4,-79.1,22.8,-83.6,44.7,-76.4Z' transform='translate(100 100)' /%3E%3C/svg%3E") no-repeat center;
            background-size: cover;
            z-index: -1;
        }

        /* Responsif untuk Mobile */
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                gap: 2rem;
                text-align: center;
            }

            .brand-section {
                border-right: none;
                padding-right: 0;
                text-align: center;
            }

            .brand-text {
                font-size: 2rem;
            }
        }

        [hidden] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased">
    <div class="bg-pattern"></div>

    <div class="auth-container">
        <div class="brand-section">
            <a href="/" class="text-decoration-none">
                <x-application-logo class="w-32 h-32 d-inline-block d-md-block ms-auto me-auto me-md-0" />
                <h1 class="brand-text">JidaiIsHere</h1>
                <p class="brand-subtitle">Data & Web Specialist Dashboard</p>
            </a>
        </div>

        <div class="form-section">
            <div class="main-content">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
