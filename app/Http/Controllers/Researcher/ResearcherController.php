<?php

namespace App\Http\Controllers\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Researcher;
use App\Models\Course;
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

    public function showSearch(){
        return view('researcher.showSearch');
    }

    public function search(Request $request){
        $this->validate($request,[
            'search_query' => 'required',
        ]);

        $courses = Course::where('course_name', 'like', '%'.$request->search_query.'%')->get();

        return view('researcher.searchResults', ['courses'=>$courses]);
    }

    public function viewCourse($id){
        $course = Course::findOrFail($id);

        $ratings = $course->ratings()->simplePaginate(10);

        $ratingsSummary =[];

        
        $allRatings =$course->ratings()->where('course_id', $course->id)->count();
        
        $ratingsSummary['allRatings'] = $allRatings;

        $star1 = $course->ratings()->where([['course_id', '=', $course->id], ['rating', '=', 1]])->count();
        $ratingsSummary['star1'] = $star1;

        $star2 = $course->ratings()->where([['course_id', '=', $course->id], ['rating', '=', 2]])->count();
        $ratingsSummary['star2'] = $star2;

        $star3 = $course->ratings()->where([['course_id', '=', $course->id], ['rating', '=', 3]])->count();
        $ratingsSummary['star3'] = $star3;

        $star4 = $course->ratings()->where([['course_id', '=', $course->id], ['rating', '=', 4]])->count();
        $ratingsSummary['star4'] = $star4;

        $star5 = $course->ratings()->where([['course_id', '=', $course->id], ['rating', '=', 5]])->count();
        $ratingsSummary['star5'] = $star5;

        if($allRatings !== 0){
           $ratingsSummary['percentage1'] =$star1/$allRatings * 100;
            $ratingsSummary['percentage2'] =$star2/$allRatings * 100;
            $ratingsSummary['percentage3'] =$star3/$allRatings * 100;
            $ratingsSummary['percentage4'] =$star4/$allRatings * 100;
            $ratingsSummary['percentage5'] =$star5/$allRatings * 100; 
        } else{
            $ratingsSummary['percentage1'] ='';
            $ratingsSummary['percentage2'] ='';
            $ratingsSummary['percentage3'] ='';
            $ratingsSummary['percentage4'] ='';
            $ratingsSummary['percentage5'] =''; 
        }

        return view('course.researcherView', ['course'=> $course,
            'ratings'=> $ratings, 'ratingsSummary' => $ratingsSummary]);
    }
}
