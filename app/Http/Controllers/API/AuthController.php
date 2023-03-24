<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        // dd(Hash::check($request->password, $user->password));

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => 'failed',
                'message' => 'Password Salah'
            ]);
        }

        $token = $user->createToken('token-name')->plainTextToken();

        return response()->json([
            'status' => 'success',
            'message' => 'Login Berhasil',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);
    }
}
