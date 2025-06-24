<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Risalah;

// class RisalahController extends Controller
// {
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get();
//         return view('risalah.index', compact('risalahs'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'isi' => 'required|string',
//         ]);

//         Risalah::create($request->only('judul', 'isi'));

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil disimpan!');
//     }
// }



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Risalah;

// class RisalahController extends Controller
// {
//     public function index()
//     {
//         $risalahs = Risalah::latest()->get(); // atau ->paginate() jika mau paging
//     return view('pages.risalahdetail.index', compact('risalahs'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'isi' => 'required|string',
//         ]);

//         Risalah::create($request->only('judul', 'isi'));

//         return redirect()->route('risalah.index')->with('success', 'Risalah berhasil disimpan!');
//     }
// }

namespace App\Http\Controllers;

use App\Models\Risalah;
use Illuminate\Http\Request;

class RisalahController extends Controller
{
    // Menampilkan daftar risalah
    public function index()
    {
        $risalahs = Risalah::latest()->get();
        return view('pages.risalah.detail.index', compact('risalahs'));
    }

    // Menampilkan form tambah risalah
    public function create()
    {
        return view('pages.risalah.index');
    }

    // Menyimpan risalah ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Risalah::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('risalah.index')->with('success', 'Risalah berhasil ditambahkan.');
    }
}
