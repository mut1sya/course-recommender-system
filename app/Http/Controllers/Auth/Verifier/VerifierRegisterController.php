<?php

namespace App\Http\Controllers\Auth\Verifier;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class VerifierRegisterController extends RegisterController
{
    //
    public function showRegistrationForm()
    {
        return view('verifier.auth.register');
    }
}
