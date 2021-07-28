<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(null, 200);
    }

    public function getTokenInfo(Request $request)
    {   
        $user = $request->user();
        $user->role = $user->skpd_id ? 'skpd' : 'admin'; 
        return $user;
    }
    
    public function acquireToken(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->role = $user->skpd_id ? 'skpd' : 'admin'; 
            $token = $user->createToken('frontend')->plainTextToken;
            
            return response()->json(compact('token', 'user'), 200);
        }

        return response()->json(null, 401);
    }
}
