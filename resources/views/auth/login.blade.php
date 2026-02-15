<x-guest-layout>
    <div class="glass-card p-4 p-md-5 shadow-lg border border-opacity-20 border-white"
        style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 20px;">

        <div class="mb-4">
            <a href="/" class="text-secondary text-decoration-none small hover-white transition-all">
                <i class="fa-solid fa-arrow-left me-2"></i> Back to Portfolio
            </a>
        </div>

        <div class="text-center mb-4">
            <i class="fa-solid fa-microchip text-gradient fs-1 mb-3"></i>
            <h3 class="fw-bold text-white">Admin Login</h3>
            <p class="text-secondary small">Silahkan masuk untuk mengelola pesan</p>
        </div>

        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label text-white-50 small">Email Address</label>
                <input id="email" class="form-control bg-dark border-secondary text-white focus-gradient"
                    type="email" name="email" :value="old('email')"
                    style="background: rgba(0,0,0,0.3) !important; border-radius: 10px;" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label for="password" class="form-label text-white-50 small">Password</label>
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none small text-gradient" href="{{ route('password.request') }}">
                            Forgot?
                        </a>
                    @endif
                </div>
                <input id="password" class="form-control bg-dark border-secondary text-white focus-gradient"
                    type="password" name="password" style="background: rgba(0,0,0,0.3) !important; border-radius: 10px;"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
            </div>

            <div class="form-check mb-4">
                <input id="remember_me" type="checkbox" class="form-check-input bg-dark border-secondary"
                    name="remember">
                <label for="remember_me" class="form-check-label text-white-50 small">
                    Stay logged in
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm">
                {{ __('Log in') }}
            </button>
        </form>
    </div>

    <style>
        .text-gradient {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .focus-gradient:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25) !important;
            outline: none;
        }

        .hover-white:hover {
            color: white !important;
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</x-guest-layout>
