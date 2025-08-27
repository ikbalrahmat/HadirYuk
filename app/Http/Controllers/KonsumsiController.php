<?php

// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PDF; // Pastikan ini di-import

// class KonsumsiController extends Controller
// {
//     public function index()
//     {
//         // Jika user adalah Yanum (Karawang/Jakarta), tampilkan semua data
//         if (Auth::user()->hasRole('yanum_karawang') || Auth::user()->hasRole('yanum_jakarta')) {
//             $konsumsis = Konsumsi::all();
//         } else {
//             // Jika bukan, hanya tampilkan data milik unit kerja user yang sedang login
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     public function create()
//     {
//         return view('pages.konsumsi.create');
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde' => 'required|string|max:255',
//             'tahun_anggaran_rapat' => 'required|integer',
//             'agenda_rapat' => 'required|string',
//             'tanggal_rapat' => 'required|date',
//             'jam_rapat' => 'required',
//             'unggah_dokumen_nde' => 'nullable|file|mimes:pdf|max:2048', // Contoh validasi file
//             'menu_konsumsi' => 'required|array',
//             'menu_konsumsi.*.menu' => 'required|string',
//             'menu_konsumsi.*.jumlah' => 'required|integer|min:1',
//             'distribusi_tujuan' => 'required|string',
//             'lokasi_unit_kerja' => 'required|string',
//             'catatan' => 'nullable|string',
//         ]);

//         // Asumsi user memiliki kolom unit_kerja di tabel users
//         $validatedData['unit_kerja'] = Auth::user()->unit_kerja;

//         // Simpan dokumen jika ada
//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     public function edit(Konsumsi $konsumsi)
//     {
//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         // Validasi untuk Yanum
//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai',
//         ]);

//         $konsumsi->update([
//             'total_biaya' => $request->total_biaya,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//     }

//     public function destroy(Konsumsi $konsumsi)
//     {
//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PDF; // Pastikan library ini sudah diinstal

// class KonsumsiController extends Controller
// {
//     /**
//      * Menampilkan daftar pemesanan konsumsi berdasarkan role.
//      * Admin/Yanum bisa melihat semua pesanan, Unit Kerja hanya melihat pesanan sendiri.
//      */
//     public function index()
//     {
//         // Jika user adalah Admin atau Yanum, tampilkan semua data
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::all();
//         } else {
//             // Jika bukan, hanya tampilkan data milik unit kerja user yang sedang login
//             // Asumsi ada kolom 'unit_kerja' di tabel users
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     /**
//      * Menampilkan formulir untuk membuat pemesanan baru.
//      */
//     public function create()
//     {
//         return view('pages.konsumsi.create');
//     }

//     /**
//      * Menyimpan pemesanan baru yang diajukan oleh Unit Kerja.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde' => 'required|string|max:255',
//             'tahun_anggaran_rapat' => 'required|integer',
//             'agenda_rapat' => 'required|string',
//             'tanggal_rapat' => 'required|date',
//             'jam_rapat' => 'required',
//             'unggah_dokumen_nde' => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi' => 'required|array',
//             'menu_konsumsi.*.menu' => 'required|string',
//             'menu_konsumsi.*.jumlah' => 'required|integer|min:1',
//             'distribusi_tujuan' => 'required|string',
//             'lokasi_unit_kerja' => 'required|string',
//             'catatan' => 'nullable|string',
//         ]);

//         $validatedData['unit_kerja'] = Auth::user()->unit_kerja;

//         // Simpan dokumen jika ada
//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     /**
//      * Menampilkan formulir edit (khusus untuk Yanum) untuk menginput biaya.
//      */
//     public function edit(Konsumsi $konsumsi)
//     {
//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     /**
//      * Memperbarui pesanan (khusus untuk Yanum) untuk mengisi biaya dan status.
//      */
//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         // Validasi untuk Yanum
//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai',
//         ]);

//         $konsumsi->update([
//             'total_biaya' => $request->total_biaya,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//     }

