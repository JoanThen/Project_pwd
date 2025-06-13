<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Login gagal. Email atau password salah.',
            ], 401);
        }

        $user = Auth::user();

        // Jika ingin batasi hanya role tertentu (misal: hanya 'user' yg boleh login via mobile)
        if (!in_array($user->role, ['user', 'admin'])) {
            return response()->json([
                'success' => false,
                'message' => 'Role tidak diizinkan.',
            ], 403);
        }

        // Hapus semua token sebelumnya (opsional, tergantung kebutuhanmu)
        $user->tokens()->delete();

        // Buat token baru
        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Anda Berhasil login.',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil.',
        ]);
    }
}
