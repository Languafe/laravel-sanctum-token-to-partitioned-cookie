<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApiTokenRequest;
use Illuminate\Support\Facades\Log;

class ApiTokenController extends Controller
{
    public function store(StoreApiTokenRequest $request)
    {
        /** @var \App\Models\User */
        $user = $request->user();
        $token = $user->createToken(
            $request->input('name'),
            ['*'],
            now()->addHour(), // This token is only meant to be used to trade for a cookie
        );

        Log::debug('generated new API token for user ' . $user->email);

        return response()->json([
            'data' => [
                'token' => $token->plainTextToken,
            ],
        ]);
    }
}
