<?php

namespace App\Http\Controllers\Auth\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

class ResearcherLoginController extends LoginController
{
    //
    public function showLoginForm()
    {
        return view('researcher.auth.login');
    }
    
}
