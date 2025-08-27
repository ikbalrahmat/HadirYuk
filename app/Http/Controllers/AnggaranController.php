<?php

// namespace App\Http\Controllers;

// use App\Models\Anggaran;
// use Illuminate\Http\Request;

// class AnggaranController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $anggarans = Anggaran::all();
//         return view('pages.anggaran.index', compact('anggarans'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('pages.anggaran.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nama_unit_kerja' => 'required|string|max:255',
//             'tahun_anggaran' => 'required|integer|min:' . date('Y'),
//             'total_anggaran' => 'required|numeric|min:0',
//         ]);

//         $anggaran = Anggaran::create([
//             'nama_unit_kerja' => $validatedData['nama_unit_kerja'],
//             'tahun_anggaran' => $validatedData['tahun_anggaran'],
//             'total_anggaran' => $validatedData['total_anggaran'],
//             'saldo_saat_ini' => $validatedData['total_anggaran'], // Saldo awal sama dengan total anggaran
//             'status' => 'Aktif',
//         ]);

//         return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil ditambahkan!');
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Anggaran $anggaran)
//     {
//         return view('pages.anggaran.edit', compact('anggaran'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Anggaran $anggaran)
//     {
//         $validatedData = $request->validate([
//             'nama_unit_kerja' => 'required|string|max:255',
//             'tahun_anggaran' => 'required|integer|min:' . date('Y'),
//             'total_anggaran' => 'required|numeric|min:0',
//         ]);

//         $anggaran->update($validatedData);

//         return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil diperbarui!');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Anggaran $anggaran)
//     {
//         $anggaran->delete();
//         return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil dihapus!');
//     }

//     /**
//      * Handle the top-up process for an anggaran.
//      */
//     public function topup(Request $request, Anggaran $anggaran)
//     {
//         $request->validate([
//             'topup_amount' => 'required|numeric|min:0',
//         ]);

//         $anggaran->total_anggaran += $request->topup_amount;
//         $anggaran->saldo_saat_ini += $request->topup_amount;
//         $anggaran->save();

//         return redirect()->back()->with('success', 'Saldo berhasil di-top-up!');
//     }
// }



namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggarans = Anggaran::all();
        return view('pages.anggaran.index', compact('anggarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.anggaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_unit_kerja' => 'required|string|max:255',
            'tahun_anggaran' => 'required|integer|min:' . date('Y'),
            'total_anggaran' => 'required|numeric|min:0',
        ]);

        $anggaran = Anggaran::create([
            'nama_unit_kerja' => $validatedData['nama_unit_kerja'],
            'tahun_anggaran' => $validatedData['tahun_anggaran'],
            'total_anggaran' => $validatedData['total_anggaran'],
            'saldo_saat_ini' => $validatedData['total_anggaran'], // Saldo awal sama dengan total anggaran
            'status' => 'Aktif',
        ]);

        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggaran $anggaran)
    {
        return view('pages.anggaran.edit', compact('anggaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggaran $anggaran)
    {
        $validatedData = $request->validate([
            'nama_unit_kerja' => 'required|string|max:255',
            'tahun_anggaran' => 'required|integer|min:' . date('Y'),
            'total_anggaran' => 'required|numeric|min:0',
        ]);

        // Hitung selisih perubahan total anggaran
        $perubahan_anggaran = $validatedData['total_anggaran'] - $anggaran->total_anggaran;

        // Perbarui total anggaran
        $anggaran->total_anggaran = $validatedData['total_anggaran'];

        // Perbarui saldo saat ini dengan menambahkan selisihnya
        $anggaran->saldo_saat_ini += $perubahan_anggaran;

        // Pastikan saldo tidak negatif setelah perubahan
        if ($anggaran->saldo_saat_ini < 0) {
            $anggaran->saldo_saat_ini = 0;
        }

        $anggaran->save();

        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil dihapus!');
    }

    /**
     * Handle the top-up process for an anggaran.
     */
    public function topup(Request $request, Anggaran $anggaran)
    {
        $request->validate([
            'topup_amount' => 'required|numeric|min:0',
        ]);

        $anggaran->total_anggaran += $request->topup_amount;
        $anggaran->saldo_saat_ini += $request->topup_amount;
        $anggaran->save();

        return redirect()->back()->with('success', 'Saldo berhasil di-top-up!');
    }
}
