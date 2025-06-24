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





// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Artisan;
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

// // ==============================
// // ⚙️ ROUTE BANTUAN UNTUK DEPLOY DI RAILWAY
// // ==============================
// Route::get('/run-fix', function () {
//     Artisan::call('config:clear');
//     Artisan::call('cache:clear');
//     Artisan::call('view:clear');
//     Artisan::call('migrate', ['--force' => true]);

//     return 'All clear + migrate success!';
// });



// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Artisan;
// use Illuminate\Support\Facades\Response;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use App\Http\Controllers\AbsenController;
// use App\Http\Controllers\PresenceController;
// use App\Http\Controllers\PresenceDetailController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\RisalahController;
// use App\Http\Controllers\UndanganController;
// use App\Http\Controllers\SusunanController;
// use App\Http\Controllers\MateriController;
// use App\Http\Controllers\RapatController;
// use App\Http\Controllers\KuisController;
// use App\Http\Controllers\SurveyController;



// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Ini adalah file untuk mendefinisikan semua route web aplikasi kamu.
// |
// */
// Route::get('/', function () {
//     return redirect()->route('home');
// });


// // Redirect root URL ke halaman Riwayat Agenda
// // Route::get('/', function () {
// //     return redirect()->route('presence.index');
// // });

// // ==============================
// // 📌 ROUTE UNTUK PENGGUNA PUBLIK
// // ==============================
// Route::get('absen/{slug}', [AbsenController::class, 'index'])->name('absen.index');
// Route::post('absen/save/{id}', [AbsenController::class, 'save'])->name('absen.save');

// // ✅ QR Code download (public)
// Route::get('/presence/{slug}/download-qrcode', function ($slug) {
//     $url = route('absen.index', $slug);
//     $image = QrCode::format('png')->size(300)->generate($url);

//     return Response::make($image, 200, [
//         'Content-Type' => 'image/png',
//         'Content-Disposition' => 'attachment; filename="qrcode.png"'
//     ]);
// })->name('presence.qrcode.download');


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
//     // Upload
//     Route::post('/presence/upload-bukti/{id}', [PresenceController::class, 'uploadBukti'])->name('presence.upload.bukti');
//     Route::delete('/presence/delete-bukti/{id}', [PresenceController::class, 'deleteBukti'])->name('presence.delete.bukti');


//     Route::get('/undangan', [UndanganController::class, 'index'])->name('undangan.index');
//     Route::get('/susunan', [SusunanController::class, 'index'])->name('susunan.index');
//     Route::get('/rapat', [RapatController::class, 'index'])->name('rapat.index');
//     Route::get('/rapat/zoom', [RapatController::class, 'zoom'])->name('rapat.zoom');

// // Route untuk redirect ke Google Meet
// Route::get('/rapat/gmeet', [RapatController::class, 'gmeet'])->name('rapat.gmeet');
//     Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
//     Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
//     Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');

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

// // ==============================
// // ⚙️ ROUTE BANTUAN UNTUK DEPLOY DI RAILWAY
// // ==============================
// Route::get('/run-fix', function () {
//     Artisan::call('config:clear');
//     Artisan::call('cache:clear');
//     Artisan::call('view:clear');
//     Artisan::call('migrate', ['--force' => true]);

//     return 'All clear + migrate success!';
// });




use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\PresenceDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RisalahController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\SusunanController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\KonsumsiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah file untuk mendefinisikan semua route web aplikasi kamu.
|
*/

// ✅ Redirect root ke dashboard (home)
Route::get('/', function () {
    return redirect()->route('home');
});

// ==============================
// 📌 ROUTE UNTUK PENGGUNA PUBLIK
// ==============================

// 🔘 Absen Publik
Route::get('absen/{slug}', [AbsenController::class, 'index'])->name('absen.index');
Route::post('absen/save/{id}', [AbsenController::class, 'save'])->name('absen.save');

// 🔘 Download QR Code (publik)
Route::get('/presence/{slug}/download-qrcode', function ($slug) {
    $url = route('absen.index', $slug);
    $image = QrCode::format('png')->size(300)->generate($url);

    return Response::make($image, 200, [
        'Content-Type' => 'image/png',
        'Content-Disposition' => 'attachment; filename="qrcode.png"'
    ]);
})->name('presence.qrcode.download');

// ==============================
// 🔒 ROUTE UNTUK USER YANG LOGIN
// ==============================
Route::middleware(['auth'])->group(function () {

    // ✅ Dashboard (home)
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // User Management
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    // 📅 Presence (Agenda)
    Route::resource('presence', PresenceController::class);

    // 🧾 Presence Detail
    Route::delete('presence-detail/{id}', [PresenceDetailController::class, 'destroy'])->name('presence-detail.destroy');
    Route::get('presence-detail/export-pdf/{id}', [PresenceDetailController::class, 'exportPdf'])->name('presence-detail.export-pdf');

    // 📤 Upload & Delete Bukti Kegiatan
    Route::post('/presence/upload-bukti/{id}', [PresenceController::class, 'uploadBukti'])->name('presence.upload.bukti');
    Route::delete('/presence/delete-bukti/{id}', [PresenceController::class, 'deleteBukti'])->name('presence.delete.bukti');

    // 📩 Undangan
    // Route::get('/undangan', [UndanganController::class, 'index'])->name('undangan.index');

    // 🗂️ Susunan Acara
    Route::get('/susunan', [SusunanController::class, 'index'])->name('susunan.index');

    // 👥 Rapat
    Route::get('/rapat', [RapatController::class, 'index'])->name('rapat.index');
    Route::get('/rapat/zoom', [RapatController::class, 'zoom'])->name('rapat.zoom');
    Route::get('/rapat/gmeet', [RapatController::class, 'gmeet'])->name('rapat.gmeet');

    // 📚 Materi
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');

    // ❓ Kuis
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');

    // 📊 Survey
    Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');

    // 📄 Risalah
    Route::get('/risalah', [RisalahController::class, 'index'])->name('risalah.index');
    Route::get('/risalah/create', [RisalahController::class, 'create'])->name('risalah.create');
    Route::post('/risalah', [RisalahController::class, 'store'])->name('risalah.store');

    // Kalkulator
    Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator.index');

    // Konsumsi
    Route::get('/konsumsi', [KonsumsiController::class, 'index'])->name('konsumsi.index');

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
