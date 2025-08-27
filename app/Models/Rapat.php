<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rapat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_rapat',
        'tanggal',
        'tempat',
        'pic_rapat',
        'catatan',
    ];

    public function agendaRapat(): HasMany
    {
        return $this->hasMany(AgendaRapat::class);
    }
}



// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;

// class Rapat extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'nama_rapat',
//         'tanggal',
//         'tempat',
//         'pic_rapat',
//         'catatan',
//     ];

//     public function agendaRapat(): HasMany
//     {
//         return $this->hasMany(AgendaRapat::class, 'rapat_id');
//     }

//     protected static function booted()
//     {
//         static::deleting(function ($rapat) {
//             $rapat->agendaRapat()->delete(); // hapus semua agenda terkait
//         });
//     }
// }
