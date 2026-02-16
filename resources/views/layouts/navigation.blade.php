<nav x-data="{ open: false }" class="glass-navbar">
    <div class="nav-container">
        <div class="nav-wrapper">
            <div class="nav-section-left">
                <div class="nav-logo">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-microchip text-gradient"></i>
                    </a>
                </div>
                <div class="nav-menu-desktop">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </div>
            </div>

            <div class="nav-section-right">
                <div class="desktop-only dropdown-context">
                    <x-dropdown align="right" width="48" dropdown-classes="none">
                        <x-slot name="trigger">
                            <button class="user-profile-btn">
                                <div class="user-avatar-wrapper">
                                    <i class="fa-solid fa-user-shield"></i>
                                </div>
                                <span class="user-name-text">{{ Auth::user()->name }}</span>
                                <i class="fa-solid fa-chevron-down ms-icon opacity-50"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="dropdown-glass-container">
                                <a href="{{ route('profile.edit') }}" class="dropdown-custom-item">
                                    <i class="fa-solid fa-user-gear me-icon"></i>
                                    <span>{{ __('Profile Settings') }}</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-custom-item logout-red">
                                        <i class="fa-solid fa-power-off me-icon"></i>
                                        <span>{{ __('Log Out') }}</span>
                                    </button>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="mobile-only">
                    <button @click="open = ! open" class="hamburger-btn">
                        <i class="fa-solid" :class="open ? 'fa-xmark' : 'fa-bars-staggered'"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition:enter="nav-slide-down" class="nav-menu-mobile" style="display: none;">
        <div class="mobile-links-wrapper">
            <a href="{{ route('dashboard') }}"
                class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line me-icon"></i> {{ __('Dashboard') }}
            </a>
            <div class="mobile-user-profile">
                <div class="mobile-user-info">
                    <div class="m-user-name">{{ Auth::user()->name }}</div>
                    <div class="m-user-email">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
                    <i class="fa-solid fa-user-gear me-icon"></i> {{ __('Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-nav-link logout-text">
                        <i class="fa-solid fa-power-off me-icon"></i> {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        :root {
            --nav-bg: rgba(15, 23, 42, 0.85);
            --nav-border: rgba(255, 255, 255, 0.1);
            --accent-blue: #60a5fa;
            --text-muted: rgba(255, 255, 255, 0.6);
            --dropdown-bg: rgba(15, 23, 42, 0.95);
        }

        /* RESET PAKSA UNTUK MENGHAPUS KOTAK PUTIH BAWAAN LARAVEL */
        .dropdown-context div[x-show="open"] {
            background-color: transparent !important;
            box-shadow: none !important;
            border: none !important;
            padding: 0 !important;
        }

        .glass-navbar {
            background: var(--nav-bg) !important;
            backdrop-filter: blur(16px) !important;
            border-bottom: 1px solid var(--nav-border) !important;
            position: sticky !important;
            top: 0;
            z-index: 1000;
            height: 70px;
            width: 100%;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 100%;
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .nav-section-left {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .nav-menu-desktop {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link-custom {
            color: var(--text-muted) !important;
            text-decoration: none !important;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            transition: 0.3s;
        }

        .nav-link-custom.active,
        .nav-link-custom:hover {
            color: #fff !important;
        }

        .user-profile-btn {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--nav-border) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 12px !important;
            color: #fff !important;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .user-avatar-wrapper {
            background: rgba(96, 165, 250, 0.2);
            color: var(--accent-blue);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-right: 0.75rem;
        }

        /* CONTAINER DROPDOWN KUSTOM */
        .dropdown-glass-container {
            background: var(--dropdown-bg) !important;
            backdrop-filter: blur(20px) !important;
            border: 1px solid var(--nav-border) !important;
            border-radius: 12px !important;
            overflow: hidden;
            min-width: 220px;
            margin-top: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        }

        .dropdown-custom-item {
            display: flex !important;
            align-items: center;
            width: 100%;
            padding: 0.8rem 1.2rem !important;
            color: var(--text-muted) !important;
            text-decoration: none !important;
            background: transparent !important;
            border: none !important;
            cursor: pointer;
            transition: 0.2s;
        }

        .dropdown-custom-item:hover {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #fff !important;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--nav-border);
            margin: 0.2rem 0;
        }

        .logout-red {
            color: #f87171 !important;
        }

        /* MOBILE & UTILITY */
        .mobile-only {
            display: none;
        }

        @media (max-width: 768px) {

            .desktop-only,
            .nav-menu-desktop {
                display: none;
            }

            .mobile-only {
                display: block;
            }
        }

        .text-gradient {
            background: linear-gradient(135deg, #60a5fa 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .ms-icon {
            margin-left: 0.5rem;
        }

        .me-icon {
            margin-right: 0.75rem;
        }
    </style>
</nav>
