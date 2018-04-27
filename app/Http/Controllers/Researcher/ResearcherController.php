<?php

namespace App\Http\Controllers\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Researcher;
use App\Models\Course;
use App\Models\PendingCourse;
use App\Models\CourseHistory;
use App\User;
use Auth;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;

class ResearcherController extends Controller
{
    //
   

    public function __construct(){

        $this->middleware('researcher');
    }

    public function getResearcher(){
        $researcher = Researcher::where('user_id', Auth::user()->id)->first();
        return $researcher;
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
    	$researcher = $this->getResearcher();

    	return view('researcher.viewProfile',['researcher'=> $researcher]);
    }

    public function editProfile(){
    	
        
        $researcher = $this->getResearcher();
        

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

    public function viewCourse(Request $request){
        $this->validate($request,[
            'course_id' => 'required',
        ]);
        $course_id = $request->course_id;
        $course = Course::findOrFail($course_id);
        $ratings = $course->ratings()->simplePaginate(10);
        $histories = CourseHistory::where('course_id', $course_id)->simplePaginate(10);

        $courseIsBeingEdited = PendingCourse::where('course_name', $course->course_name)->exists();
        if($courseIsBeingEdited){
            $m_course_id = PendingCourse::where('course_name', $course->course_name)->first()->id;
        } else{
            $m_course_id = null;
        }
        
       

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
            'ratings'=> $ratings, 'ratingsSummary' => $ratingsSummary, 'histories' => $histories, 'courseIsBeingEdited' => $courseIsBeingEdited, 'm_course_id' => $m_course_id]);
    }

    public function getPendingCourses(){
        $researcher_id = $this->getResearcher()->id;     
        $pending_courses = $this->getResearcher()->pendingCourses()->get();
        return $pending_courses;
    }

    public function getActiveCourses(){
        $researcher_id = $this->getResearcher()->id;
        $activeCourses = $this->getResearcher()->courses()->get();
        return $activeCourses;
    }

    public function myCourses(){
        $activeCourses = $this->getActiveCourses();
        $pendingCourses = $this->getPendingCourses();

        return view('course.mycourses',[
            'verified_courses' => $activeCourses,
            'pending_courses' => $pendingCourses
        ]);
    }   

    //show the form for creating new course
    public function courseCreate(){

        return view('course.create');
    }

    //to store the file
    public function courseStore(Request $request){
        $this->validate($request, [
           'type' => 'required',
           'category' => 'required',
           'course_name' => 'required',
           'duration' => 'required',
           'grade' => 'required',
           'description' => 'required',
        ]);

        $pendingCourse = new PendingCourse;
        $pendingCourse->type = $request->type;
        $pendingCourse->category = $request->category;
        $pendingCourse->course_name = $request->course_name;
        $pendingCourse->duration = $request->duration;
        $pendingCourse->grade = $request->grade;
        $pendingCourse->description = $request->description;
        $pendingCourse->researcher_id = $this->getResearcher()->id;
        $pendingCourse->reason = 'Initial entry of the course into the database';
        $pendingCourse->save();

        return redirect()->route('course.index');
    }

    public function viewPendingCourse($id){
        $pendingCourse = PendingCourse::findOrFail($id);
        $comments = Comment::where('course_name', $pendingCourse->course_name)->paginate(7);
        $researcher_id = PendingCourse::findOrFail($id)->researcher_id;
        return view('course.researcherPendingView', ['course'=> $pendingCourse, 'comments' => $comments]);
    }

    public function editPendingCourse(Request $request){
        $this->validate($request,[
            'course_id' => 'required',
        ]);
       
        $course_id = $request->course_id;

        $pendingCourse = PendingCourse::findOrFail($course_id);
        return view('course.edit',['course' =>$pendingCourse]);

    }

    public function updatePendingCourse(Request $request){
        $this->validate($request, [
           'id' => 'required',
           'type' => 'required',
           'category' => 'required',
           'course_name' => 'required',
           'duration' => 'required',
           'grade' => 'required',
           'description' => 'required',
           'reason' => 'required',
        ]);

        $course = PendingCourse::findOrFail($request->id);
        $course->type = $request->type;
        $course->category = $request->category;
        $course->course_name = $request->course_name;
        $course->duration = $request->duration;
        $course->grade = $request->grade;
        $course->description = $request->description;
        $course->researcher_id = $this->getResearcher()->id;
        $course->reason = $request->reason;
        $course->save();
        return redirect()->route('course.index');
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

    public function setPendingCourse(Request $request){
        $this->validate($request, [
            'course_id' => 'required',
        ]);


        $course = Course::findOrFail($request->course_id);

        if($course->editing == false){
            $pendingCourse = new PendingCourse;
            $pendingCourse->type = $course->type;
            $pendingCourse->category = $course->category;
            $pendingCourse->course_name = $course->course_name;
            $pendingCourse->duration = $course->duration;
            $pendingCourse->grade = $course->grade;
            $pendingCourse->description = $course->description;
            $pendingCourse->researcher_id = $this->getResearcher()->id;
            $pendingCourse->reason = 'no reason yet...';
            $pendingCourse->save(); 
            $course->editing = true;
            $course->save();

        } else{
            $pendingCourse = PendingCourse::where('course_name', $course->course_name)->first();
        }
        $request->course_id = $pendingCourse->id;

        return redirect()->route('course.index');
        
    }
    public function decline(Request $request){
        $this->validate($request, [
            'delete_course_id' => 'required',
        ]);
        $pendingCourse = PendingCourse::findOrFail($request->delete_course_id);
        $name = $pendingCourse->course_name;

        $pendingCourse->delete();
        $courseExists = course::where('course_name', $name)->exists();
        if($courseExists){
            Course::where('course_name', $name)->update(['editing' => false]);
        }
        return redirect()->route('course.index');
    }

}

