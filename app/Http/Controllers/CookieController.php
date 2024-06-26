<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCookieFromTokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;

class CookieController extends Controller
{
    public function store(Request $request)
    {
        $plainTextToken = $request->input('api_token');

        $token = PersonalAccessToken::findToken($plainTextToken);

        if (!$token) {
            abort(401);
        }


        $user = $token->tokenable;

        Auth::login($user);

        return redirect()->to(route('dashboard'));

        // $token->delete(); // Revoke the token (one-time use for getting a session cookie)
    }
}
