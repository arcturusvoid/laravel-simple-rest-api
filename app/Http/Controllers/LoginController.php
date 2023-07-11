<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || ! Hash::check($request->password, $user->password))
            return response()->json(['error' => 'The provided credentials are incorrect']);
        
        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json(
            ['access_token' => $user->createToken($device)->plainTextToken
        ]);
    }
}
