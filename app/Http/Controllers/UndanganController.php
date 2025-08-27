<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;

// class UndanganController extends Controller
// {
//     /**
//      * Tampilkan daftar undangan rapat dari session.
//      *
//      * @return \Illuminate\Contracts\View\View
//      */
//     public function index(Request $request)
//     {
//         // Ambil data undangan dari session. Jika belum ada, buat array kosong.
//         $undangan = $request->session()->get('undangan', []);

//         // Tambahkan id ke setiap item untuk digunakan di view
//         $undanganWithId = [];
//         foreach ($undangan as $key => $item) {
//             $undanganWithId[] = (object) array_merge(['id' => $key], (array) $item);
//         }

//         return view('pages.undangan.index', compact('undanganWithId'));
//     }

//     /**
//      * Tampilkan form untuk membuat undangan baru.
//      *
//      * @return \Illuminate\Contracts\View\View
//      */
//     public function create()
//     {
//         return view('pages.undangan.create');
//     }

//     /**
//      * Simpan data undangan baru ke session.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'tanggal' => 'required|date',
//             'jam' => 'required',
//             'kepada' => 'required',
//             'pengirim' => 'required',
//             'tempat_link' => 'required',
//             'agenda' => 'required',
//             'tanda_tangan' => 'nullable',
//         ]);

//         $newUndangan = (object) [
//             'tanggal' => date('d F Y', strtotime($validatedData['tanggal'])),
//             'jam' => $validatedData['jam'] . ' WIB',
//             'kepada' => $validatedData['kepada'],
//             'pengirim' => $validatedData['pengirim'],
//             'tempat_link' => $validatedData['tempat_link'],
//             'agenda' => $validatedData['agenda'],
//             'tanda_tangan' => $validatedData['tanda_tangan'] ?? null,
//         ];

//         $undangan = $request->session()->get('undangan', []);
//         $undangan[] = $newUndangan;
//         $request->session()->put('undangan', $undangan);

//         return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil ditambahkan!');
//     }

//     /**
//      * Tampilkan form untuk mengedit undangan.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
//      */
//     public function edit(Request $request, $id)
//     {
//         $undangan = $request->session()->get('undangan')[$id] ?? null;

//         if (!$undangan) {
//             return redirect()->route('undangan.index')->with('error', 'Data tidak ditemukan!');
//         }

//         $undangan->waktu_rapat = date('Y-m-d', strtotime($undangan->tanggal));
//         $undangan->jam = str_replace(' WIB', '', $undangan->jam);

//         $undangan = (object) array_merge(['id' => $id], (array) $undangan);

//         return view('pages.undangan.edit', compact('undangan'));
//     }

//     /**
//      * Simpan perubahan data undangan ke session.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'tanggal' => 'required|date',
//             'jam' => 'required',
//             'kepada' => 'required',
//             'pengirim' => 'required',
//             'tempat_link' => 'required',
//             'agenda' => 'required',
//             'tanda_tangan' => 'nullable',
//         ]);

//         $undangan = $request->session()->get('undangan', []);
//         if (isset($undangan[$id])) {
//             $undangan[$id] = (object) [
//                 'tanggal' => date('d F Y', strtotime($validatedData['tanggal'])),
//                 'jam' => $validatedData['jam'] . ' WIB',
//                 'kepada' => $validatedData['kepada'],
//                 'pengirim' => $validatedData['pengirim'],
//                 'tempat_link' => $validatedData['tempat_link'],
//                 'agenda' => $validatedData['agenda'],
//                 'tanda_tangan' => $validatedData['tanda_tangan'] ?? null,
//             ];
//             $request->session()->put('undangan', $undangan);
//         }

//         return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil diupdate!');
//     }

//     /**
//      * Hapus data undangan dari session.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function destroy(Request $request, $id)
//     {
//         $undangan = $request->session()->get('undangan', []);
//         if (isset($undangan[$id])) {
//             unset($undangan[$id]);
//             // Re-index array setelah penghapusan
//             $undangan = array_values($undangan);
//             $request->session()->put('undangan', $undangan);
//         }

//         return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil dihapus!');
//     }

//     /**
//      * Tampilkan preview undangan dalam modal dari session.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Contracts\View\View|string
//      */
//     public function preview(Request $request, $id)
//     {
//         $undangan = $request->session()->get('undangan')[$id] ?? null;
//         if (!$undangan) {
//              return 'Data tidak ditemukan.';
//         }

//         return view('pages.undangan.preview_modal', compact('undangan', 'id'));
//     }

//     /**
//      * Export undangan menjadi PDF dari session.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */
//     public function exportPdf(Request $request, $id)
//     {
//         $undangan = $request->session()->get('undangan')[$id] ?? null;
//         if (!$undangan) {
//             return redirect()->route('undangan.index')->with('error', 'Data tidak ditemukan!');
//         }

