<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Risalah extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'rapat_id', 'presence_id',
//         'agenda', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'tempat',
//         'pimpinan', 'pencatat',
//         'jenis_rapat', 'penjelasan', 'kesimpulan',
//     ];

//     public function rapat()
//     {
//         return $this->belongsTo(Rapat::class);
//     }

//     public function presence()
//     {
//         return $this->belongsTo(Presence::class);
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Risalah extends Model
{
    use HasFactory;

    // Ganti 'rapat_id' menjadi 'undangan_id' di fillable
    protected $fillable = [
        'undangan_id', 'presence_id',
        'agenda', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'tempat',
        'pimpinan', 'pencatat',
        'jenis_rapat', 'penjelasan', 'kesimpulan',
    ];

    // Ganti relasi dari rapat() menjadi undangan()
    public function undangan(): BelongsTo
    {
        return $this->belongsTo(Undangan::class);
    }

    public function presence(): BelongsTo
    {
        return $this->belongsTo(Presence::class);
    }
}
