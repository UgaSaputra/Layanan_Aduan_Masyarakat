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
        // $laporan = AksiLaporan::all();
        return view('PengaduanAdmin.AksiLaporan');
    }
    // public function input(Request $request)
    // {
    //     $laporan = new AksiLaporan();
    //     $laporan->nama = $request->input('nama');
    //     $laporan->email = $request->input('email');
    //     $laporan->password = $request->input('password');
    //     $laporan->tanggal = $request->input('tanggal');
    //     $laporan->jenis_kelamin = $request->input('jenis_kelamin');

    //     $laporan->save();

    //     return redirect()->route('petugas.lihat')->with('success', 'Data Petugas berhasil ditambahkan.');
    // }
}
