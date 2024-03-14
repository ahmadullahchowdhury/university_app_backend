<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user_role = Role::where(['name' => 'student'])->first();
        if($user_role){
            $user->assignRole($user_role);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $roles = $user->getRoleNames();

        return response([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
            'roles' => $roles,
        ],201);
    }
}
