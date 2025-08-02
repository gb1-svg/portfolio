<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController; // Import di bagian atas file
use App\Http\Controllers\PublicController; // Import di bagian atas
use App\Http\Controllers\DashboardController; // <--- TAMBAHKAN INI
use Illuminate\Support\Facades\Route;
use App\Models\Project; // Import Project model (masih dibutuhkan jika Anda menggunakannya di tempat lain, tapi tidak wajib di sini lagi)

/*
|--------------------------------------------------------------------------
| Public Routes (Rute yang dapat diakses oleh siapa saja)
|--------------------------------------------------------------------------
*/

// Halaman utama portofolio
Route::get('/', [PublicController::class, 'home'])->name('home');

// Rute untuk menampilkan daftar proyek publik
Route::get('/projects', [PublicController::class, 'projects'])->name('projects.index');
// Rute untuk menampilkan detail proyek berdasarkan slug
Route::get('/projects/{project:slug}', [PublicController::class, 'showProject'])->name('projects.show');

// Rute halaman "Tentang Saya"
Route::get('/about', [PublicController::class, 'about'])->name('about');

// Rute halaman kontak (GET untuk menampilkan form, POST untuk submit form)
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'submitContactForm'])->name('contact.submit');


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Rute yang memerlukan login)
|--------------------------------------------------------------------------
|
| Rute-rute ini akan dilindungi oleh middleware 'auth' dan 'verified'
| yang memastikan pengguna sudah login dan emailnya sudah diverifikasi.
|
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Rute Dashboard (setelah login)
    // UBAH DARI CLOSURE KE CONTROLLER METHOD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // <--- UBAH BARIS INI

    // Rute Admin Panel
    // Semua rute di dalam grup ini akan memiliki prefix 'admin/'
    // dan nama rute akan diawali dengan 'admin.' (misal: admin.projects.index)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('projects', ProjectController::class);
        // Tambahkan rute untuk manajemen setting, user, dll jika perlu di sini
        // Contoh: Route::resource('users', AdminUserController::class);
    });

    // Rute Profil Pengguna (juga dilindungi oleh auth)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Rute otentikasi bawaan Laravel Breeze/Jetstream)
|--------------------------------------------------------------------------
|
| Ini adalah rute yang diperlukan untuk login, register, reset password,
| dan verifikasi email. Jangan diubah kecuali Anda tahu apa yang Anda lakukan.
|
*/
require __DIR__.'/auth.php';