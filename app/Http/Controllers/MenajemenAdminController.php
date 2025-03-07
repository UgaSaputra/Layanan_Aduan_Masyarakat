<?php

namespace App\Http\Controllers;
// use App\Models\MenajemenAdmin;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenajemenAdminController extends Controller
{
    public function show() {
        return view('Admin.InputAdmin');
    }

    public function data() {
        $admin = User::where('role', 'petugas')->get();
        return view('Admin.DataAdmin', compact('admin'));
    }

    public function tambah(Request $request)
    {
        $admin = new User();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->role = 'petugas';

        $admin->save();

        return redirect()->route('admin.data')->with('success', 'Data Admin berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.data')->with('success', 'Data Admin berhasil dihapus.');
    }
}
