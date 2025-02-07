<?php

namespace App\Http\Controllers;
use App\Models\AksiLaporan;

use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function show() {
        return view('PengaduanAdmin.DaftarLaporan');
    }

    public function detail() {
        return view('PengaduanAdmin.DetailLaporan');
    }

    public function aksi() {
        return view('PengaduanAdmin.AksiLaporan');
    }
}
