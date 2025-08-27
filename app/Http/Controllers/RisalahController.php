<?php


// namespace App\Http\Controllers;

// use App\Models\Risalah;
// use Illuminate\Http\Request;

// class RisalahController extends Controller
// {
//     // Menampilkan daftar risalah
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get();
//         return view('pages.risalah.detail.index', compact('risalahs'));
//     }

//     // Menampilkan form tambah risalah
//     public function create()
//     {
//         return view('pages.risalah.index');
//     }

//     // Menyimpan risalah ke database
//     public function store(Request $request)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'isi' => 'required|string',
//         ]);

//         Risalah::create([
//             'judul' => $request->judul,
//             'isi' => $request->isi,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\Risalah;
// use Illuminate\Http\Request;

// class RisalahController extends Controller
// {
//     // Menampilkan daftar risalah
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get();
//         return view('pages.risalah.index', compact('risalahs'));
//     }

//     public function create()
//     {
//         $rapats = \App\Models\Rapat::all();
//         $presences = \App\Models\Presence::all();

//         return view('pages.risalah.create', compact('rapats', 'presences'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $rapat = \App\Models\Rapat::findOrFail($request->rapat_id);

//         Risalah::create([
//             'rapat_id' => $rapat->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $rapat->nama_rapat,
//             'tanggal' => $rapat->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($rapat->tanggal)),
//             'tempat' => $rapat->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Risalah;
// use App\Models\PresenceDetail;
// use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;

// class RisalahController extends Controller
// {
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get();
//         return view('pages.risalah.index', compact('risalahs'));
//     }

//     public function create()
//     {
//         $rapats = \App\Models\Rapat::all();
//         $presences = \App\Models\Presence::all();

//         return view('pages.risalah.create', compact('rapats', 'presences'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $rapat = \App\Models\Rapat::findOrFail($request->rapat_id);

//         Risalah::create([
//             'rapat_id' => $rapat->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $rapat->nama_rapat,
//             'tanggal' => $rapat->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($rapat->tanggal)),
//             'tempat' => $rapat->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
//     }

//     public function export($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         $pdf = Pdf::loadView('pages.risalah.pdf', compact('risalah', 'presenceDetails'));
//         return $pdf->download('risalah-'.$risalah->id.'.pdf');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\Risalah;
// use App\Models\PresenceDetail;
// use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;

// class RisalahController extends Controller
// {
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get();
//         return view('pages.risalah.index', compact('risalahs'));
//     }

//     public function create()
//     {
//         $rapats = \App\Models\Rapat::all();
//         $presences = \App\Models\Presence::all();

//         return view('pages.risalah.create', compact('rapats', 'presences'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $rapat = \App\Models\Rapat::findOrFail($request->rapat_id);

//         Risalah::create([
//             'rapat_id' => $rapat->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $rapat->nama_rapat,
//             'tanggal' => $rapat->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($rapat->tanggal)),
//             'tempat' => $rapat->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
//     }

//     public function show($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         return response()->json($risalah);
//     }

//     public function edit($id)
//     {
//         $risalah = Risalah::findOrFail($id);
//         $rapats = \App\Models\Rapat::all();
//         $presences = \App\Models\Presence::all();
//         return view('pages.risalah.edit', compact('risalah', 'rapats', 'presences'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $risalah = Risalah::findOrFail($id);
//         $rapat = \App\Models\Rapat::findOrFail($request->rapat_id);

//         $risalah->update([
//             'rapat_id' => $rapat->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $rapat->nama_rapat,
//             'tanggal' => $rapat->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($rapat->tanggal)),
//             'tempat' => $rapat->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $risalah = Risalah::findOrFail($id);
//         $risalah->delete();
//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil dihapus.');
//     }

//     public function export($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         $pdf = Pdf::loadView('pages.risalah.pdf', compact('risalah', 'presenceDetails'));
//         return $pdf->download('risalah-'.$risalah->id.'.pdf');
//     }

//     public function preview($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         $presenceDetails = \App\Models\PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         // return view pdf langsung, tanpa download
//         return view('pages.risalah.pdf', compact('risalah', 'presenceDetails'));
//     }
// }




