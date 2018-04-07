<?php

namespace App\Http\Controllers\Auth\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

class StudentLoginController extends LoginController
{
    //
    public function showLoginForm()
    {
        return view('student.auth.login');
    }
}
