<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Konsumsi extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'nomor_surat_nde',
//         'unit_kerja',
//         'tahun_anggaran_rapat',
//         'agenda_rapat',
//         'tanggal_rapat',
//         'jam_rapat',
//         'unggah_dokumen_nde',
//         'menu_konsumsi',
//         'total_biaya',
//         'distribusi_tujuan',
//         'lokasi_unit_kerja',
//         'catatan',
//         'tanda_tangan',
//         'status',
//     ];

//     protected $casts = [
//         'menu_konsumsi' => 'array', // Ini penting untuk mengelola JSON
//         'tanggal_rapat' => 'date',
//     ];
// }



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat_nde',
        'unit_kerja',
        'tahun_anggaran_rapat',
        'agenda_rapat',
        'tanggal_rapat',
        'jam_rapat',
        'unggah_dokumen_nde',
        'menu_konsumsi',
        'total_biaya',
        'distribusi_tujuan',
        'lokasi_unit_kerja',
        'catatan',
        'tanda_tangan',
        'status',
    ];

    protected $casts = [
        'menu_konsumsi' => 'array',
        'tanggal_rapat' => 'date',
    ];
}
