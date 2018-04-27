<?php

namespace App\Http\Controllers\Verifier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Verifier;
use App\User;
use App\Models\Course;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PendingCourse;
use App\Models\Comment;
use App\Models\CourseHistory;
use App\Models\Recommender;

class VerifierController extends Controller
{
    //
    public function __construct(){

    	$this->middleware('verifier');
    }

    public function getVerifier(){
        $verifier = Verifier::where('user_id', Auth::user()->id)->first();
        return $verifier;
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
    	$verifier = $this->getVerifier();
    	return view('verifier.viewProfile',['verifier'=> $verifier]);
    }

    public function editProfile(){
        $verifier = $this->getVerifier();     
        return view('verifier.editProfile',['verifier'=>$verifier]);
    }
    
    public function updateProfile(Request $request){
    	$this->validate($request,[
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'phone_number' => 'required',
    		'social_media_handle' => 'required',
    		'location' => 'required',
    		'user_id' => 'required|unique:verifiers,user_id',
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
        $pendingCourses= PendingCourse::where('verifying', false)->get();
        return view('course.pendingcourses.verifierPendingView', ['courses' => $pendingCourses]);
    }

    public function verify(Request $request){
        $this->validate($request,[
            'course_id' => 'required',
        ]);
        $course = PendingCourse::findOrFail($request->course_id);
        $course->update(
            ['verifying' => true,
             'verifier_id'=> $this->getVerifier()->id,
         ]);
        return redirect()->route('verifier.verifying');
    }

    public function myVerifyingCourses(){
        $verifyingCourses= PendingCourse::where([
            ['verifying', true],
            ['verifier_id', $this->getVerifier()->id],]
        )->get();
        return view('course.pendingcourses.verifying', ['courses' => $verifyingCourses]);
    }

    public function addComment(Request $request){
        $this->validate($request, [
            'comment' =>'required',
            'course_name' => 'required',
            'user_id' => 'required',
        ]);
        $comment = new Comment;
        $comment->course_name = $request->course_name;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }

    public function showVerifying($id){
        $course = PendingCourse::findOrFail($id);
        $comments = Comment::where('course_name', $course->course_name)->paginate(7);
            
        return view('course.pendingcourses.approve', [
                'course' => $course, 'comments' => $comments
        ]);
    }

    public function save(Request $request){  
        $this->validate($request, [
            'message' => 'required',
            'save_course_id' => 'required',
        ]);
        
        $pendingCourse = PendingCourse::findOrFail($request->save_course_id);
        $course = $this->getCourse($request->save_course_id);
        $course->type = $pendingCourse->type;
        $course->category = $pendingCourse->category;
        $course->course_name = $pendingCourse->course_name;
        $course->duration = $pendingCourse->duration;
        $course->grade = $pendingCourse->grade;
        $course->description = $pendingCourse->description;
        $course->researcher_id = $pendingCourse->researcher_id;
        $course->verifier_id = $pendingCourse->verifier_id;
        $course->editing = false;
        $course->save();

        $recommend = new Recommender;
        $recommend->addCourse($course);

        $new_course_id = Course::where('course_name', $course->course_name)->first()->id;

        $data =[
            $new_course_id, 
            $course->researcher_id,
            $course->verifier_id,
            $request->message
        ];
        $this->addCourseHistory($data);
        $this->deletePending($request->save_course_id);

        return redirect()->route('verifier.verifying');



    }

    public function decline(Request $request){
        $this->validate($request, [
            'decline_course_id' => 'required',
        ]);
        $this->deletePending($request->decline_course_id);
        return redirect()->route('verifier.verifying');
    }


    public function getCourse($id){
        $pendingCourse = PendingCourse::findOrFail($id);

        $existingCourse = Course::where('course_name', $pendingCourse->course_name)->first();
        if($existingCourse){
            $course = $existingCourse;
        } else{
            $course = new Course;
        }
        return $course;
    }

    public function addCourseHistory($data){
        $history = new CourseHistory;
        $history->course_id = $data[0];
        $history->researcher_id = $data[1];
        $history->verifier_id = $data[2];
        $history->message = $data[3];
        $history->save();
    }

    public function deletePending($id){
        $pendingCourse = PendingCourse::findOrFail($id);
        $pendingCourse->delete();
    }


}
