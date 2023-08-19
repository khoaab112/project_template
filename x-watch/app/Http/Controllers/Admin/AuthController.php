<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AuthServices;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthServices $authServices)
    {
        $this->auth = $authServices;
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function getRegister()
    {
        return view('admin.auth.register');
    }
}
