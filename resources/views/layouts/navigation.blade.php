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
                <div class="desktop-only">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="user-profile-btn">
                                <div class="user-avatar-wrapper">
                                    <i class="fa-solid fa-user-shield"></i>
                                </div>
                                <span class="user-name-text">{{ Auth::user()->name }}</span>
                                <i class="fa-solid fa-chevron-down ms-2 small opacity-50"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="dropdown-glass-container">
                                <x-dropdown-link :href="route('profile.edit')" class="dropdown-custom-item">
                                    <i class="fa-solid fa-user-gear me-2"></i> {{ __('Profile Settings') }}
                                </x-dropdown-link>

                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="dropdown-custom-item logout-red">
                                        <i class="fa-solid fa-power-off me-2"></i> {{ __('Log Out') }}
                                    </x-dropdown-link>
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
                <i class="fa-solid fa-chart-line me-2"></i> {{ __('Dashboard') }}
            </a>

            <div class="mobile-user-profile">
                <div class="mobile-user-info">
                    <div class="m-user-name">{{ Auth::user()->name }}</div>
                    <div class="m-user-email">{{ Auth::user()->email }}</div>
                </div>

                <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
                    <i class="fa-solid fa-user-gear me-2"></i> {{ __('Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-nav-link logout-text">
                        <i class="fa-solid fa-power-off me-2"></i> {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <style>
        /* RESET & VARIABLE */
        :root {
            --nav-bg: rgba(15, 23, 42, 0.85);
            --nav-border: rgba(255, 255, 255, 0.1);
            --accent-blue: #60a5fa;
            --text-muted: rgba(255, 255, 255, 0.6);
        }

        .glass-navbar {
            background: var(--nav-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--nav-border);
            position: sticky;
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

        /* LEFT SECTION */
        .nav-section-left {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .nav-logo i {
            font-size: 1.75rem;
        }

        .nav-menu-desktop {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link-custom {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: #fff;
        }

        .nav-link-custom.active {
            border-bottom: 2px solid var(--accent-blue);
        }

        /* RIGHT SECTION & DROPDOWN */
        .user-profile-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--nav-border);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            color: #fff;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .user-profile-btn:hover {
            background: rgba(255, 255, 255, 0.1);
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

        .dropdown-glass-container {
            background: rgba(15, 23, 42, 0.95) !important;
            backdrop-filter: blur(20px);
            border: 1px solid var(--nav-border);
            border-radius: 12px;
            overflow: hidden;
            min-width: 200px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .dropdown-custom-item {
            display: block;
            padding: 0.8rem 1.2rem;
            color: var(--text-muted) !important;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .dropdown-custom-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff !important;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--nav-border);
            margin: 0.2rem 0;
        }

        .logout-red:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171 !important;
        }

        /* MOBILE NAVIGATION */
        .mobile-only {
            display: none;
        }

        .hamburger-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.4rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        .nav-menu-mobile {
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.98);
            border-bottom: 1px solid var(--nav-border);
        }

        .mobile-links-wrapper {
            padding: 1rem 0;
        }

        .mobile-nav-link {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 1rem;
        }

        .mobile-nav-link.active {
            color: var(--accent-blue);
            background: rgba(96, 165, 250, 0.05);
        }

        .mobile-user-profile {
            border-top: 1px solid var(--nav-border);
            margin-top: 1rem;
            padding-top: 1rem;
        }

        .mobile-user-info {
            padding: 0.5rem 1.5rem 1rem;
        }

        .m-user-name {
            color: #fff;
            font-weight: 600;
        }

        .m-user-email {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .logout-text {
            color: #f87171;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        /* UTILITY & RESPONSIVE */
        .text-gradient {
            background: linear-gradient(135deg, #60a5fa 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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

        /* ANIMATION */
        .nav-slide-down {
            animation: slideDown 0.3s ease-out forwards;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</nav>
