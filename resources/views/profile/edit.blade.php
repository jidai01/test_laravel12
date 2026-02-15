<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <div class="bg-primary/20 p-2 rounded-3 me-3">
                <i class="fa-solid fa-user-gear text-primary fs-4"></i>
            </div>
            <h2 class="fs-4 text-white mb-0">
                {{ __('Account Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 space-y-custom">

                <div class="profile-card-wrapper animate__animated animate__fadeInUp">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="profile-card-wrapper animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="profile-card-wrapper animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Container spacing tanpa Tailwind */
        .space-y-custom>*+* {
            margin-top: 2rem;
        }

        /* Card Wrapper untuk memberikan kedalaman pada glassmorphism */
        .profile-card-wrapper {
            background: rgba(255, 255, 255, 0.01);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .profile-card-wrapper:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        /* Menghilangkan padding bawaan Bootstrap container jika di mobile */
        @media (max-width: 576px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</x-app-layout>
