<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            // Cek jika tabel migrations belum ada, atau ingin otomatis migrate
            // Hati-hati: Ini akan sedikit menambah beban saat akses pertama
            try {
                Artisan::call('migrate', ['--force' => true]);

                // Opsional: Seed jika user masih kosong
                if (\App\Models\User::count() === 0) {
                    Artisan::call('db:seed', ['--force' => true]);
                }
            } catch (\Exception $e) {
                // Biarkan gagal agar tidak crash saat diakses
            }
        }
    }
}