// namespace App\Http\Controllers;

// use App\Models\Risalah;
// use App\Models\PresenceDetail;
// use Illuminate\Http\Request;
// use Barryvdh\Snappy\Facades\SnappyPdf; // Ganti dari DomPDF ke Snappy

// class RisalahController extends Controller
// {
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get();
//         return view('pages.risalah.index', compact('risalahs'));
//     }

//     public function create()
//     {
//         $rapats = \App\Models\Rapat::all();
//         $presences = \App\Models\Presence::all();

//         return view('pages.risalah.create', compact('rapats', 'presences'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $rapat = \App\Models\Rapat::findOrFail($request->rapat_id);

//         Risalah::create([
//             'rapat_id' => $rapat->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $rapat->nama_rapat,
//             'tanggal' => $rapat->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($rapat->tanggal)),
//             'tempat' => $rapat->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
//     }

//     public function show($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         return response()->json($risalah);
//     }

//     public function edit($id)
//     {
//         $risalah = Risalah::findOrFail($id);
//         $rapats = \App\Models\Rapat::all();
//         $presences = \App\Models\Presence::all();
//         return view('pages.risalah.edit', compact('risalah', 'rapats', 'presences'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $risalah = Risalah::findOrFail($id);
//         $rapat = \App\Models\Rapat::findOrFail($request->rapat_id);

//         $risalah->update([
//             'rapat_id' => $rapat->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $rapat->nama_rapat,
//             'tanggal' => $rapat->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($rapat->tanggal)),
//             'tempat' => $rapat->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $risalah = Risalah::findOrFail($id);
//         $risalah->delete();
//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil dihapus.');
//     }

//     /**
//      * Export risalah ke PDF pakai Snappy
//      */
//     public function export($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         $pdf = SnappyPdf::loadView('pages.risalah.pdf', compact('risalah', 'presenceDetails'))
//             ->setOption('margin-top', 15)
//             ->setOption('margin-bottom', 15)
//             ->setOption('margin-left', 15)
//             ->setOption('margin-right', 15)
//             ->setOption('page-size', 'A4')
//             ->setOption('encoding', 'UTF-8');

//         return $pdf->download('risalah-' . $risalah->id . '.pdf');
//     }

//     /**
//      * Preview PDF di browser (tanpa download)
//      */
//     public function preview($id)
//     {
//         $risalah = Risalah::with(['rapat', 'presence'])->findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         return view('pages.risalah.pdf', compact('risalah', 'presenceDetails'));
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Risalah;
// use App\Models\Undangan; // Import model Undangan
// use App\Models\PresenceDetail;
// use Illuminate\Http\Request;
// use Barryvdh\Snappy\Facades\SnappyPdf;

// class RisalahController extends Controller
// {
//     /**
//      * Menampilkan daftar risalah.
//      */
//     public function index()
//     {
//         // Ganti 'rapat' menjadi 'undangan' pada eager loading
//         $risalahs = Risalah::with('undangan')->latest()->get();
//         return view('pages.risalah.index', compact('risalahs'));
//     }

//     /**
//      * Menampilkan form untuk membuat risalah baru.
//      */
//     public function create()
//     {
//         // Ambil semua data dari model Undangan
//         $undangan = Undangan::all();
//         $presences = \App\Models\Presence::all();

//         // Kirim data ke view
//         return view('pages.risalah.create', compact('undangan', 'presences'));
//     }

//     /**
//      * Menyimpan risalah baru ke database.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             // Ganti validasi dari 'rapat_id' menjadi 'undangan_id'
//             'undangan_id' => 'required|exists:undangans,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         // Ambil data undangan berdasarkan ID yang dikirim
//         $undangan = Undangan::findOrFail($request->undangan_id);

//         Risalah::create([
//             // Ganti 'rapat_id' menjadi 'undangan_id'
//             'undangan_id' => $undangan->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $undangan->nama_undangan, // Asumsi nama agenda diambil dari undangan
//             'tanggal' => $undangan->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($undangan->tanggal)),
//             'tempat' => $undangan->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
//     }

