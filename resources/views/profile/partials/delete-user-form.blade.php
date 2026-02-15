<section class="glass-section-danger p-4 rounded-4 mt-4">
    <header class="mb-4">
        <h2 class="section-title text-danger">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ __('Delete Account') }}
        </h2>
        <p class="section-subtitle">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <button class="btn-delete-glass" data-bs-toggle="modal" data-bs-target="#confirmDeletionModal">
        <i class="fa-solid fa-user-xmark me-2"></i>{{ __('Delete Account') }}
    </button>

    <div class="modal fade glass-modal" id="confirmDeletionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger/30">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header-custom border-danger/10">
                        <h5 class="modal-title text-danger">
                            <i class="fa-solid fa-skull-crossbones me-2"></i>{{ __('Confirm Deletion') }}
                        </h5>
                        <button type="button" class="btn-close-custom" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <div class="modal-body-custom">
                        <p class="text-white-50 mb-4">
                            {{ __('Are you sure you want to delete your account? Please enter your password to confirm permanent deletion.') }}
                        </p>

                        <div class="mb-2">
                            <label for="password" class="form-label-custom sr-only">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password"
                                class="form-control-glass @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="{{ __('Confirm with Password') }}" />

                            @if ($errors->userDeletion->get('password'))
                                <div class="invalid-feedback-custom mt-2">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer-custom gap-2">
                        <button type="button" class="btn-modal-secondary" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn-modal-danger">
                            {{ __('Permanently Delete') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .glass-section-danger {
            background: rgba(239, 68, 68, 0.03);
            border: 1px solid rgba(239, 68, 68, 0.15);
            backdrop-filter: blur(10px);
        }

        .btn-delete-glass {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 0.6rem 1.5rem;
            border-radius: 0.6rem;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-delete-glass:hover {
            background: #ef4444;
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-modal-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-modal-danger {
            background: #ef4444;
            border: none;
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Re-using some classes from previous components for consistency */
        .border-danger\/30 {
            border-color: rgba(239, 68, 68, 0.3) !important;
        }

        .border-danger\/10 {
            border-color: rgba(239, 68, 68, 0.1) !important;
        }
    </style>
</section>
