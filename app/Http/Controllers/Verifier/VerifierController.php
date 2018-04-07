<?php

namespace App\Http\Controllers\Verifier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Verifier;
use App\User;
use App\Models\Course;
use Auth;
use Illuminate\Support\Facades\Hash;

class VerifierController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('verifier');
    }

    public function create(){
    	return view('verifier.completeProfile');
    }

    public function store(Request $request){
    	
    	$this->validate($request, [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'phone_number' => 'required',
    		'social_media_handle' => 'required',
    		'location' => 'required',
    		'user_id' => 'required|unique:students,user_id',
    		'professional_title' => 'required',
    		'level_of_education' => 'required',
    		'active' => 'required',
    	]);

    	$verifier = new Verifier;
    	$verifier->first_name = $request->first_name;
    	$verifier->last_name = $request->last_name;
    	$verifier->phone_number = $request->phone_number;
    	$verifier->social_media_handle = $request->social_media_handle;
    	$verifier->location = $request->location;
    	$verifier->user_id = $request->user_id;
    	$verifier->professional_title = $request->professional_title;
    	$verifier->level_of_education = $request->level_of_education;
    	$verifier->active = $request->active;

    	$verifier->save();
    	return redirect()->route('verifier.dashboard');
    }

    public function showProfile(){
    	$verifier = Verifier::where('user_id', Auth::user()->id)->first();

    	return view('verifier.viewProfile',['verifier'=> $verifier]);
    }

    public function editProfile(){
    	$id = Auth::user()->id;
        
        $verifier = Verifier::where('user_id', $id)->first();
        

        return view('verifier.editProfile',['verifier'=>$verifier]);
    }
    
    public function updateProfile(Request $request){
    	$this->validate($request,[
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'phone_number' => 'required',
    		'social_media_handle' => 'required',
    		'location' => 'required',
    		'user_id' => 'required|unique:students,user_id',
    		'professional_title' => 'required',
    		'level_of_education' => 'required',
    		'active' => 'required',
    	]);

    	$verifier = Verifier::where('user_id', $request->user_id)->first();

    	$verifier->update([
    		$verifier->first_name = $request->first_name,
    		$verifier->last_name = $request->last_name,
    		$verifier->phone_number = $request->phone_number,
    		$verifier->social_media_handle = $request->social_media_handle,
    		$verifier->location = $request->location,
    		$verifier->user_id = $request->user_id,
    		$verifier->professional_title = $request->professional_title,
    		$verifier->level_of_education = $request->level_of_education,
    		$verifier->active = $request->active,
    	]);

    	$user= User::findOrFail($request->user_id);
        $user->update([
            $user->userName = $request->userName,
            $user->email = $request->email,
        ]);

        return back()->with(['status'=>'suceesifully changed the profile']);
    }

    public function updatePassword(Request $request){
    	$this->validate($request,[
            'old_password'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required|same:password'
            ]);
        $status="";
    $customerror = "password did not match one in our records";
        if(Hash::check($request->old_password, Auth::user()->password)){
            Auth::user()->update(['password'=>bcrypt($request->password)]);
            $status="password successifully changed";
            $customerror = "";
        } 
        
        return back()->with(['status'=>$status,
            'error'=>$customerror]);
    }

    public function ShowPendingCourses(){
        $courses= Course::where('verified', false)->get();

        return view('verifier.vcourses.viewCourses', ['courses' => $courses]);
    }

    public function approveCourse($id){
        $course = Course::findOrFail($id);
        return view('verifier.vcourses.approve',['course' => $course]);
    }

    public function approved($id){
        Course::findOrFail($id)->update(['verified'=> true]);

        return redirect()->route('verifier.pendingCourses');
    }
}
