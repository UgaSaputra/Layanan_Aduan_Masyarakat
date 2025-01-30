<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanSuperAdminController extends Controller
{
    public function show() {
        return view('PengaduanSuperAdmin.DaftarLaporan');
    }

    public function detail() {
        return view('PengaduanSuperAdmin.DetailLaporan');
    }

    public function rekap() {
        return view('PengaduanSuperAdmin.RekapLaporan');
    }
    public function view_pdf() {
        
    }
}
