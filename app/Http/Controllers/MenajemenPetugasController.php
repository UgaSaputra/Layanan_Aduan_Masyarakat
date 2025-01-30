<?php

namespace App\Http\Controllers;

use App\Models\MenajemenPetugas;
use Illuminate\Http\Request;

class MenajemenPetugasController extends Controller
{
    public function create()
    {
        return view('Petugas.Inputpetugas');
    }

    public function lihat()
    {
        $petugas = MenajemenPetugas::all();
        return view('Petugas.Datapetugas', compact('petugas'));
    }
    public function input(Request $request)
    {
        $petugas = new MenajemenPetugas();
        $petugas->nama = $request->input('nama');
        $petugas->email = $request->input('email');
        $petugas->password = $request->input('password');
        $petugas->tanggal = $request->input('tanggal');
        $petugas->jenis_kelamin = $request->input('jenis_kelamin');

        $petugas->save();

        return redirect()->route('petugas.lihat')->with('success', 'Data Petugas berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $petugas = MenajemenPetugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.lihat')->with('success', 'Data Petugas berhasil dihapus.');
    }
}
