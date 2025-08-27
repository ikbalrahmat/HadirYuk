<?php


// namespace App\Http\Controllers;

// use App\Models\Survey;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

// class SurveyController extends Controller
// {
//     /**
//      * Tampilkan daftar survey dengan jumlah pertanyaan & responden
//      */
//     public function index()
//     {
//         $surveys = Survey::withCount('questions')
//             ->withCount(['responses as respondents_count' => function($query) {
//                 // Hitung jumlah responden unik: user login + anonim (COALESCE user_id, id)
//                 $query->select(DB::raw('COUNT(DISTINCT COALESCE(user_id, id))'));
//             }])
//             ->get();

//         return view('pages.survey.index', compact('surveys'));
//     }

//     /**
//      * Form untuk membuat survey baru
//      */
//     public function create()
//     {
//         return view('pages.survey.create');
//     }

//     /**
//      * Simpan survey baru
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'deadline' => 'nullable|date',
//             'status' => 'required|in:Draft,Aktif,Selesai',
//         ]);

//         Survey::create([
//             'judul' => $request->judul,
//             'deadline' => $request->deadline,
//             'status' => $request->status,
//             'user_id' => Auth::id(),
//         ]);

//         return redirect()->route('survey.index')->with('success', 'Survey berhasil dibuat');
//     }

//     /**
//      * Form edit survey
//      */
//     public function edit(Survey $survey)
//     {
//         return view('pages.survey.edit', compact('survey'));
//     }

//     /**
//      * Update survey
//      */
//     public function update(Request $request, Survey $survey)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'deadline' => 'nullable|date',
//             'status' => 'required|in:Draft,Aktif,Selesai',
//         ]);

//         $survey->update([
//             'judul' => $request->judul,
//             'deadline' => $request->deadline,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('survey.index')->with('success', 'Survey berhasil diupdate');
//     }

//     /**
//      * Hapus survey
//      */
//     public function destroy(Survey $survey)
//     {
//         $survey->delete();
//         return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus');
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Survey;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

// class SurveyController extends Controller
// {
//     /**
//      * Tampilkan daftar survey dengan jumlah pertanyaan & responden
//      */
//     public function index()
//     {
//         $surveys = Survey::withCount('questions')
//             ->withCount(['responses as respondents_count' => function($query) {
//                 // Hitung jumlah responden unik: user login + anonim (COALESCE user_id, id)
//                 $query->select(DB::raw('COUNT(DISTINCT COALESCE(user_id, id))'));
//             }])
//             ->get();

//         return view('pages.survey.index', compact('surveys'));
//     }

//     /**
//      * Form untuk membuat survey baru
//      */
//     public function create()
//     {
//         return view('pages.survey.create');
//     }

//     /**
//      * Simpan survey baru
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'deadline' => 'nullable|date',
//             'status' => 'required|in:Draft,Aktif,Selesai',
//         ]);

//         Survey::create([
//             'judul' => $request->judul,
//             'deadline' => $request->deadline,
//             'status' => $request->status,
//             'user_id' => Auth::id(),
//         ]);

//         return redirect()->route('survey.index')->with('success', 'Survey berhasil dibuat');
//     }

//     /**
//      * Form edit survey
//      */
//     public function edit(Survey $survey)
//     {
//         return view('pages.survey.edit', compact('survey'));
//     }

//     /**
//      * Update survey
//      */
//     public function update(Request $request, Survey $survey)
//     {
//         $request->validate([
//             'judul' => 'required|string|max:255',
//             'deadline' => 'nullable|date',
//             'status' => 'required|in:Draft,Aktif,Selesai',
//         ]);

//         $survey->update([
//             'judul' => $request->judul,
//             'deadline' => $request->deadline,
//             'status' => $request->status,
//         ]);

//         return redirect()->route('survey.index')->with('success', 'Survey berhasil diupdate');
//     }

//     /**
//      * Hapus survey
//      */
//     public function destroy(Survey $survey)
//     {
//         $survey->delete();
//         return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus');
//     }
// }


namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::withCount('questions')
            ->withCount(['responses as respondents_count' => function($query) {
                $query->select(DB::raw('COUNT(DISTINCT COALESCE(user_id, anon_id))'));
            }])
            ->get();

        return view('pages.survey.index', compact('surveys'));
    }

    public function create()
    {
        return view('pages.survey.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'status' => 'required|in:Draft,Aktif,Selesai',
        ]);

        Survey::create([
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('survey.index')->with('success', 'Survey berhasil dibuat');
    }

    public function edit(Survey $survey)
    {
        return view('pages.survey.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'status' => 'required|in:Draft,Aktif,Selesai',
        ]);

        $survey->update([
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect()->route('survey.index')->with('success', 'Survey berhasil diupdate');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus');
    }
}
