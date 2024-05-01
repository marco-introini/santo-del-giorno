<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\ApiResponse;

class LoginController extends Controller
{
    use ApiResponse;

    public function login(LoginRequest $request)
    {
        return $this->ok("Login OK");
    }

    public function logout()
    {

    }

}
