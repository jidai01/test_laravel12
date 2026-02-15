<x-guest-layout>
    <div class="glass-card p-4 p-md-5 shadow-lg border border-opacity-20 border-white"
        style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 20px;">

        <div class="mb-4">
            <a href="{{ route('login') }}" class="text-secondary text-decoration-none small hover-white transition-all">
                <i class="fa-solid fa-arrow-left me-2"></i> Back to Login
            </a>
        </div>

        <div class="text-center mb-4">
            <i class="fa-solid fa-key text-gradient fs-1 mb-3"></i>
            <h3 class="fw-bold text-white">Reset Password</h3>
            <p class="text-secondary small">
                {{ __('Lupa password? Masukkan email Anda dan kami akan mengirimkan link reset ke inbox Anda.') }}
            </p>
        </div>

        <x-auth-session-status class="mb-4 text-success small fw-bold" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label text-white-50 small">Registered Email</label>
                <input id="email" class="form-control bg-dark border-secondary text-white focus-gradient"
                    type="email" name="email" :value="old('email')"
                    style="background: rgba(0,0,0,0.3) !important; border-radius: 10px;" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm">
                {{ __('Send Reset Link') }}
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