//         $pdf = Pdf::loadView('pages.undangan.pdf', compact('undangan', 'id'));
//         return $pdf->download("undangan-rapat-{$id}.pdf");
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\Undangan; // Import model Undangan
// use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;

// class UndanganController extends Controller
// {
//     /**
//      * Tampilkan daftar undangan rapat dari database.
//      *
//      * @return \Illuminate\Contracts\View\View
//      */
//     public function index()
//     {
//         // Ambil semua data undangan dari tabel 'undangan'
//         $undangan = Undangan::all();

//         // Mengirim data ke view dengan nama variabel 'undangan'
//         return view('pages.undangan.index', compact('undangan'));
//     }

//     /**
//      * Tampilkan form untuk membuat undangan baru.
//      *
//      * @return \Illuminate\Contracts\View\View
//      */
//     public function create()
//     {
//         return view('pages.undangan.create');
//     }

//     /**
//      * Simpan data undangan baru ke database.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'tanggal' => 'required|date',
//             'jam' => 'required',
//             'kepada' => 'required',
//             'pengirim' => 'required',
//             'tempat_link' => 'required',
//             'agenda' => 'required',
//             'tanda_tangan' => 'nullable',
//         ]);

//         // Membuat data baru di database
//         Undangan::create($validatedData);

//         return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil ditambahkan!');
//     }

//     /**
//      * Tampilkan form untuk mengedit undangan.
//      *
//      * @param  Undangan  $undangan (Laravel akan otomatis mencari data berdasarkan ID)
//      * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
//      */
//     public function edit(Undangan $undangan)
//     {
//         return view('pages.undangan.edit', compact('undangan'));
//     }

//     /**
//      * Simpan perubahan data undangan ke database.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  Undangan  $undangan
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function update(Request $request, Undangan $undangan)
//     {
//         $validatedData = $request->validate([
//             'tanggal' => 'required|date',
//             'jam' => 'required',
//             'kepada' => 'required',
//             'pengirim' => 'required',
//             'tempat_link' => 'required',
//             'agenda' => 'required',
//             'tanda_tangan' => 'nullable',
//         ]);

//         // Memperbarui data yang ada di database
//         $undangan->update($validatedData);

//         return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil diupdate!');
//     }

//     /**
//      * Hapus data undangan dari database.
//      *
//      * @param  Undangan  $undangan
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function destroy(Undangan $undangan)
//     {
//         // Menghapus data dari database
//         $undangan->delete();

//         return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil dihapus!');
//     }

//     /**
//      * Tampilkan preview undangan dalam modal dari database.
//      *
//      * @param  Undangan  $undangan
//      * @return \Illuminate\Contracts\View\View|string
//      */
//     public function preview(Undangan $undangan)
//     {
//         return view('pages.undangan.preview_modal', compact('undangan'));
//     }

//     /**
//      * Export undangan menjadi PDF dari database.
//      *
//      * @param  Undangan  $undangan
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */
//     public function exportPdf(Undangan $undangan)
//     {
//         $pdf = Pdf::loadView('pages.undangan.pdf', compact('undangan'));
//         return $pdf->download("undangan-rapat-{$undangan->id}.pdf");
//     }
// }



namespace App\Http\Controllers;

use App\Models\Undangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UndanganController extends Controller
{
    public function index()
    {
        return view('pages.undangan.index');
    }

    public function getData()
    {
        $undangan = Undangan::all();
        return response()->json(['data' => $undangan]);
    }

    public function create()
    {
        return view('pages.undangan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'kepada' => 'required',
            'pengirim' => 'required',
            'tempat_link' => 'required',
            'agenda' => 'required',
            'tanda_tangan' => 'nullable',
        ]);

        Undangan::create($validatedData);

        return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil ditambahkan!');
    }

    public function edit(Undangan $undangan)
    {
        return view('pages.undangan.edit', compact('undangan'));
    }

    public function update(Request $request, Undangan $undangan)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'kepada' => 'required',
            'pengirim' => 'required',
            'tempat_link' => 'required',
            'agenda' => 'required',
            'tanda_tangan' => 'nullable',
        ]);

        $undangan->update($validatedData);

        return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil diupdate!');
    }

    public function destroy(Undangan $undangan)
    {
        $undangan->delete();

        return redirect()->route('undangan.index')->with('success', 'Undangan rapat berhasil dihapus!');
    }

    public function preview(Undangan $undangan)
    {
        return view('pages.undangan.preview_modal', compact('undangan'));
    }

    public function exportPdf(Undangan $undangan)
    {
        $pdf = Pdf::loadView('pages.undangan.pdf', compact('undangan'));
        return $pdf->download("undangan-rapat-{$undangan->id}.pdf");
    }
}
