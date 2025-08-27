<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Rapat;
// use Barryvdh\DomPDF\Facade\Pdf;

// class AgendaRapatController extends Controller
// {
//     public function index(Request $request)
//     {
//         $perPage = $request->input('per_page', 5); // default 5
//         $search = $request->input('search');

//         $rapat = Rapat::orderBy('tanggal', 'desc')
//             ->when($search, function ($query) use ($search) {
//                 $query->where('nama_rapat', 'like', '%' . $search . '%');
//             })
//             ->paginate($perPage)
//             ->appends(['search' => $search, 'per_page' => $perPage]);

//         return view('pages.agenda.index', compact('rapat', 'search', 'perPage'));
//     }

//     public function create()
//     {
//         return view('pages.agenda.create');
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nama_rapat' => 'required|string|max:255',
//             'tanggal' => 'required|date',
//             'tempat' => 'required|string|max:255',
//             'pic_rapat' => 'required|string|max:255',
//             'catatan' => 'nullable|string',
//         ]);

//         Rapat::create($validatedData);
//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil ditambahkan!');
//     }

//     public function show($id)
//     {
//         $rapat = Rapat::with('agendaRapat')->findOrFail($id);
//         return view('pages.agenda.show', compact('rapat'));
//     }

//     public function edit($id)
//     {
//         $rapat = Rapat::findOrFail($id);
//         return view('pages.agenda.edit', compact('rapat'));
//     }

//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'nama_rapat' => 'required|string|max:255',
//             'tanggal' => 'required|date',
//             'tempat' => 'required|string|max:255',
//             'pic_rapat' => 'required|string|max:255',
//             'catatan' => 'nullable|string',
//         ]);

//         $rapat = Rapat::findOrFail($id);
//         $rapat->update($validatedData);

//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil diupdate!');
//     }

//     public function destroy($id)
//     {
//         $rapat = Rapat::findOrFail($id);
//         $rapat->delete();

//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil dihapus!');
//     }

//     public function exportPdf($rapatId)
//     {
//         $rapat = Rapat::with('agendaRapat')->findOrFail($rapatId);
//         $pdf = Pdf::loadView('pages.agenda.pdf', compact('rapat'));
//         return $pdf->download("agenda-rapat-{$rapatId}.pdf");
//     }
// }


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Rapat;
// use App\Models\Undangan; // Impor model Undangan
// use Barryvdh\DomPDF\Facade\Pdf;

// class AgendaRapatController extends Controller
// {
//     public function index(Request $request)
//     {
//         $perPage = $request->input('per_page', 5);
//         $search = $request->input('search');

//         $rapat = Rapat::orderBy('tanggal', 'desc')
//             ->when($search, function ($query) use ($search) {
//                 $query->where('nama_rapat', 'like', '%' . $search . '%');
//             })
//             ->paginate($perPage)
//             ->appends(['search' => $search, 'per_page' => $perPage]);

//         return view('pages.agenda.index', compact('rapat', 'search', 'perPage'));
//     }

//     public function create()
//     {
//         // Ambil semua data undangan yang sudah ada
//         $undangan = Undangan::all();
//         // Kirim data undangan ke view
//         return view('pages.agenda.create', compact('undangan'));
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nama_rapat' => 'required|string|max:255',
//             'tanggal' => 'required|date',
//             'tempat' => 'required|string|max:255',
//             'pic_rapat' => 'required|string|max:255',
//             'catatan' => 'nullable|string',
//         ]);

//         Rapat::create($validatedData);
//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil ditambahkan!');
//     }

//     public function show($id)
//     {
//         $rapat = Rapat::with('agendaRapat')->findOrFail($id);
//         return view('pages.agenda.show', compact('rapat'));
//     }

//     public function edit($id)
//     {
//         $rapat = Rapat::findOrFail($id);
//         return view('pages.agenda.edit', compact('rapat'));
//     }

//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'nama_rapat' => 'required|string|max:255',
//             'tanggal' => 'required|date',
//             'tempat' => 'required|string|max:255',
//             'pic_rapat' => 'required|string|max:255',
//             'catatan' => 'nullable|string',
//         ]);

//         $rapat = Rapat::findOrFail($id);
//         $rapat->update($validatedData);

//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil diupdate!');
//     }

//     public function destroy($id)
//     {
//         $rapat = Rapat::findOrFail($id);
//         $rapat->delete();

