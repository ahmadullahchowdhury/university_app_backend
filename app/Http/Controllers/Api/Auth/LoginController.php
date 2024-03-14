<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $roles = $user->getRoleNames();
        return response([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
            'roles' => $roles,
        ],200);
    }
}
