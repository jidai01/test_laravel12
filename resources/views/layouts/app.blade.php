<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin Dashboard</title>

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
            font-family: 'Figtree', sans-serif;
        }

        .glass-nav {
            background: rgba(15, 23, 42, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .main-content {
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill='%233b82f6' fill-opacity='0.02' d='M44.7,-76.4C58.1,-69.2,70.3,-59,79.1,-46.1C87.9,-33.1,93.3,-17.4,92.5,-1.9C91.7,13.5,84.7,28.8,75.1,42.2C65.5,55.5,53.4,66.9,39.6,74.1C25.8,81.2,10.4,84.1,-4.7,80.1C-19.8,76.1,-34.5,65.3,-47.5,54.1C-60.5,42.8,-71.7,31.2,-78.2,17.4C-84.7,3.6,-86.5,-12.4,-81.9,-26.8C-77.3,-41.2,-66.3,-54,-52.7,-61.2C-39.1,-68.4,-23,-70.1,-7.8,-74.6C7.4,-79.1,22.8,-83.6,44.7,-76.4Z' transform='translate(100 100)' /%3E%3C/svg%3E") no-repeat center center fixed;
            background-size: cover;
        }

        /* Customizing Tailwind classes to fit dark theme */
        header h2 {
            color: #60a5fa !important;
            font-weight: 700 !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen main-content">
        <div class="glass-nav sticky-top">
            @include('layouts.navigation')
        </div>

        @isset($header)
            <header class="glass-header shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
