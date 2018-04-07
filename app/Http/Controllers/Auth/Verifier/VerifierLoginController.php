<?php

namespace App\Http\Controllers\Auth\Verifier;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

class VerifierLoginController extends LoginController
{
    //
    public function showLoginForm()
    {
        return view('verifier.auth.login');
    }
}
