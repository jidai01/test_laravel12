<x-guest-layout>
    <div class="auth-card p-4 p-md-5">
        <div class="mb-4">
            <a href="/" class="back-link">
                <i class="fa-solid fa-arrow-left-long me-2"></i> Back to Portfolio
            </a>
        </div>

        <div class="text-center mb-5">
            <div class="icon-box mb-3">
                <i class="fa-solid fa-microchip text-gradient"></i>
            </div>
            <h3 class="fw-bold text-white mb-1">Admin Portal</h3>
            <p class="text-secondary small px-4">Authorized access only. Please enter your credentials to manage the
                system.</p>
        </div>

        @if (session('status'))
            <div class="alert alert-custom mb-4 animate__animated animate__fadeIn" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-4">
                <label for="email" class="custom-label">Email Address</label>
                <div class="input-group-custom">
                    <i class="fa-solid fa-envelope input-icon"></i>
                    <input id="email" class="custom-input" type="email" name="email" value="{{ old('email') }}"
                        required autofocus placeholder="name@example.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger x-small" />
            </div>

            <div class="form-group mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label for="password" class="custom-label mb-0">Password</label>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot?</a>
                    @endif
                </div>
                <div class="input-group-custom">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input id="password" class="custom-input" type="password" name="password" required
                        placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger x-small" />
            </div>

            <div class="d-flex align-items-center mb-4">
                <div class="custom-checkbox">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me" class="text-secondary small ms-2 cursor-pointer">Stay signed in for 30
                        days</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login w-100">
                <span>Sign In to Dashboard</span>
                <i class="fa-solid fa-right-to-bracket ms-2"></i>
            </button>
        </form>
    </div>

    <style>
        /* Main Card */
        .auth-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        /* Branding */
        .icon-box {
            width: 60px;
            height: 60px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 1.8rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .text-gradient {
            background: linear-gradient(135deg, #60a5fa 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Form Elements */
        .custom-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
        }

        .custom-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.2) !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 15px 12px 42px;
            color: white !important;
            transition: all 0.3s ease;
        }

        .custom-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: rgba(0, 0, 0, 0.4) !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        /* Links */
        .back-link,
        .forgot-link {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .back-link:hover,
        .forgot-link:hover {
            color: #60a5fa;
        }

        /* Button */
        .btn-login {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border: none;
            color: white;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.4);
            filter: brightness(1.1);
        }

        /* Utilities */
        .cursor-pointer {
            cursor: pointer;
        }

        .x-small {
            font-size: 0.75rem;
        }

        .alert-custom {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
            border-radius: 12px;
            font-size: 0.85rem;
            padding: 12px;
        }
    </style>
</x-guest-layout>