//     /**
//      * Menghapus pesanan.
//      */
//     public function destroy(Konsumsi $konsumsi)
//     {
//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     /**
//      * Menghasilkan dan mengunduh file PDF untuk pesanan tertentu.
//      */
//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         // Panggil view khusus untuk PDF dan kirim data
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));

//         // Unduh file PDF dengan nama yang sesuai
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use App\Models\Anggaran; // Tambahkan ini
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PDF;

// class KonsumsiController extends Controller
// {
//     /**
//      * Menampilkan daftar pemesanan konsumsi berdasarkan role.
//      */
//     public function index()
//     {
//         // Periksa apakah user memiliki salah satu dari role ini
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::all();
//         } else {
//             // Jika bukan, hanya tampilkan data milik unit kerja user yang sedang login
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     /**
//      * Menampilkan formulir untuk membuat pemesanan baru.
//      */
//     public function create()
//     {
//         // Ambil daftar unit kerja dari tabel Anggaran
//         $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique(); // Perbaikan: Ambil data dari tabel anggaran

//         // Kirim data unit kerja ke view
//         return view('pages.konsumsi.create', compact('unitKerjas'));
//     }

//     /**
//      * Menyimpan pemesanan baru yang diajukan.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde'       => 'required|string|max:255',
//             'tahun_anggaran_rapat'  => 'required|integer',
//             'agenda_rapat'          => 'required|string',
//             'tanggal_rapat'         => 'required|date',
//             'jam_rapat'             => 'required',
//             'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi'         => 'required|array',
//             'menu_konsumsi.*.menu'  => 'required|string',
//             'menu_konsumsi.*.jumlah' => 'required|integer|min:1',
//             'distribusi_tujuan'     => 'required|string',
//             'lokasi_unit_kerja'     => 'required|string',
//             'catatan'               => 'nullable|string',
//         ]);

//         // Perbaikan: unit_kerja diambil dari form, tidak lagi dari Auth::user()
//         $validatedData['unit_kerja'] = $validatedData['lokasi_unit_kerja']; // Gunakan data dari form

//         // Simpan dokumen jika ada
//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         // Cek anggaran sebelum membuat pemesanan
//         $anggaran = Anggaran::where('nama_unit_kerja', $validatedData['unit_kerja'])
//                             ->where('tahun_anggaran', $validatedData['tahun_anggaran_rapat'])
//                             ->first();

//         if (!$anggaran) {
//              return redirect()->back()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
//         }

//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     /**
//      * Menampilkan formulir edit (khusus untuk Yanum dan Admin).
//      */
//     public function edit(Konsumsi $konsumsi)
//     {
//         // Perbaikan: Tambah pengecekan role
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     /**
//      * Memperbarui pesanan (khusus untuk Yanum dan Admin).
//      */
//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         // Perbaikan: Tambah pengecekan role
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai',
//         ]);

//         $konsumsi->update([
//             'total_biaya' => $request->total_biaya,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//     }

//     /**
//      * Menghapus pesanan.
//      */
//     public function destroy(Konsumsi $konsumsi)
//     {
//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     /**
//      * Menghasilkan dan mengunduh file PDF untuk pesanan tertentu.
//      */
//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use App\Models\Anggaran;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PDF;

// class KonsumsiController extends Controller
// {
//     /**
//      * Menampilkan daftar pemesanan konsumsi berdasarkan role.
//      */
//     public function index()
//     {
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::all();
//         } else {
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     /**
//      * Menampilkan formulir untuk membuat pemesanan baru.
//      */
//     public function create()
//     {
//         $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique();

//         return view('pages.konsumsi.create', compact('unitKerjas'));
//     }

