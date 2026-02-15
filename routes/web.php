<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Tambahkan rute ini agar saat refresh browser tidak 404
Route::get('/skills', function () { return view('welcome'); });
Route::get('/projects', function () { return view('welcome'); });
Route::get('/experience', function () { return view('welcome'); });
Route::get('/contact', function () { return view('welcome'); });

// Route untuk menerima pesan dari form kontak
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');


/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard: Sekarang menggunakan Controller untuk ambil data pesan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur hapus pesan di dashboard
    Route::delete('/dashboard/contact/{id}', [DashboardController::class, 'destroy'])->name('contact.destroy');

    // Profile Admin (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/deploy-db-12345', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);
        return "Database migrated & seeded successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
