<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Researcher;
use App\Models\PendingCourse;

class PendingCourseController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('researcher');
    }
    public function index(){
    	$researcher = Researcher::where('user_id', Auth::user()->id)->first();
    	$researcher_id = $researcher->id;
    	dd($researcher_id);
    }
}
