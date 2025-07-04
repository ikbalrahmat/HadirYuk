<?php

// namespace App\Http\Controllers;

// use App\Models\Presence;
// use App\Models\PresenceDetail;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class PresenceDetailController extends Controller
// {
//     public function exportPdf(string $id)
//     {
//         $presence = Presence::findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $id)->get();

//         // load view to pdf
//         $pdf = Pdf::setOptions(['isRemoteEnabled' => true])
//             ->loadView('pages.presence.detail.export-pdf', compact('presence', 'presenceDetails'))
//             ->setPaper('a4', 'landscape');

//         return $pdf->stream("{$presence->nama_kegiatan}.pdf", ['Attachment' => 0]);

//         exit();
//     }

//     public function destroy($id)
//     {
//         $presenceDetail = PresenceDetail::findOrFail($id);

//         if ($presenceDetail->tanda_tangan) {
//             Storage::disk('public_uploads')->delete($presenceDetail->tanda_tangan);
//         }

//         $presenceDetail->delete();

//         return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Presence;
// use App\Models\PresenceDetail;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class PresenceDetailController extends Controller
// {
//     /**
//      * Export detail absen ke PDF
//      */
//     public function exportPdf(string $id)
//     {
//         $presence = Presence::findOrFail($id);
//         $presenceDetails = PresenceDetail::where('presence_id', $id)->get();

//         // load view untuk PDF
//         $pdf = Pdf::setOptions(['isRemoteEnabled' => true])
//             ->loadView('pages.presence.detail.export-pdf', compact('presence', 'presenceDetails'))
//             ->setPaper('a4', 'landscape');

//         return $pdf->stream("{$presence->nama_kegiatan}.pdf", ['Attachment' => 0]);
//     }

//     /**
//      * Hapus satu data detail absen (AJAX)
//      */
//     public function destroy($id)
//     {
//         $presenceDetail = PresenceDetail::findOrFail($id);

//         // Hapus file tanda tangan jika ada
//         if ($presenceDetail->tanda_tangan) {
//             Storage::disk('public_uploads')->delete($presenceDetail->tanda_tangan);
//         }

//         $presenceDetail->delete();

//         return response()->json([
//             'status' => 'success',
//             'message' => 'Data berhasil dihapus'
//         ]);
//     }
// }



namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\PresenceDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresenceDetailController extends Controller
{
    /**
     * Export detail absen ke PDF
     */
    public function exportPdf(string $id)
    {
        $presence = Presence::findOrFail($id);
        $presenceDetails = PresenceDetail::where('presence_id', $id)->get();

        // Path gambar bukti kegiatan
        $buktiPath = null;
        if ($presence->bukti_kegiatan) {
            $buktiPath = public_path('storage/bukti/' . $presence->bukti_kegiatan);
        }

        // load view untuk PDF dan kirim data gambar
        $pdf = Pdf::setOptions(['isRemoteEnabled' => true])
            ->loadView('pages.presence.detail.export-pdf', compact('presence', 'presenceDetails', 'buktiPath'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream("{$presence->nama_kegiatan}.pdf", ['Attachment' => 0]);
    }

    /**
     * Hapus satu data detail absen (AJAX)
     */
    public function destroy($id)
    {
        $presenceDetail = PresenceDetail::findOrFail($id);

        // Hapus file tanda tangan jika ada
        if ($presenceDetail->tanda_tangan) {
            Storage::disk('public_uploads')->delete($presenceDetail->tanda_tangan);
        }

        $presenceDetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
