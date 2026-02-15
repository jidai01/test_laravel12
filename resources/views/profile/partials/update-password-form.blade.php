<section class="glass-section p-4 rounded-4 mt-4">
    <header class="mb-4">
        <h2 class="section-title">
            <i class="fa-solid fa-lock-open me-2 text-primary"></i>{{ __('Update Password') }}
        </h2>

        <p class="section-subtitle">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="profile-form">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="update_password_current_password" class="form-label-custom">{{ __('Current Password') }}</label>
            <div class="input-group-glass">
                <input id="update_password_current_password" name="current_password" type="password"
                    class="form-control-glass @error('current_password', 'updatePassword') is-invalid @enderror"
                    autocomplete="current-password" />
            </div>
            @if ($errors->updatePassword->get('current_password'))
                <div class="invalid-feedback-custom">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="mb-4">
            <label for="update_password_password" class="form-label-custom">{{ __('New Password') }}</label>
            <div class="input-group-glass">
                <input id="update_password_password" name="password" type="password"
                    class="form-control-glass @error('password', 'updatePassword') is-invalid @enderror"
                    autocomplete="new-password" />
            </div>
            @if ($errors->updatePassword->get('password'))
                <div class="invalid-feedback-custom">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation"
                class="form-label-custom">{{ __('Confirm Password') }}</label>
            <div class="input-group-glass">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="form-control-glass @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                    autocomplete="new-password" />
            </div>
            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="invalid-feedback-custom">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn-save-glass">
                <i class="fa-solid fa-key me-2"></i>{{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="status-saved">
                    <i class="fa-solid fa-check-circle me-1"></i>{{ __('Password updated.') }}
                </span>
            @endif
        </div>
    </form>

    {{-- Style di bawah ini opsional jika sudah ada di file Profile Information, 
         tapi saya sertakan agar aman jika file ini dipanggil secara independen --}}
    <style>
        .glass-section {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
        }

        .section-title {
            color: #f8fafc;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .section-subtitle {
            color: rgba(248, 250, 252, 0.5);
            font-size: 0.85rem;
        }

        .form-label-custom {
            display: block;
            color: rgba(248, 250, 252, 0.7);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .form-control-glass {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control-glass:focus {
            background: rgba(0, 0, 0, 0.3);
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .btn-save-glass {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 0.6rem;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
        }

        .btn-save-glass:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .status-saved {
            color: #10b981;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .invalid-feedback-custom {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.5rem;
        }
    </style>
</section>
