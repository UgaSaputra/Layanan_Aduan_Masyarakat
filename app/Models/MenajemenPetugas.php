<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenajemenPetugas extends Model
{
    use HasFactory;
    protected $table = 'menajemen_petugas';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