//     /**
//      * Menyimpan pemesanan baru yang diajukan.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde'       => 'required|string|max:255',
//             'unit_kerja'            => 'required|string|max:255',
//             'tahun_anggaran_rapat'  => 'required|integer',
//             'agenda_rapat'          => 'required|string',
//             'tanggal_rapat'         => 'required|date',
//             'jam_rapat'             => 'required',
//             'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi'         => 'required|array',
//             'menu_konsumsi.*.menu'  => 'required|string',
//             'menu_konsumsi.*.detail' => 'nullable|string',
//             'menu_konsumsi.*.jumlah' => 'required|integer|min:1',
//             'distribusi_tujuan'     => 'required|string',
//             'lokasi_unit_kerja'     => 'required|string',
//             'catatan'               => 'nullable|string',
//         ]);

//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         $anggaran = Anggaran::where('nama_unit_kerja', $validatedData['unit_kerja'])
//                             ->where('tahun_anggaran', $validatedData['tahun_anggaran_rapat'])
//                             ->first();

//         if (!$anggaran) {
//             return redirect()->back()->withInput()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
//         }

//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     /**
//      * Menampilkan formulir edit (khusus untuk Yanum dan Admin).
//      */
//     public function edit(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     /**
//      * Memperbarui pesanan (khusus untuk Yanum dan Admin).
//      */
//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai',
//         ]);

//         $konsumsi->update([
//             'total_biaya' => $request->total_biaya,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//     }

//     /**
//      * Menghapus pesanan.
//      */
//     public function destroy(Konsumsi $konsumsi)
//     {
//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     /**
//      * Menghasilkan dan mengunduh file PDF untuk pesanan tertentu.
//      */
//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }




// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use App\Models\Anggaran;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PDF;

// class KonsumsiController extends Controller
// {
//     /**
//      * Menampilkan daftar pemesanan konsumsi berdasarkan role.
//      */
//     public function index()
//     {
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::all();
//         } else {
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     /**
//      * Menampilkan formulir untuk membuat pemesanan baru.
//      */
//     public function create()
//     {
//         $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique();
//         return view('pages.konsumsi.create', compact('unitKerjas'));
//     }

//     /**
//      * Menyimpan pemesanan baru yang diajukan.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde'       => 'required|string|max:255',
//             'unit_kerja'            => 'required|string|max:255',
//             'tahun_anggaran_rapat'  => 'required|integer',
//             'agenda_rapat'          => 'required|string',
//             'tanggal_rapat'         => 'required|date',
//             'jam_rapat'             => 'required',
//             'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi'         => 'required|array',
//             'menu_konsumsi.*.menu'  => 'required|string',
//             'menu_konsumsi.*.detail' => 'nullable|string',
//             'menu_konsumsi.*.jumlah' => 'required|integer|min:1',
//             'distribusi_tujuan'     => 'required|string',
//             'lokasi_unit_kerja'     => 'required|string',
//             'catatan'               => 'nullable|string',
//         ]);

//         // Upload file jika ada
//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         // Normalisasi input
//         $unitKerjaInput = trim(strtolower($validatedData['unit_kerja']));
//         $tahunInput = $validatedData['tahun_anggaran_rapat'];

//         // Hanya cek anggaran kalau BUKAN admin / yanum
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [$unitKerjaInput])
//                 ->where('tahun_anggaran', $tahunInput)
//                 ->first();

//             // Debug log untuk analisis jika gagal
//             \Log::info('=== Debug Pengecekan Anggaran ===', [
//                 'unit_kerja_input' => $unitKerjaInput,
//                 'tahun_input' => $tahunInput,
//                 'semua_anggaran' => Anggaran::all()->toArray(),
//                 'anggaran_ditemukan' => $anggaran ? $anggaran->toArray() : null
//             ]);

//             if (!$anggaran) {
//                 return redirect()->back()->withInput()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
//             }
//         }

//         // Simpan data konsumsi
//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     /**
//      * Menampilkan formulir edit (khusus untuk Yanum dan Admin).
//      */
//     public function edit(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     /**
//      * Memperbarui pesanan (khusus untuk Yanum dan Admin).
//      */
//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai',
//         ]);

//         $konsumsi->update([
//             'total_biaya' => $request->total_biaya,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//     }

