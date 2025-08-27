<?php


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Materi;
// use App\Models\Rapat;

// class MateriController extends Controller
// {
//     /**
//      * Tampilkan daftar materi.
//      */
//     public function index()
//     {
//         // Ambil semua materi beserta data rapat terkait
//         $materis = Materi::with('rapat')->get();
//         return view('pages.materi.index', compact('materis'));
//     }

//     /**
//      * Tampilkan form untuk membuat materi baru.
//      */
//     public function create()
//     {
//         // Ambil semua rapat untuk dropdown pilihan
//         $rapats = Rapat::all(['id', 'nama_rapat', 'tanggal']);
//         return view('pages.materi.create', compact('rapats'));
//     }

//     /**
//      * Simpan materi baru.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'judul' => 'required|string|max:255',
//             'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240', // Max 10MB
//         ]);

//         $filePath = $request->file('file_materi')->store('materi_rapat', 'public');

//         Materi::create([
//             'rapat_id' => $validatedData['rapat_id'],
//             'judul' => $validatedData['judul'],
//             'file_path' => $filePath,
//         ]);

//         return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan!');
//     }

//     /**
//      * Tampilkan form untuk mengedit materi.
//      */
//     public function edit($id)
//     {
//         $materi = Materi::findOrFail($id);
//         $rapats = Rapat::all(['id', 'nama_rapat', 'tanggal']);
//         return view('pages.materi.edit', compact('materi', 'rapats'));
//     }

//     /**
//      * Update materi.
//      */
//     public function update(Request $request, $id)
//     {
//         $materi = Materi::findOrFail($id);

//         $validatedData = $request->validate([
//             'rapat_id' => 'required|exists:rapats,id',
//             'judul' => 'required|string|max:255',
//             'file_materi' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240', // File bisa opsional saat update
//         ]);

//         // Hapus file lama jika ada file baru diupload
//         if ($request->hasFile('file_materi')) {
//             \Storage::disk('public')->delete($materi->file_path);
//             $filePath = $request->file('file_materi')->store('materi_rapat', 'public');
//         } else {
//             $filePath = $materi->file_path; // Tetap pakai file lama
//         }

//         $materi->update([
//             'rapat_id' => $validatedData['rapat_id'],
//             'judul' => $validatedData['judul'],
//             'file_path' => $filePath,
//         ]);

//         return redirect()->route('materi.index')->with('success', 'Materi berhasil diupdate!');
//     }

//     /**
//      * Hapus materi.
//      */
//     public function destroy($id)
//     {
//         $materi = Materi::findOrFail($id);
//         \Storage::disk('public')->delete($materi->file_path); // Hapus file dari storage
//         $materi->delete();

//         return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus!');
//     }

//     /**
//      * Download file materi.
//      */
//     public function download($id)
//     {
//         $materi = Materi::findOrFail($id);
//         $filePath = storage_path('app/public/' . $materi->file_path);

//         if (file_exists($filePath)) {
//             return response()->download($filePath);
//         } else {
//             return redirect()->back()->with('error', 'File materi tidak ditemukan.');
//         }
//     }
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Undangan; // Gunakan model Undangan
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Tampilkan daftar materi.
     */
    public function index()
    {
        // Ambil semua materi beserta data undangan terkait
        $materis = Materi::with('undangan')->get();
        return view('pages.materi.index', compact('materis'));
    }

    /**
     * Tampilkan form untuk membuat materi baru.
     */
    public function create()
    {
        // Ambil semua undangan untuk dropdown pilihan
        $undangans = Undangan::all(['id', 'agenda', 'tanggal']);
        return view('pages.materi.create', compact('undangans'));
    }

    /**
     * Simpan materi baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'undangan_id' => 'required|exists:undangan,id',
            'judul' => 'required|string|max:255',
            'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240', // Max 10MB
        ]);

        $filePath = $request->file('file_materi')->store('materi_rapat', 'public');

        Materi::create([
            'undangan_id' => $validatedData['undangan_id'],
            'judul' => $validatedData['judul'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit materi.
     */
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $undangans = Undangan::all(['id', 'agenda', 'tanggal']);
        return view('pages.materi.edit', compact('materi', 'undangans'));
    }

    /**
     * Update materi.
     */
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $validatedData = $request->validate([
            'undangan_id' => 'required|exists:undangan,id',
            'judul' => 'required|string|max:255',
            'file_materi' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240', // File bisa opsional saat update
        ]);

        // Hapus file lama jika ada file baru diupload
        if ($request->hasFile('file_materi')) {
            Storage::disk('public')->delete($materi->file_path);
            $filePath = $request->file('file_materi')->store('materi_rapat', 'public');
        } else {
            $filePath = $materi->file_path; // Tetap pakai file lama
        }

        $materi->update([
            'undangan_id' => $validatedData['undangan_id'],
            'judul' => $validatedData['judul'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diupdate!');
    }

    /**
     * Hapus materi.
     */
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        Storage::disk('public')->delete($materi->file_path); // Hapus file dari storage
        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus!');
    }

    /**
     * Download file materi.
     */
    public function download($id)
    {
        $materi = Materi::findOrFail($id);
        $filePath = storage_path('app/public/' . $materi->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File materi tidak ditemukan.');
        }
    }
}