//     /**
//      * Menampilkan detail risalah.
//      */
//     public function show($id)
//     {
//         // Ganti eager loading 'rapat' menjadi 'undangan'
//         $risalah = Risalah::with(['undangan', 'presence'])->findOrFail($id);
//         return response()->json($risalah);
//     }

//     /**
//      * Menampilkan form untuk mengedit risalah.
//      */
//     public function edit($id)
//     {
//         $risalah = Risalah::findOrFail($id);
//         // Ambil data dari model Undangan
//         $undangan = Undangan::all();
//         $presences = \App\Models\Presence::all();
//         // Kirim data ke view
//         return view('pages.risalah.edit', compact('risalah', 'undangan', 'presences'));
//     }

//     /**
//      * Memperbarui risalah di database.
//      */
//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             // Ganti validasi dari 'rapat_id' menjadi 'undangan_id'
//             'undangan_id' => 'required|exists:undangans,id',
//             'presence_id' => 'required|exists:presences,id',
//             'pimpinan' => 'required|string|max:255',
//             'pencatat' => 'required|string|max:255',
//             'jenis_rapat' => 'nullable|string',
//             'penjelasan' => 'nullable|string',
//             'kesimpulan' => 'nullable|string',
//         ]);

//         $risalah = Risalah::findOrFail($id);
//         // Ambil data dari model Undangan
//         $undangan = Undangan::findOrFail($request->undangan_id);

//         $risalah->update([
//             // Ganti 'rapat_id' menjadi 'undangan_id'
//             'undangan_id' => $undangan->id,
//             'presence_id' => $request->presence_id,
//             'agenda' => $undangan->nama_undangan,
//             'tanggal' => $undangan->tanggal,
//             'waktu_mulai' => date('H:i', strtotime($undangan->tanggal)),
//             'tempat' => $undangan->tempat,
//             'pimpinan' => $request->pimpinan,
//             'pencatat' => $request->pencatat,
//             'jenis_rapat' => $request->jenis_rapat,
//             'penjelasan' => $request->penjelasan,
//             'kesimpulan' => $request->kesimpulan,
//         ]);

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil diperbarui.');
//     }

//     /**
//      * Menghapus risalah dari database.
//      */
//     public function destroy($id)
//     {
//         $risalah = Risalah::findOrFail($id);
//         $risalah->delete();
//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil dihapus.');
//     }

//     /**
//      * Export risalah ke PDF pakai Snappy.
//      */
//     public function export($id)
//     {
//         // Eager loading 'undangan'
//         $risalah = Risalah::with(['undangan', 'presence'])->findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         $pdf = SnappyPdf::loadView('pages.risalah.pdf', compact('risalah', 'presenceDetails'))
//             ->setOption('margin-top', 15)
//             ->setOption('margin-bottom', 15)
//             ->setOption('margin-left', 15)
//             ->setOption('margin-right', 15)
//             ->setOption('page-size', 'A4')
//             ->setOption('encoding', 'UTF-8');

//         return $pdf->download('risalah-' . $risalah->id . '.pdf');
//     }

//     /**
//      * Preview PDF di browser (tanpa download).
//      */
//     public function preview($id)
//     {
//         // Eager loading 'undangan'
//         $risalah = Risalah::with(['undangan', 'presence'])->findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

//         return view('pages.risalah.pdf', compact('risalah', 'presenceDetails'));
//     }
// }



namespace App\Http\Controllers;

use App\Models\Risalah;
use App\Models\Undangan;
use App\Models\PresenceDetail;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf;

class RisalahController extends Controller
{
    public function index()
    {
        $risalahs = Risalah::with('undangan')->latest()->get();
        return view('pages.risalah.index', compact('risalahs'));
    }