//     /**
//      * Menghapus pesanan.
//      */
//     public function destroy(Konsumsi $konsumsi)
//     {
//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     /**
//      * Menghasilkan dan mengunduh file PDF untuk pesanan tertentu.
//      */
//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }




// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use App\Models\Anggaran;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PDF;

// class KonsumsiController extends Controller
// {
//     public function index()
//     {
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::all();
//         } else {
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     public function create()
//     {
//         $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique();
//         return view('pages.konsumsi.create', compact('unitKerjas'));
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde'       => 'required|string|max:255',
//             'unit_kerja'            => 'required|string|max:255',
//             'tahun_anggaran_rapat'  => 'required|integer',
//             'agenda_rapat'          => 'required|string',
//             'tanggal_rapat'         => 'required|date',
//             'jam_rapat'             => 'required',
//             'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi'         => 'required|array',
//             'menu_konsumsi.*.menu'  => 'required|string',
//             'menu_konsumsi.*.detail' => 'nullable|string',
//             'menu_konsumsi.*.jumlah' => 'required|integer|min:1',
//             'distribusi_tujuan'     => 'required|string',
//             'lokasi_unit_kerja'     => 'required|string',
//             'catatan'               => 'nullable|string',
//         ]);

//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         $unitKerjaInput = trim(strtolower($validatedData['unit_kerja']));
//         $tahunInput = $validatedData['tahun_anggaran_rapat'];

//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [$unitKerjaInput])
//                 ->where('tahun_anggaran', $tahunInput)
//                 ->first();

//             if (!$anggaran) {
//                 return redirect()->back()->withInput()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
//             }
//         }

//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     public function edit(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai,Ditolak',
//         ]);

//         $statusLama = $konsumsi->status;

//         $konsumsi->update([
//             'total_biaya' => $request->total_biaya,
//             'status' => $request->status,
//         ]);

//         // Kurangi anggaran jika baru disetujui
//         if ($request->status === 'Disetujui' && $statusLama !== 'Disetujui') {
//             $anggaran = Anggaran::where('nama_unit_kerja', $konsumsi->unit_kerja)
//                 ->where('tahun_anggaran', $konsumsi->tahun_anggaran_rapat)
//                 ->first();

//             if ($anggaran) {
//                 if ($anggaran->sisa_anggaran < $request->total_biaya) {
//                     return redirect()->back()->with('error', 'Sisa anggaran tidak mencukupi!');
//                 }
//                 $anggaran->update([
//                     'sisa_anggaran' => $anggaran->sisa_anggaran - $request->total_biaya
//                 ]);
//             }
//         }

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//     }

//     public function destroy(Konsumsi $konsumsi)
//     {
//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use App\Models\Anggaran;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use PDF; // pastikan ter-install jika mau export pdf

// class KonsumsiController extends Controller
// {
//     public function index()
//     {
//         // Admin / Yanum melihat semua, user melihat miliknya (berdasarkan unit kerja)
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::orderBy('created_at', 'desc')->get();
//         } else {
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)
//                 ->orderBy('created_at', 'desc')
//                 ->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     public function create()
//     {
//         // Ambil list unit kerja dari anggaran
//         $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique();
//         return view('pages.konsumsi.create', compact('unitKerjas'));
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde'       => 'required|string|max:255',
//             'unit_kerja'            => 'required|string|max:255',
//             'tahun_anggaran_rapat'  => 'required|integer',
//             'agenda_rapat'          => 'required|string',
//             'tanggal_rapat'         => 'required|date',
//             'jam_rapat'             => 'required',
//             'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi'         => 'required|array|min:1',
//             'menu_konsumsi.*.menu'  => 'required|string',
//             'menu_konsumsi.*.detail'=> 'nullable|string',
//             'menu_konsumsi.*.jumlah'=> 'required|integer|min:1',
//             'distribusi_tujuan'     => 'required|string',
//             'lokasi_unit_kerja'     => 'required|string',
//             'catatan'               => 'nullable|string',
//         ]);