//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil dihapus!');
//     }

//     public function exportPdf($rapatId)
//     {
//         $rapat = Rapat::with('agendaRapat')->findOrFail($rapatId);
//         $pdf = Pdf::loadView('pages.agenda.pdf', compact('rapat'));
//         return $pdf->download("agenda-rapat-{$rapatId}.pdf");
//     }
// }



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Rapat;
// use App\Models\AgendaRapat;
// use App\Models\Undangan;
// use Barryvdh\DomPDF\Facade\Pdf;

// class AgendaRapatController extends Controller
// {
//     // ===== CRUD Rapat =====
//     public function index(Request $request)
//     {
//         $perPage = $request->input('per_page', 5);
//         $search = $request->input('search');

//         $rapat = Rapat::orderBy('tanggal', 'desc')
//             ->when($search, function ($query) use ($search) {
//                 $query->where('nama_rapat', 'like', '%' . $search . '%');
//             })
//             ->paginate($perPage)
//             ->appends(['search' => $search, 'per_page' => $perPage]);

//         return view('pages.agenda.index', compact('rapat', 'search', 'perPage'));
//     }

//     public function create()
//     {
//         $undangan = Undangan::all();
//         return view('pages.agenda.create', compact('undangan'));
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'nama_rapat' => 'required|string|max:255',
//             'tanggal' => 'required|date',
//             'tempat' => 'required|string|max:255',
//             'pic_rapat' => 'required|string|max:255',
//             'catatan' => 'nullable|string',
//         ]);

//         Rapat::create($validatedData);
//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil ditambahkan!');
//     }

//     public function show($id)
//     {
//         $rapat = Rapat::with('agendaRapat')->findOrFail($id);
//         return view('pages.agenda.show', compact('rapat'));
//     }

//     public function edit($id)
//     {
//         $rapat = Rapat::findOrFail($id);
//         return view('pages.agenda.edit', compact('rapat'));
//     }

//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'nama_rapat' => 'required|string|max:255',
//             'tanggal' => 'required|date',
//             'tempat' => 'required|string|max:255',
//             'pic_rapat' => 'required|string|max:255',
//             'catatan' => 'nullable|string',
//         ]);

//         $rapat = Rapat::findOrFail($id);
//         $rapat->update($validatedData);

//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil diupdate!');
//     }

//     public function destroy($id)
//     {
//         $rapat = Rapat::findOrFail($id);
//         $rapat->delete();

//         return redirect()->route('agenda.index')->with('success', 'Rapat berhasil dihapus!');
//     }

//     public function exportPdf($rapatId)
//     {
//         $rapat = Rapat::with('agendaRapat')->findOrFail($rapatId);
//         $pdf = Pdf::loadView('pages.agenda.pdf', compact('rapat'));
//         return $pdf->download("agenda-rapat-{$rapatId}.pdf");
//     }

//     // ===== CRUD Item Agenda (agenda_rapats) =====
//     public function agendaCreate($rapatId)
//     {
//         $rapat = Rapat::findOrFail($rapatId);
//         return view('pages.agenda.items.create', compact('rapat'));
//     }

//     public function agendaStore(Request $request, $rapatId)
//     {
//         $request->validate([
//             'jam' => 'required|string|max:20',
//             'agenda' => 'required|string',
//             'pic' => 'required|string|max:255',
//         ]);

//         AgendaRapat::create([
//             'rapat_id' => $rapatId,
//             'jam' => $request->jam,
//             'agenda' => $request->agenda,
//             'pic' => $request->pic,
//         ]);

//         return redirect()->route('agenda.show', $rapatId)->with('success', 'Item agenda berhasil ditambahkan!');
//     }

//     public function agendaEdit($rapatId, $agendaId)
//     {
//         $rapat = Rapat::findOrFail($rapatId);
//         $agenda = AgendaRapat::findOrFail($agendaId);
//         return view('pages.agenda.items.edit', compact('rapat', 'agenda'));
//     }

//     public function agendaUpdate(Request $request, $rapatId, $agendaId)
//     {
//         $request->validate([
//             'jam' => 'required|string|max:20',
//             'agenda' => 'required|string',
//             'pic' => 'required|string|max:255',
//         ]);

//         $agenda = AgendaRapat::findOrFail($agendaId);
//         $agenda->update([
//             'jam' => $request->jam,
//             'agenda' => $request->agenda,
//             'pic' => $request->pic,
//         ]);

