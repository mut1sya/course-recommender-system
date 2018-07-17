<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Verifier;
use App\Models\Complaint;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }
    public function getAdmin(){
        return Admin::where('user_id', Auth::user()->id)->first();   
    }

    public function showProfile(){    	
    	return view('admin.viewProfile', ['admin'=> $this->getAdmin()]);
    }

    public function editProfile(){
    	
    	return view('admin.editprofile', ['admin'=> $this->getAdmin()]);
    }

    public function updateProfile(Request $request){
    	$this->validate($request,[
            'userName' => 'required',
            'email' => 'required|email',
    		'first_name' => 'required',
    		'last_name' => 'required',
            'location' => 'required',
            'phone_number' => 'required|numeric',
    	]);
        $admin = $this->getAdmin();
    	$admin->update([
    		$admin->first_name = $request->first_name,
    		$admin->last_name = $request->last_name,
            $admin->location = $request->location,
            $admin->phone_number = $request->phone_number,
    	]);
        $user= User::findOrFail($request->user_id);
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
    public function showAdminForm(){
        return view('admin.addAdmin');
    }
    public function addAdmin(Request $request){
        $this->validate($request, [
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
        ]);
        $user = new User;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->role = 'admin';
        $user->password = bcrypt($request->email);
        $user->save();
        $admin = new Admin;
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->location = $request->location;
        $admin->phone_number =  $request->phone_number;
        $admin->user_id = $user->id;
        $admin->save();
        return redirect()->route('home');
    }

    public function viewComplaints(){
        $complaints = Complaint::where('response', null)->paginate(15);
        return view('admin.complaints', ['complaints' => $complaints]);
    }
    public function reply($id){
        $complaint = Complaint::findOrFail($id);
        $user_name= $complaint->user->userName;

        $role = $complaint->user->role;

        return view('admin.response',['complaint'=> $complaint, 'user_name' => $user_name, 'role' =>$role]);
        //page showing the original message and a place to reply
    }

    public function saveResponse(Request $request){
        $this->validate($request, [
            'response' => 'required',
            'id' => 'required'
        ]);
        $complaint = Complaint::findOrFail($request->id);
        $complaint->response = $request->response;
        $complaint->save();
        return redirect()->route('admin.viewComplaints');

    }
    public function viewIndustries(){
        $industries = DB::table('industries')->get();
        
        return view('admin.viewIndustries', ['industries'=> $industries]);
    }
    public function addIndustry(Request $request){
        //here
        $this->validate($request, [
            'industry' => 'required'
        ]);
        
        $item = strtolower($request->industry);
        //if item exists do nothing else add it
       if(DB::table('industries')->where('industry_name', $item)->doesntExist()){
            DB::table('industries')->insert(['industry_name' => $item]);
        }
        return back();
    }
    public function editIndustry(Request $request){
        $this->validate($request, [
                'industry' => 'required',
                'industry_id' => 'required'
        ]);
        DB::table('industries')->where('id', $request->industry_id)->update(['industry_name' => $request->industry]);
        
        return back();

    }
    public function deleteIndustry(Request $request){
        $this->validate($request, ['industry_id1' => 'required']);
        Db::table('industries')->where('id', $request->industry_id1)->delete();
        return back();
    }
    

    public function viewResearcherRules(){
        $rules = DB::table('researcher_rules')->get();        
        return view('admin.viewResearcherRules', ['rules'=> $rules]);
    }
    public function addResearcherRules(Request $request){
        $this->validate($request, ['rule'=> 'required']);
        if(DB::table('researcher_rules')->where('rule', $request->rule)->doesntExist()){
            DB::table('researcher_rules')->insert(['rule' => $request->rule]);
        }
        return back();
    }
    public function editResearcherRules(Request $request){
        $this->validate($request, [
            'rule_id' => 'required',
            'edit_rule' => 'required'
        ]);
        DB::table('researcher_rules')->where('id', $request->rule_id)->update(['rule' => $request->edit_rule]);
        return back();
    }

    public function deleteResearcherRules(Request $request){
    $this->validate($request, ['delete_rule_id' => 'required']);
        Db::table('researcher_rules')->where('id', $request->delete_rule_id)->delete();
        return back();
    }
    
    public function viewVerifierRules(){
        $rules = DB::table('verifier_rules')->get();        
        return view('admin.viewVerifierRules', ['rules'=> $rules]);
    }
    public function addVerifierRules(Request $request){
        $this->validate($request, ['rule'=> 'required']);
        if(DB::table('verifier_rules')->where('rule', $request->rule)->doesntExist()){
            DB::table('verifier_rules')->insert(['rule' => $request->rule]);
        }
        return back();
    }
    public function editVerifierRules(Request $request){
        $this->validate($request, [
            'rule_id' => 'required',
            'edit_rule' => 'required'
        ]);
        DB::table('verifier_rules')->where('id', $request->rule_id)->update(['rule' => $request->edit_rule]);
        return back();
    }

    public function deleteVerifierRules(Request $request){
    $this->validate($request, ['delete_rule_id' => 'required']);
        Db::table('verifier_rules')->where('id', $request->delete_rule_id)->delete();
        return back();
    }

}
