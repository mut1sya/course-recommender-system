<?php

namespace App\Http\Controllers\Auth\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;

class StudentRegisterController extends RegisterController
{
    //

 

    public function showRegistrationForm()
    {
        return view('student.auth.register');
    }
    
}