//         return redirect()->route('agenda.show', $rapatId)->with('success', 'Item agenda berhasil diupdate!');
//     }

//     public function agendaDestroy($rapatId, $agendaId)
//     {
//         $agenda = AgendaRapat::findOrFail($agendaId);
//         $agenda->delete();

//         return redirect()->route('agenda.show', $rapatId)->with('success', 'Item agenda berhasil dihapus!');
//     }
// }




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\AgendaRapat;
use App\Models\Undangan;
use Barryvdh\DomPDF\Facade\Pdf;

class AgendaRapatController extends Controller
{
    // ===== CRUD Rapat =====

    // public function index()
    // {
    //     $rapat = Rapat::orderBy('tanggal', 'desc')->get(); // pakai get(), jangan paginate
    //     return view('pages.agenda.index', compact('rapat'));
    // }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');

        $rapat = Rapat::orderBy('tanggal', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_rapat', 'like', '%' . $search . '%');
            })
            ->paginate($perPage)
            ->appends(['search' => $search, 'per_page' => $perPage]);

        return view('pages.agenda.index', compact('rapat', 'search', 'perPage'));
    }

    public function create()
    {
        $undangan = Undangan::all();
        return view('pages.agenda.create', compact('undangan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rapat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'pic_rapat' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        Rapat::create($validatedData);
        return redirect()->route('agenda.index')->with('success', 'Rapat berhasil ditambahkan!');
    }

    public function show($id)
    {
        $rapat = Rapat::with('agendaRapat')->findOrFail($id);
        return view('pages.agenda.show', compact('rapat'));
    }

    public function edit($id)
    {
        $rapat = Rapat::findOrFail($id);
        return view('pages.agenda.edit', compact('rapat'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_rapat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'pic_rapat' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $rapat = Rapat::findOrFail($id);
        $rapat->update($validatedData);

        return redirect()->route('agenda.index')->with('success', 'Rapat berhasil diupdate!');
    }

    public function destroy($id)
    {
        $rapat = Rapat::findOrFail($id);
        $rapat->delete();

        return redirect()->route('agenda.index')->with('success', 'Rapat berhasil dihapus!');
    }

    public function exportPdf($rapatId)
    {
        $rapat = Rapat::with('agendaRapat')->findOrFail($rapatId);
        $pdf = Pdf::loadView('pages.agenda.pdf', compact('rapat'));
        return $pdf->download("agenda-rapat-{$rapatId}.pdf");
    }

    // ===== CRUD Item Agenda (agenda_rapats) =====
    public function agendaCreate($rapatId)
    {
        $rapat = Rapat::findOrFail($rapatId);
        return view('pages.agenda.agenda_create', compact('rapat')); // ✅ FIX
    }

    public function agendaStore(Request $request, $rapatId)
    {
        $request->validate([
            'jam' => 'required|string|max:20',
            'agenda' => 'required|string',
            'pic' => 'required|string|max:255',
        ]);

        AgendaRapat::create([
            'rapat_id' => $rapatId,
            'jam' => $request->jam,
            'agenda' => $request->agenda,
            'pic' => $request->pic,
        ]);

        return redirect()->route('agenda.show', $rapatId)->with('success', 'Item agenda berhasil ditambahkan!');
    }

    public function agendaEdit($rapatId, $agendaId)
    {
        $rapat = Rapat::findOrFail($rapatId);
        $agenda = AgendaRapat::findOrFail($agendaId);
        return view('pages.agenda.agenda_edit', compact('rapat', 'agenda')); // ✅ FIX
    }

    public function agendaUpdate(Request $request, $rapatId, $agendaId)
    {
        $request->validate([
            'jam' => 'required|string|max:20',
            'agenda' => 'required|string',
            'pic' => 'required|string|max:255',
        ]);

        $agenda = AgendaRapat::findOrFail($agendaId);
        $agenda->update([
            'jam' => $request->jam,
            'agenda' => $request->agenda,
            'pic' => $request->pic,
        ]);

        return redirect()->route('agenda.show', $rapatId)->with('success', 'Item agenda berhasil diupdate!');
    }

    public function agendaDestroy($rapatId, $agendaId)
    {
        $agenda = AgendaRapat::findOrFail($agendaId);
        $agenda->delete();

        return redirect()->route('agenda.show', $rapatId)->with('success', 'Item agenda berhasil dihapus!');
    }
}
