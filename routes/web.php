<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

/**
 * Clean URL Handler
 * Route ini menangkap semua path (seperti /skills, /projects, /contact) 
 * dan tetap menampilkan halaman yang sama (welcome.blade.php).
 * JavaScript di sisi klien kemudian akan menangani scroll ke section yang tepat.
 */
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api|admin).*$');

Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');