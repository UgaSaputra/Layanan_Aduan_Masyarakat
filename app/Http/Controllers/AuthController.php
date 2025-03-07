<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'in:user,petugas',
        ]);

        $role = $validatedData['role'] ?? 'user';

        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => $role,
            ]);

            return response()->json(['user' => $user, 'message' => 'Register berhasil'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat registrasi', 'error' => $e->getMessage()], 500);
        }
    }

// Login method
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Login gagal!'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;

    // Cek role user dan sesuaikan pesan
    if ($user->role === 'petugas') {
        return response()->json([
            'message' => 'Login berhasil sebagai petugas!',
            'user' => $user,
            'role' => $user->role,
            'token' => $token
        ]);
    } else {
        return response()->json([
            'message' => 'Login berhasil sebagai user!',
            'user' => $user,
            'role' => $user->role,
            'token' => $token
        ]);
    }
}
}
