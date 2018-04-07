<?php

namespace App\Http\Controllers\Auth\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class ResearcherRegisterController extends RegisterController
{
    //

    public function showRegistrationForm()
    {
        return view('researcher.auth.register');
    }
}
