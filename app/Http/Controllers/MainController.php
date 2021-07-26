<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getTokenInfo(Request $request)
    {
        $request->user()->tokens;
        
        return $request->user();
    }
    
    public function acquireToken(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('frontend')->plainTextToken;
            
            return response()->json(compact('token'), 200);
        }

        return response()->json(null, 401);
    }
}
