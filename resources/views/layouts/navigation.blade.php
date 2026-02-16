<nav x-data="{ mobileOpen: false }" class="glass-navbar">
    <div class="nav-container">
        <div class="nav-wrapper">

            <div class="nav-section-left">
                <div class="nav-logo">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-microchip text-gradient logo-icon"></i>
                    </a>
                </div>
                <div class="nav-menu-desktop">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <div class="icon-box">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </div>
            </div>

            <div class="nav-section-right">

                <div class="desktop-only relative" x-data="{ dropdownOpen: false }">

                    <button @click="dropdownOpen = !dropdownOpen" @keydown.escape.window="dropdownOpen = false"
                        class="user-profile-btn" :class="{ 'active': dropdownOpen }">
                        <div class="user-avatar-wrapper">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <span class="user-name-text">{{ Auth::user()->name }}</span>
                        <i class="fa-solid fa-chevron-down ms-icon transition-transform duration-300"
                            :class="{ 'rotate-180': dropdownOpen }"></i>
                    </button>

                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-2 scale-95" class="dropdown-glass-menu"
                        style="display: none;">

                        <div class="dropdown-header">
                            <span class="text-xs text-light uppercase tracking-wider">Account</span>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="fa-solid fa-user-gear item-icon"></i>
                            <span>{{ __('Profile Settings') }}</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item is-danger">
                                <i class="fa-solid fa-power-off item-icon"></i>
                                <span>{{ __('Log Out') }}</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mobile-only">
                    <button @click="mobileOpen = ! mobileOpen" class="hamburger-btn">
                        <i class="fa-solid" :class="mobileOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-show="mobileOpen" x-transition:enter="nav-slide-down" class="nav-menu-mobile" style="display: none;">
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
            /* Slate 900 */
            --glass-border: rgba(255, 255, 255, 0.08);
            --accent-primary: #3b82f6;
            /* Blue 500 */
            --accent-glow: rgba(59, 130, 246, 0.5);
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --danger: #ef4444;
        }

        /* --- NAVBAR UTAMA --- */
        .glass-navbar {
            background: var(--nav-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 50;
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
            gap: 1rem;
        }

        .nav-section-right {
            display: flex;
            align-items: center;
        }

        /* --- LOGO --- */
        .text-gradient {
            background: linear-gradient(to right, #60a5fa, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo-icon {
            font-size: 1.8rem;
            filter: drop-shadow(0 0 10px rgba(168, 85, 247, 0.3));
        }

        /* --- NAV LINKS --- */
        .nav-link-custom {
            position: relative;
            color: var(--text-muted);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-link-custom:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.03);
        }

        .nav-link-custom.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
        }

        .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
        }

        /* --- PROFILE BUTTON --- */
        .user-profile-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--glass-border);
            padding: 6px 16px 6px 6px;
            border-radius: 99px;
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .user-profile-btn:hover,
        .user-profile-btn.active {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .user-avatar-wrapper {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(168, 85, 247, 0.2));
            color: #60a5fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-name-text {
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.01em;
        }

        .ms-icon {
            font-size: 0.7rem;
            color: var(--text-muted);
        }

        /* --- NEW DROPDOWN MENU (ABSOLUTE POSITIONING) --- */
        .relative {
            position: relative;
        }

        .dropdown-glass-menu {
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 0.75rem;
            width: 240px;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.4);
            padding: 0.5rem;
            z-index: 100;
            transform-origin: top right;
        }

        .dropdown-header {
            padding: 0.75rem 1rem 0.5rem;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--text-muted);
            text-decoration: none;
            background: transparent;
            border: none;
            transition: all 0.2s;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .dropdown-item.is-danger:hover {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .dropdown-item.is-danger {
            color: #fca5a5;
        }

        .item-icon {
            width: 20px;
            text-align: center;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--glass-border);
            margin: 0.5rem 0.5rem;
        }

        /* --- MOBILE --- */
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

        .hamburger-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .nav-menu-mobile {
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.98);
            border-bottom: 1px solid var(--glass-border);
            backdrop-filter: blur(20px);
        }

        .mobile-links-wrapper {
            padding: 1rem;
        }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 8px;
        }

        .mobile-nav-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: #60a5fa;
        }

        .mobile-user-profile {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--glass-border);
        }

        .mobile-user-info {
            padding: 0 1rem 1rem;
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
            color: var(--danger);
            width: 100%;
            border: none;
            background: none;
            text-align: left;
            font-size: 1rem;
            cursor: pointer;
        }

        /* Animation Utility */
        .transition-transform {
            transition-property: transform;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</nav>
