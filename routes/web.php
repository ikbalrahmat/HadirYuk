<?php

// use App\Http\Controllers\AbsenController;
// use App\Http\Controllers\PresenceController;
// use App\Http\Controllers\PresenceDetailController;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;

// // Route::get('/', function () {
// //     return redirect()->route('home');
// // });
// // Route::get('/', function () {
// //     return redirect()->route('presence'); // atau langsung '/presence'
// // });

// Route::get('/', function () {
//     return redirect()->route('presence.index'); // ✅ Nama route yang benar
// });


// // Admin
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::resource('presence', PresenceController::class);
//     Route::delete('presence-detail/{id}', [PresenceDetailController::class, 'destroy'])->name('presence-detail.destroy');
//     Route::get('presence-detail/export-pdf/{id}', [PresenceDetailController::class, 'exportPdf'])->name('presence-detail.export-pdf');
// });

// // Publik
// Route::get('absen/{slug}', [AbsenController::class, 'index'])->name('absen.index');
// Route::post('absen/save/{id}', [AbsenController::class, 'save'])->name('absen.save');

// // Auth
// Auth::routes([
//     'register' => false, // Ganti register jadi true jika ingin mengaktifkan fitur register
//     'reset' => false
// ]);



// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\AbsenController;
// use App\Http\Controllers\PresenceController;
// use App\Http\Controllers\PresenceDetailController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\RisalahController; // ✅ Tambahkan ini

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// */

// // Redirect root URL ke halaman riwayat agenda
// Route::get('/', function () {
//     return redirect()->route('presence.index');
// });

// // Route untuk pengguna publik (Absen)
// Route::get('absen/{slug}', [AbsenController::class, 'index'])->name('absen.index');
// Route::post('absen/save/{id}', [AbsenController::class, 'save'])->name('absen.save');

// // Route untuk pengguna yang login (Admin, Auditor, dll)
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

//     // Presence / Agenda
//     Route::resource('presence', PresenceController::class);

//     // Detail Presence
//     Route::delete('presence-detail/{id}', [PresenceDetailController::class, 'destroy'])->name('presence-detail.destroy');
//     Route::get('presence-detail/export-pdf/{id}', [PresenceDetailController::class, 'exportPdf'])->name('presence-detail.export-pdf');

//     // ✅ Risalah
//     Route::get('/risalah', [RisalahController::class, 'index'])->name('risalah.index');
//     Route::post('/risalah', [RisalahController::class, 'store'])->name('risalah.store');
// });

// // Auth bawaan Laravel
// Auth::routes([
//     'register' => false, // Ganti ke true jika ingin fitur register
//     'reset' => false     // Nonaktifkan reset password
// ]);




// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\AbsenController;
// use App\Http\Controllers\PresenceController;
// use App\Http\Controllers\PresenceDetailController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\RisalahController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Ini adalah file untuk mendefinisikan semua route web aplikasi kamu.
// |
// */

// // Redirect root URL ke halaman Riwayat Agenda
// Route::get('/', function () {
//     return redirect()->route('presence.index');
// });

// // ==============================
// // 📌 ROUTE UNTUK PENGGUNA PUBLIK
// // ==============================
// Route::get('absen/{slug}', [AbsenController::class, 'index'])->name('absen.index');
// Route::post('absen/save/{id}', [AbsenController::class, 'save'])->name('absen.save');

// // ==============================
// // 🔒 ROUTE UNTUK USER YANG LOGIN
// // ==============================
// Route::middleware(['auth'])->group(function () {

//     // Dashboard Home
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

//     // 📅 Presence (Agenda)
//     Route::resource('presence', PresenceController::class);

//     // 🧾 Presence Detail
//     Route::delete('presence-detail/{id}', [PresenceDetailController::class, 'destroy'])->name('presence-detail.destroy');
//     Route::get('presence-detail/export-pdf/{id}', [PresenceDetailController::class, 'exportPdf'])->name('presence-detail.export-pdf');

//     // 📝 Risalah
//     Route::get('/risalah', [RisalahController::class, 'index'])->name('risalah.index');
//     Route::get('/risalah/create', [RisalahController::class, 'create'])->name('risalah.create');
//     Route::post('/risalah', [RisalahController::class, 'store'])->name('risalah.store');

// });

// // ==============================
// // 🔐 AUTENTIKASI (LOGIN/LOGOUT)
// // ==============================
// Auth::routes([
//     'register' => false, // Disable pendaftaran user
//     'reset' => false     // Disable reset password
// ]);





use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\PresenceDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RisalahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah file untuk mendefinisikan semua route web aplikasi kamu.
|
*/

// Redirect root URL ke halaman Riwayat Agenda
Route::get('/', function () {
    return redirect()->route('presence.index');
});

// ==============================
// 📌 ROUTE UNTUK PENGGUNA PUBLIK
// ==============================
Route::get('absen/{slug}', [AbsenController::class, 'index'])->name('absen.index');
Route::post('absen/save/{id}', [AbsenController::class, 'save'])->name('absen.save');

// ==============================
// 🔒 ROUTE UNTUK USER YANG LOGIN
// ==============================
Route::middleware(['auth'])->group(function () {

    // Dashboard Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // 📅 Presence (Agenda)
    Route::resource('presence', PresenceController::class);

    // 🧾 Presence Detail
    Route::delete('presence-detail/{id}', [PresenceDetailController::class, 'destroy'])->name('presence-detail.destroy');
    Route::get('presence-detail/export-pdf/{id}', [PresenceDetailController::class, 'exportPdf'])->name('presence-detail.export-pdf');

    // 📝 Risalah
    Route::get('/risalah', [RisalahController::class, 'index'])->name('risalah.index');
    Route::get('/risalah/create', [RisalahController::class, 'create'])->name('risalah.create');
    Route::post('/risalah', [RisalahController::class, 'store'])->name('risalah.store');

});

// ==============================
// 🔐 AUTENTIKASI (LOGIN/LOGOUT)
// ==============================
Auth::routes([
    'register' => false, // Disable pendaftaran user
    'reset' => false     // Disable reset password
]);

// ==============================
// ⚙️ ROUTE BANTUAN UNTUK DEPLOY DI RAILWAY
// ==============================
Route::get('/run-fix', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('migrate', ['--force' => true]);

    return 'All clear + migrate success!';
});
