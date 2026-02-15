<x-guest-layout>
    <div class="auth-card p-4 p-md-5">

        <div class="text-center mb-5">
            <div class="icon-box mb-3">
                <i class="fa-solid fa-shield-halved text-gradient"></i>
            </div>
            <h3 class="fw-bold text-white mb-1">Set New Password</h3>
            <p class="text-secondary small px-4">Pastikan password baru Anda kuat dan mudah diingat.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group mb-4">
                <label for="email" class="custom-label">Email Address</label>
                <div class="input-group-custom">
                    <i class="fa-solid fa-envelope input-icon"></i>
                    <input id="email" class="custom-input" type="email" name="email"
                        value="{{ old('email', $request->email) }}" required autofocus readonly />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger x-small" />
            </div>

            <div class="form-group mb-4">
                <label for="password" class="custom-label">New Password</label>
                <div class="input-group-custom">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input id="password" class="custom-input" type="password" name="password" required
                        placeholder="••••••••" autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger x-small" />
            </div>

            <div class="form-group mb-4">
                <label for="password_confirmation" class="custom-label">Confirm New Password</label>
                <div class="input-group-custom">
                    <i class="fa-solid fa-check-double input-icon"></i>
                    <input id="password_confirmation" class="custom-input" type="password" name="password_confirmation"
                        required placeholder="••••••••" autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger x-small" />
            </div>

            <button type="submit" class="btn btn-login w-100">
                <span>Update Password</span>
                <i class="fa-solid fa-circle-check ms-2"></i>
            </button>
        </form>
    </div>

    <style>
        /* Styling tambahan khusus untuk halaman reset agar konsisten dengan Login */
        .icon-box {
            width: 60px;
            height: 60px;
            background: rgba(139, 92, 246, 0.1);
            /* Sedikit sentuhan ungu */
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 1.8rem;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        /* Input readonly style agar email tidak diubah-ubah */
        .custom-input[readonly] {
            opacity: 0.7;
            cursor: not-allowed;
            background: rgba(0, 0, 0, 0.4) !important;
        }
    </style>
</x-guest-layout>
