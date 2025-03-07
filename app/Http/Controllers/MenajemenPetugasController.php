<?php

namespace App\Http\Controllers;

// use App\Models\MenajemenPetugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenajemenPetugasController extends Controller
{
    public function create()
    {
        return view('Petugas.Inputpetugas');
    }

    public function lihat()
    {
        $petugas = User::where('role', 'admin')->get();
        return view('Petugas.Datapetugas', compact('petugas'));
    }

    public function input(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:menajemen_petugas,email',
            'password' => 'required|string|min:6',
        ]);

        $petugas = new User();
        $petugas->name = $request->input('name');
        $petugas->email = $request->input('email');
        $petugas->password = Hash::make($request->input('password'));
        $petugas->role = 'admin';
        // 🔥 Hashing password sebelum disimpan

        $petugas->save();

        return redirect()->route('petugas.lihat')->with('success', 'Data Petugas berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.lihat')->with('success', 'Data Petugas berhasil dihapus.');
    }
}
