<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ApiResponse;

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return $this->error("Credenziali errate", 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok("Login OK", [
            'token' => $user->createToken('API token for '.$user->email)->plainTextToken
        ]);
    }

    public function logout()
    {

    }

}
