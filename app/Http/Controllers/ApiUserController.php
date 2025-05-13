<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json($users);
    }
    public function show($id) {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
