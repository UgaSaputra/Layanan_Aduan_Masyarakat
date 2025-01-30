<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm() {
        return view('Home.Register');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
    }
}