//         // Upload file jika ada
//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         // Hati-hati: hanya mengecek anggaran untuk user biasa
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $unitKerjaInput = trim(strtolower($validatedData['unit_kerja']));
//             $tahunInput = $validatedData['tahun_anggaran_rapat'];

//             $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [$unitKerjaInput])
//                 ->where('tahun_anggaran', $tahunInput)
//                 ->first();

//             if (!$anggaran) {
//                 return redirect()->back()->withInput()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
//             }
//         }

//         // Simpan
//         $createData = [
//             'nomor_surat_nde' => $validatedData['nomor_surat_nde'],
//             'unit_kerja' => $validatedData['unit_kerja'],
//             'tahun_anggaran_rapat' => $validatedData['tahun_anggaran_rapat'],
//             'agenda_rapat' => $validatedData['agenda_rapat'],
//             'tanggal_rapat' => $validatedData['tanggal_rapat'],
//             'jam_rapat' => $validatedData['jam_rapat'],
//             'unggah_dokumen_nde' => $validatedData['unggah_dokumen_nde'] ?? null,
//             'menu_konsumsi' => $validatedData['menu_konsumsi'], // casts => array
//             'distribusi_tujuan' => $validatedData['distribusi_tujuan'],
//             'lokasi_unit_kerja' => $validatedData['lokasi_unit_kerja'],
//             'catatan' => $validatedData['catatan'] ?? null,
//             'status' => 'Menunggu',
//             'total_biaya' => null,
//         ];

