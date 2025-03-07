<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_laporan',
        'foto1',
        'foto2',
        'foto3',
        'provinsi',
        'kabupaten',
        'alamat',
        'keterangan',
        'status',
    ];

    public function getStatusAttribute($value)
    {
        if ($value == 'dikerjakan') {
            return 'sedang dikerjakan';
        } elseif ($value == 'selesai') {
            return 'selesai';
        }
        return $value;
    }


}
