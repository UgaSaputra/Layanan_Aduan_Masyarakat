<?php

namespace App\Http\Controllers;
use App\Models\MenajemenAdmin;

use Illuminate\Http\Request;

class MenajemenAdminController extends Controller
{
    public function show() {
        return view('Admin.InputAdmin');
    }

    public function data() {
        $admin = MenajemenAdmin::all();
        return view('Admin.DataAdmin', compact('admin'));
    }

    public function tambah(Request $request)
    {
        $admin = new MenajemenAdmin();
        $admin->nama = $request->input('nama');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->tanggal = $request->input('tanggal');
        $admin->jenis_kelamin = $request->input('jenis_kelamin');

        $admin->save();

        return redirect()->route('admin.data')->with('success', 'Data Admin berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $admin = MenajemenAdmin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.data')->with('success', 'Data Admin berhasil dihapus.');
    }
}