//         Konsumsi::create($createData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     public function show(Konsumsi $konsumsi)
//     {
//         // akses: owner (unit) atau admin/yanum
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             if ($konsumsi->unit_kerja !== Auth::user()->unit_kerja) {
//                 abort(403, 'Akses ditolak.');
//             }
//         }
//         return view('pages.konsumsi.show', compact('konsumsi'));
//     }

//     public function edit(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai,Ditolak',
//         ]);

//         $oldStatus = $konsumsi->status;
//         $newStatus = $request->status;
//         $newTotal = (float) $request->total_biaya;

//         DB::beginTransaction();
//         try {
//             // Jika ingin menyetujui -> cek anggaran & kurangi
//             if ($newStatus === 'Disetujui' && $oldStatus !== 'Disetujui') {
//                 $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [strtolower(trim($konsumsi->unit_kerja))])
//                     ->where('tahun_anggaran', $konsumsi->tahun_anggaran_rapat)
//                     ->lockForUpdate()
//                     ->first();

//                 if (!$anggaran) {
//                     DB::rollBack();
//                     return redirect()->back()->with('error', 'Anggaran unit tidak ditemukan.');
//                 }

//                 // Pastikan anggaran cukup
//                 if ($anggaran->jumlah_anggaran < $newTotal) {
//                     DB::rollBack();
//                     return redirect()->back()->with('error', 'Anggaran tidak mencukupi. Tidak dapat menyetujui pemesanan ini.');
//                 }

//                 // kurangi anggaran
//                 $anggaran->jumlah_anggaran = $anggaran->jumlah_anggaran - $newTotal;
//                 $anggaran->save();
//             }

//             // Jika sebelumnya Disetujui lalu diubah ke yang lain dan total biaya sudah dikurangi sebelumnya,
//             // Anda mungkin ingin meng-handle rollback anggaran. Untuk saat ini kita hanya kurangi sekali saat ubah ke Disetujui.
//             // (Jika butuh undo ketika Disetujui-->Ditolak, tambahkan log perubahan anggaran atau reverse).
//             $konsumsi->update([
//                 'total_biaya' => $newTotal,
//                 'status' => $newStatus,
//             ]);

//             DB::commit();
//             return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//         } catch (\Throwable $e) {
//             DB::rollBack();
//             \Log::error('Gagal update konsumsi: '.$e->getMessage());
//             return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses update.');
//         }
//     }

//     public function destroy(Konsumsi $konsumsi)
//     {
//         // Hapus hanya boleh owner sebelum disetujui atau admin boleh kapan saja
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             if ($konsumsi->status !== 'Menunggu' || $konsumsi->unit_kerja !== Auth::user()->unit_kerja) {
//                 return redirect()->route('konsumsi.index')->with('error', 'Tidak bisa menghapus pesanan yang bukan milik Anda atau yang sudah diproses.');
//             }
//         }

//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\Konsumsi;
// use App\Models\Anggaran;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use PDF;

// class KonsumsiController extends Controller
// {
//     public function index()
//     {
//         if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $konsumsis = Konsumsi::orderBy('created_at', 'desc')->get();
//         } else {
//             $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)
//                 ->orderBy('created_at', 'desc')
//                 ->get();
//         }

//         return view('pages.konsumsi.index', compact('konsumsis'));
//     }

//     public function create()
//     {
//         $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique();
//         return view('pages.konsumsi.create', compact('unitKerjas'));
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nomor_surat_nde'       => 'required|string|max:255',
//             'unit_kerja'            => 'required|string|max:255',
//             'tahun_anggaran_rapat'  => 'required|integer',
//             'agenda_rapat'          => 'required|string',
//             'tanggal_rapat'         => 'required|date',
//             'jam_rapat'             => 'required',
//             'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
//             'menu_konsumsi'         => 'required|array|min:1',
//             'menu_konsumsi.*.menu'  => 'required|string',
//             'menu_konsumsi.*.detail'=> 'nullable|string',
//             'menu_konsumsi.*.jumlah'=> 'required|integer|min:1',
//             'distribusi_tujuan'     => 'required|string',
//             'lokasi_unit_kerja'     => 'required|string',
//             'catatan'               => 'nullable|string',
//         ]);

//         if ($request->hasFile('unggah_dokumen_nde')) {
//             $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents');
//         }

//         // Cek anggaran kalau user biasa
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [strtolower(trim($validatedData['unit_kerja']))])
//                 ->where('tahun_anggaran', $validatedData['tahun_anggaran_rapat'])
//                 ->first();

//             if (!$anggaran) {
//                 return redirect()->back()->withInput()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
//             }
//         }

//         $validatedData['status'] = 'Menunggu';
//         $validatedData['total_biaya'] = null;

//         Konsumsi::create($validatedData);

//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
//     }

//     public function show(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']) &&
//             $konsumsi->unit_kerja !== Auth::user()->unit_kerja) {
//             abort(403, 'Akses ditolak.');
//         }

//         return view('pages.konsumsi.show', compact('konsumsi'));
//     }

//     public function edit(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         return view('pages.konsumsi.edit', compact('konsumsi'));
//     }

//     public function update(Request $request, Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
//             abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
//         }

//         $request->validate([
//             'total_biaya' => 'required|numeric|min:0',
//             'status' => 'required|in:Menunggu,Disetujui,Selesai,Ditolak',
//         ]);

//         $oldStatus = $konsumsi->status;
//         $oldBiaya = (float) $konsumsi->total_biaya;
//         $newStatus = $request->status;
//         $newBiaya = (float) $request->total_biaya;

//         DB::beginTransaction();
//         try {
//             $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [strtolower(trim($konsumsi->unit_kerja))])
//                 ->where('tahun_anggaran', $konsumsi->tahun_anggaran_rapat)
//                 ->lockForUpdate()
//                 ->first();

//             if ($anggaran) {
//                 // Kasus: Menunggu/Ditolak → Disetujui → Kurangi saldo
//                 if ($newStatus === 'Disetujui' && $oldStatus !== 'Disetujui') {
//                     if ($anggaran->saldo_saat_ini < $newBiaya) {
//                         DB::rollBack();
//                         return redirect()->back()->with('error', 'Saldo anggaran tidak mencukupi.');
//                     }
//                     $anggaran->saldo_saat_ini -= $newBiaya;
//                     $anggaran->save();
//                 }

//                 // Kasus: Disetujui → Menunggu/Ditolak → Kembalikan saldo
//                 if ($oldStatus === 'Disetujui' && $newStatus !== 'Disetujui') {
//                     $anggaran->saldo_saat_ini += $oldBiaya;
//                     $anggaran->save();
//                 }

//                 // Kasus: Disetujui → Disetujui (ubah biaya) → Sesuaikan saldo
//                 if ($oldStatus === 'Disetujui' && $newStatus === 'Disetujui' && $oldBiaya !== $newBiaya) {
//                     $selisih = $newBiaya - $oldBiaya;
//                     if ($selisih > 0 && $anggaran->saldo_saat_ini < $selisih) {
//                         DB::rollBack();
//                         return redirect()->back()->with('error', 'Saldo anggaran tidak mencukupi untuk perubahan biaya.');
//                     }
//                     $anggaran->saldo_saat_ini -= $selisih;
//                     $anggaran->save();
//                 }
//             }

//             $konsumsi->update([
//                 'total_biaya' => $newBiaya,
//                 'status' => $newStatus,
//             ]);

//             DB::commit();
//             return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
//         } catch (\Throwable $e) {
//             DB::rollBack();
//             \Log::error('Gagal update konsumsi: ' . $e->getMessage());
//             return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses update.');
//         }
//     }

//     public function destroy(Konsumsi $konsumsi)
//     {
//         if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']) &&
//             ($konsumsi->status !== 'Menunggu' || $konsumsi->unit_kerja !== Auth::user()->unit_kerja)) {
//             return redirect()->route('konsumsi.index')->with('error', 'Tidak bisa menghapus pesanan ini.');
//         }

//         $konsumsi->delete();
//         return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
//     }

//     public function exportPdf(Konsumsi $konsumsi)
//     {
//         $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
//         return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
//     }
// }



namespace App\Http\Controllers;

use App\Models\Konsumsi;
use App\Models\Anggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;

class KonsumsiController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
            $konsumsis = Konsumsi::orderBy('created_at', 'desc')->get();
        } else {
            $konsumsis = Konsumsi::where('unit_kerja', Auth::user()->unit_kerja)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('pages.konsumsi.index', compact('konsumsis'));
    }

    public function create()
    {
        $unitKerjas = Anggaran::pluck('nama_unit_kerja')->unique();
        return view('pages.konsumsi.create', compact('unitKerjas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat_nde'       => 'required|string|max:255',
            'unit_kerja'            => 'required|string|max:255',
            'tahun_anggaran_rapat'  => 'required|integer',
            'agenda_rapat'          => 'required|string',
            'tanggal_rapat'         => 'required|date',
            'jam_rapat'             => 'required',
            'unggah_dokumen_nde'    => 'nullable|file|mimes:pdf|max:2048',
            'menu_konsumsi'         => 'required|array|min:1',
            'menu_konsumsi.*.menu'  => 'required|string',
            'menu_konsumsi.*.detail'=> 'nullable|string',
            'menu_konsumsi.*.jumlah'=> 'required|integer|min:1',
            'distribusi_tujuan'     => 'required|string',
            'lokasi_unit_kerja'     => 'required|string',
            'catatan'               => 'nullable|string',
        ]);

        // ✅ simpan ke storage/app/public/documents agar bisa diakses via asset('storage/...')
        if ($request->hasFile('unggah_dokumen_nde')) {
            $validatedData['unggah_dokumen_nde'] = $request->file('unggah_dokumen_nde')->store('documents', 'public');
        }

        // Cek anggaran kalau user biasa
        if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
            $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [strtolower(trim($validatedData['unit_kerja']))])
                ->where('tahun_anggaran', $validatedData['tahun_anggaran_rapat'])
                ->first();

            if (!$anggaran) {
                return redirect()->back()->withInput()->with('error', 'Anggaran untuk unit kerja dan tahun tersebut tidak ditemukan.');
            }
        }

        $validatedData['status'] = 'Menunggu';
        $validatedData['total_biaya'] = null;

        Konsumsi::create($validatedData);

        return redirect()->route('konsumsi.index')->with('success', 'Pemesanan konsumsi berhasil diajukan!');
    }

    public function show(Konsumsi $konsumsi)
    {
        if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']) &&
            $konsumsi->unit_kerja !== Auth::user()->unit_kerja) {
            abort(403, 'Akses ditolak.');
        }

        return view('pages.konsumsi.show', compact('konsumsi'));
    }

    public function edit(Konsumsi $konsumsi)
    {
        if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
            abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
        }

        return view('pages.konsumsi.edit', compact('konsumsi'));
    }

    public function update(Request $request, Konsumsi $konsumsi)
    {
        if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta'])) {
            abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
        }

        $request->validate([
            'total_biaya' => 'required|numeric|min:0',
            'status' => 'required|in:Menunggu,Disetujui,Selesai,Ditolak',
            'unggah_dokumen_nde' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $oldStatus = $konsumsi->status;
        $oldBiaya = (float) $konsumsi->total_biaya;
        $newStatus = $request->status;
        $newBiaya = (float) $request->total_biaya;

        // ✅ kalau admin upload ulang dokumen pas update
        if ($request->hasFile('unggah_dokumen_nde')) {
            $konsumsi->unggah_dokumen_nde = $request->file('unggah_dokumen_nde')->store('documents', 'public');
        }

        DB::beginTransaction();
        try {
            $anggaran = Anggaran::whereRaw('LOWER(TRIM(nama_unit_kerja)) = ?', [strtolower(trim($konsumsi->unit_kerja))])
                ->where('tahun_anggaran', $konsumsi->tahun_anggaran_rapat)
                ->lockForUpdate()
                ->first();

            if ($anggaran) {
                // Kasus: Menunggu/Ditolak → Disetujui → Kurangi saldo
                if ($newStatus === 'Disetujui' && $oldStatus !== 'Disetujui') {
                    if ($anggaran->saldo_saat_ini < $newBiaya) {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Saldo anggaran tidak mencukupi.');
                    }
                    $anggaran->saldo_saat_ini -= $newBiaya;
                    $anggaran->save();
                }

                // Kasus: Disetujui → Menunggu/Ditolak → Kembalikan saldo
                if ($oldStatus === 'Disetujui' && $newStatus !== 'Disetujui') {
                    $anggaran->saldo_saat_ini += $oldBiaya;
                    $anggaran->save();
                }

                // Kasus: Disetujui → Disetujui (ubah biaya) → Sesuaikan saldo
                if ($oldStatus === 'Disetujui' && $newStatus === 'Disetujui' && $oldBiaya !== $newBiaya) {
                    $selisih = $newBiaya - $oldBiaya;
                    if ($selisih > 0 && $anggaran->saldo_saat_ini < $selisih) {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Saldo anggaran tidak mencukupi untuk perubahan biaya.');
                    }
                    $anggaran->saldo_saat_ini -= $selisih;
                    $anggaran->save();
                }
            }

            $konsumsi->update([
                'total_biaya' => $newBiaya,
                'status' => $newStatus,
                'unggah_dokumen_nde' => $konsumsi->unggah_dokumen_nde, // pastikan tersimpan kalau upload ulang
            ]);

            DB::commit();
            return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil diperbarui!');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal update konsumsi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses update.');
        }
    }

    public function destroy(Konsumsi $konsumsi)
    {
        if (!Auth::user()->hasRole(['admin', 'yanum_karawang', 'yanum_jakarta']) &&
            ($konsumsi->status !== 'Menunggu' || $konsumsi->unit_kerja !== Auth::user()->unit_kerja)) {
            return redirect()->route('konsumsi.index')->with('error', 'Tidak bisa menghapus pesanan ini.');
        }

        $konsumsi->delete();
        return redirect()->route('konsumsi.index')->with('success', 'Pemesanan berhasil dihapus!');
    }

    public function exportPdf(Konsumsi $konsumsi)
    {
        $pdf = PDF::loadView('pages.konsumsi.pdf', compact('konsumsi'));
        return $pdf->download('pesanan-konsumsi-' . $konsumsi->id . '.pdf');
    }
}
