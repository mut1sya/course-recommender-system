<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
use App\Models\Researcher;
use App\Models\Verifier;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


       
    

    public function index() {
        if(Auth::user()->role=="student"){
            //if student does not exist in the student table take them to compete profile otherwise take them to the dashboard
            if(Student::where('user_id', Auth::user()->id)->exists()){                
                return redirect()->route('student.index');
            } else{
               return redirect()->route('student.create');  
            }
              
        }
        if(Auth::user()->role=="researcher"){
            //if researcher does not exist in the researcher table take them to complete profile otherwise take them to dashboard
            if(Researcher::where('user_id', Auth::user()->id)->exists()){
                return redirect()->route('researcher.dashboard');
            } else {
                return redirect()->route('researcher.create');
            }
            
        }
        if(Auth::user()->role=='verifier'){
          //if verifier does not exist in the verifier table take them to complete profile otherwise take them to dashboard
            if(Verifier::where('user_id', Auth::user()->id)->exists()){

                if(Verifier::where('user_id', Auth::user()->id)->get()->first()->active == '1'){
                    return redirect()->route('verifier.dashboard');
                } else{
                    return view('verifier.pendingApproval');
                }
                
            } else {
                return redirect()->route('verifier.create');
            }
        }
        

    }
     function getMean(){
            dd('i am here');
        }

    public function studentIndex(){
        return view('student.completeProfile');
    }

    public function researcherIndex(){
        return view('researcher.home');
    }

    public function verifierIndex(){
        return view('verifier.home');
    }

    public function demo(){
        $contents = Storage::get('testdata/certificate/sampleBusiness.txt');
        dd($contents);
    }
}
