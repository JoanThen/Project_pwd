<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Coba login pakai Auth::attempt
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Login gagal. Email atau password salah.'], 401);
        }

        $user = Auth::user();

        // Cek role user
        if ($user->role !== 'user') {
            return response()->json(['message' => 'Role tidak diizinkan.'], 403);
        }

        // Buat token Sanctum
        $token = $user->createToken('mobile-token')->plainTextToken;

        // Response sukses beserta token dan data user (batasi field sensitif)
        return response()->json([
            'message' => 'Login berhasil.',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                // tambahkan field lain yang perlu dikirim
            ],
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus token yang dipakai user saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout berhasil.']);
    }
}
