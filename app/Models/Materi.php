<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

// class Materi extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'rapat_id',
//         'judul',
//         'file_path',
//     ];

//     public function rapat(): BelongsTo
//     {
//         return $this->belongsTo(Rapat::class);
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materi extends Model
{
    use HasFactory;

    // Ganti 'rapat_id' menjadi 'undangan_id' di fillable
    protected $fillable = [
        'undangan_id',
        'judul',
        'file_path',
    ];

    // Ganti relasi dari rapat() menjadi undangan()
    public function undangan(): BelongsTo
    {
        return $this->belongsTo(Undangan::class);
    }
}
