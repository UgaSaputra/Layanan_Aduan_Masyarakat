<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenajemenAdmin extends Model
{
    use HasFactory;

    protected $table = 'menajemen_admins';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'tanggal',
        'jenis_kelamin',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
