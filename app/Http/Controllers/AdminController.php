<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Verifier;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }

    public function showProfile(){
    	$user = User::findOrFail(Auth::user()->id);
    	return view('admin.viewProfile', ['user'=> $user]);
    }

    public function editProfile(){
    	$user = User::findOrFail(Auth::user()->id);
    	return view('admin.editprofile', ['user'=> $user]);
    }

    public function updateProfile(Request $request){
    	$this->validate($request,[
    		'userName' => 'required',
    		'email' => 'required|email',
    	]);
    	$user = User::findOrFail($request->user_id);
    	$user->update([
    		$user->userName = $request->userName,
    		$user->email = $request->email,
    	]);

    	return back()->with(['status'=>'successfully changed the profile']);
    }

    public function updatePassword(Request $request){
    	$this->validate($request,[
    		'old_password' => 'required',
    		'password' => 'required',
    		'password_confirmation' => 'required|same:password'
    	]);
    	$status = "";
    	$customerror = "password did not match one in our records";
    	if(Hash::check($request->old_password, Auth::user()->password)){
    		Auth::user()->update(['password'=>bcrypt($request->password)]);
    		$status = "password successfully changed";
    		$customerror = "";
    	}
    	return back()->with(['status'=> $status, 'error' =>$customerror]);
    }

    public function pendingVerifiers(){
    	$verifiers = Verifier::where('active', '0')->get();
    	return view('admin.pendingVerifier', ['verifiers' => $verifiers]);
    }

    public function verify(Request $request){
    	$this->validate($request,[
    		'verifier_id' => 'required',
    	]);

    	$verifier = Verifier::findOrFail($request->verifier_id);
    	$verifier->update(['active' => '1']);

    	return redirect()->route('admin.pendingVerifiers');
    }

    public function showVerifier($id){
    	$verifier = Verifier::findOrFail($id);
    	return view('admin.approveVerifier', ['verifier'=> $verifier]);

    }

}
