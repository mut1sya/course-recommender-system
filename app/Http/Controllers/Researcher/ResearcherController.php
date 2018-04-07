<?php

namespace App\Http\Controllers\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Researcher;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ResearcherController extends Controller
{
    //
    public function __construct(){
        $this->middleware('researcher');
    }

    public function create(){
    	return view('researcher.completeProfile');
    }

    public function store(Request $request){
    	
    	$this->validate($request, [
    		'phone_number' => 'required',
    		'social_media_handle' => 'required',
    		'location' => 'required',
    		'user_id' => 'required|unique:students,user_id',
    	]);

    	$researcher = new Researcher;
    	$researcher->phone_number = $request->phone_number;
    	$researcher->social_media_handle = $request->social_media_handle;
    	$researcher->location = $request->location;
    	$researcher->user_id = $request->user_id;

    	$researcher->save();
    	return redirect()->route('researcher.dashboard');
    }

    public function showProfile(){
    	$researcher = Researcher::where('user_id', Auth::user()->id)->first();

    	return view('researcher.viewProfile',['researcher'=> $researcher]);
    }

    public function editProfile(){
    	$id = Auth::user()->id;
        
        $researcher = Researcher::where('user_id', $id)->first();
        

        return view('researcher.editProfile',['researcher'=>$researcher]);
    }

    public function updateProfile(Request $request){
    	$this->validate($request,[
    		'phone_number' => 'required',
    		'social_media_handle' => 'required',
    		'location' => 'required',
    		'user_id' => 'required|unique:students,user_id',
    	]);

    	$researcher = Researcher::where('user_id', $request->user_id)->first();

    	$researcher->update([
    		$researcher->phone_number = $request->phone_number,
    		$researcher->social_media_handle = $request->social_media_handle,
    		$researcher->location = $request->location,
    		$researcher->user_id = $request->user_id,
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
}
