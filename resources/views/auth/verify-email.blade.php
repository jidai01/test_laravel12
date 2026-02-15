<x-guest-layout>
    <div class="auth-card p-4 p-md-5">

        <div class="text-center mb-5">
            <div class="icon-box-pulse mb-4">
                <i class="fa-solid fa-envelope-open-text text-gradient"></i>
            </div>
            <h3 class="fw-bold text-white mb-2">Verify Your Email</h3>
            <p class="text-secondary small px-3">
                {{ __('Terima kasih telah bergabung! Silakan klik link verifikasi yang baru saja kami kirimkan ke email Anda untuk mengaktifkan akses admin.') }}
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-custom mb-4 animate__animated animate__fadeInUp" role="alert">
                <i class="fa-solid fa-paper-plane me-2"></i>
                {{ __('Link verifikasi baru telah dikirimkan ke alamat email Anda.') }}
            </div>
        @endif

        <div class="d-flex flex-column gap-3 mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-login w-100">
                    <span>{{ __('Resend Verification Email') }}</span>
                    <i class="fa-solid fa-rotate-right ms-2"></i>
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="btn-link-custom">
                    <i class="fa-solid fa-right-from-bracket me-1"></i> {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>

    <style>
        /* Animasi Pulse untuk Ikon */
        .icon-box-pulse {
            width: 70px;
            height: 70px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 2rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            animation: pulse-blue 2s infinite;
        }

        @keyframes pulse-blue {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }

        /* Custom Link Style */
        .btn-link-custom {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-link-custom:hover {
            color: #ef4444;
            /* Warna merah saat logout di-hover */
            transform: scale(1.05);
        }

        .alert-custom {
            background: rgba(52, 211, 153, 0.1);
            border: 1px solid rgba(52, 211, 153, 0.2);
            color: #34d399;
            border-radius: 12px;
            font-size: 0.85rem;
            padding: 15px;
        }
    </style>
</x-guest-layout>
