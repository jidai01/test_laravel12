<section class="glass-section p-4 rounded-4">
    <header class="mb-4">
        <h2 class="section-title">
            <i class="fa-solid fa-user-pen me-2 text-primary"></i>{{ __('Profile Information') }}
        </h2>
        <p class="section-subtitle">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label for="name" class="form-label-custom">{{ __('Name') }}</label>
            <input id="name" name="name" type="text"
                class="form-control-glass @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                required autofocus autocomplete="name" />
            @error('name')
                <div class="invalid-feedback-custom">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label-custom">{{ __('Email') }}</label>
            <input id="email" name="email" type="email"
                class="form-control-glass @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                required autocomplete="username" />
            @error('email')
                <div class="invalid-feedback-custom">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="verification-alert mt-3 p-3 rounded-3">
                    <p class="mb-0">
                        <i
                            class="fa-solid fa-triangle-exclamation me-2"></i>{{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn-link-custom">
                            {{ __('Click here to re-send verification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 success-text small">
                            <i
                                class="fa-solid fa-circle-check me-1"></i>{{ __('A new verification link has been sent.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn-save-glass">
                <i class="fa-solid fa-floppy-disk me-2"></i>{{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="status-saved">
                    <i class="fa-solid fa-check-double me-1"></i>{{ __('Saved.') }}
                </span>
            @endif
        </div>
    </form>

    <style>
        .glass-section {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
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
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-save-glass:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }

        .status-saved {
            color: #10b981;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .verification-alert {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.2);
            color: #fbbf24;
            font-size: 0.85rem;
        }

        .btn-link-custom {
            background: none;
            border: none;
            color: #fff;
            text-decoration: underline;
            padding: 0;
            font-size: 0.85rem;
        }

        .success-text {
            color: #10b981;
        }

        .invalid-feedback-custom {
            color: #ef4444;
            font-size: 0.75rem;
            mt-1;
        }
    </style>
</section>
