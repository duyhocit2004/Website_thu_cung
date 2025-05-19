<?php

namespace App\Service\Auth;

use Illuminate\Support\Facades\Request;

interface IAuthService
{
    
    public function login($request);
    public function loginAdmin($request);

    public function register($request);

    public function logout();

    public function ForgotPassword($request);
    public function redirectToGoogle();
    public function handleGoogleCallback();

}