    public function create()
    {
        $undangans = Undangan::all();
        $presences = \App\Models\Presence::all();

        // Ganti nama variabel 'undangan' menjadi 'undangans' agar lebih jelas
        return view('pages.risalah.create', compact('undangans', 'presences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // PERBAIKAN: Ganti 'undangans' menjadi 'undangan' di validasi
            'undangan_id' => 'required|exists:undangan,id',
            'presence_id' => 'required|exists:presences,id',
            'pimpinan' => 'required|string|max:255',
            'pencatat' => 'required|string|max:255',
            'jenis_rapat' => 'nullable|string',
            'penjelasan' => 'nullable|string',
            'kesimpulan' => 'nullable|string',
        ]);

        $undangan = Undangan::findOrFail($request->undangan_id);

        Risalah::create([
            'undangan_id' => $undangan->id,
            'presence_id' => $request->presence_id,
            'agenda' => $undangan->agenda,
            'tanggal' => $undangan->tanggal,
            'waktu_mulai' => $undangan->jam, // PERBAIKAN: Ambil dari kolom 'jam'
            'waktu_selesai' => null, // PERBAIKAN: Kolom ini tidak ada di tabel undangan
            'tempat' => $undangan->tempat_link, // PERBAIKAN: Ambil dari kolom 'tempat_link'
            'pimpinan' => $request->pimpinan,
            'pencatat' => $request->pencatat,
            'jenis_rapat' => $request->jenis_rapat,
            'penjelasan' => $request->penjelasan,
            'kesimpulan' => $request->kesimpulan,
        ]);

        return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
    }

    public function show($id)
    {
        $risalah = Risalah::with(['undangan', 'presence'])->findOrFail($id);
        return response()->json($risalah);
    }

    public function edit($id)
    {
        $risalah = Risalah::findOrFail($id);
        $undangans = Undangan::all();
        $presences = \App\Models\Presence::all();
        return view('pages.risalah.edit', compact('risalah', 'undangans', 'presences'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // PERBAIKAN: Ganti 'undangans' menjadi 'undangan' di validasi
            'undangan_id' => 'required|exists:undangan,id',
            'presence_id' => 'required|exists:presences,id',
            'pimpinan' => 'required|string|max:255',
            'pencatat' => 'required|string|max:255',
            'jenis_rapat' => 'nullable|string',
            'penjelasan' => 'nullable|string',
            'kesimpulan' => 'nullable|string',
        ]);

        $risalah = Risalah::findOrFail($id);
        $undangan = Undangan::findOrFail($request->undangan_id);

        $risalah->update([
            'undangan_id' => $undangan->id,
            'presence_id' => $request->presence_id,
            'agenda' => $undangan->agenda,
            'tanggal' => $undangan->tanggal,
            'waktu_mulai' => $undangan->jam, // PERBAIKAN: Ambil dari kolom 'jam'
            'waktu_selesai' => null, // PERBAIKAN: Kolom ini tidak ada di tabel undangan
            'tempat' => $undangan->tempat_link, // PERBAIKAN: Ambil dari kolom 'tempat_link'
            'pimpinan' => $request->pimpinan,
            'pencatat' => $request->pencatat,
            'jenis_rapat' => $request->jenis_rapat,
            'penjelasan' => $request->penjelasan,
            'kesimpulan' => $request->kesimpulan,
        ]);

        return redirect()->route('risalah.index')->with('success', 'Risalah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $risalah = Risalah::findOrFail($id);
        $risalah->delete();
        return redirect()->route('risalah.index')->with('success', 'Risalah berhasil dihapus.');
    }

    public function export($id)
    {
        $risalah = Risalah::with(['undangan', 'presence'])->findOrFail($id);
        $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

        $pdf = SnappyPdf::loadView('pages.risalah.pdf', compact('risalah', 'presenceDetails'))
            ->setOption('margin-top', 15)
            ->setOption('margin-bottom', 15)
            ->setOption('margin-left', 15)
            ->setOption('margin-right', 15)
            ->setOption('page-size', 'A4')
            ->setOption('encoding', 'UTF-8');

        return $pdf->download('risalah-' . $risalah->id . '.pdf');
    }

    public function preview($id)
    {
        $risalah = Risalah::with(['undangan', 'presence'])->findOrFail($id);
        $presenceDetails = PresenceDetail::where('presence_id', $risalah->presence_id)->get();

        return view('pages.risalah.pdf', compact('risalah', 'presenceDetails'));
    }
}
