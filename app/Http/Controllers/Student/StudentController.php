<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
Use App\User;
use App\Models\Course;
use App\Models\Rating;
use App\Models\View;
use Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('student');
    }

    public function index()
    {
        //
        return view('student.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.completeProfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'dob'=> 'required|date',
            'phone_number'=>'required',
            'gender'=>'required',
            'location' =>'required',
            'kcse_grade' => 'required',
            'kcse_points' => 'required|numeric',
            'highschool' => 'required',
            'year_completed' => 'required|size:4',
            'personality' => 'nullable',
            'hobbies' => 'nullable',
            'skills' => 'nullable',
            'interests' => 'required',
            'user_id'=> 'required|unique:students,user_id']);

        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->dob = $request->dob;
        $student->phone_number = $request->phone_number;
        $student->gender = $request->gender;
        $student->location = $request->location;
        $student->kcse_grade = $request->kcse_grade;
        $student->kcse_points = $request->kcse_points;
        $student->highschool = $request->highschool;
        $student->year_completed = $request->year_completed;
        $student->personality = $request->personality;
        $student->hobbies = $request->hobbies;
        $student->skills = $request->skills;
        $student->interests = $request->interests;
        $student->user_id = $request->user_id;
        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Auth::user()->id;
        
        $student = Student::where('user_id', $id)->first();
        

        return view('student.editProfile',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd('here');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showProfile(){
    
        $student = Student::where('user_id', Auth::user()->id)->first();
        
        return view('student.viewProfile',['student'=>$student]);
    }

    public function editProfile(){
        $id = Auth::user()->id;
        
        $student = Student::where('user_id', $id)->first();
        

        return view('student.editProfile',['student'=>$student]);
    }

    public function updateProfile(Request $request){
        
        $this->validate($request,[
            'userName' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dob'=> 'required|date',
            'phone_number'=>'required',
            'gender'=>'required',
            'location' =>'required',
            'kcse_grade' => 'required',
            'kcse_points' => 'required|numeric',
            'highschool' => 'required',
            'year_completed' => 'required|size:4',
            'personality' => 'nullable',
            'hobbies' => 'nullable',
            'skills' => 'nullable',
            'interests' => 'required',
            'user_id'=> 'required']);
        
        $student = Student::where('user_id', $request->user_id)->first();
        
        $student->update([
                $student->first_name = $request->first_name,
                $student->last_name = $request->last_name,
                $student->dob = $request->dob,
                $student->phone_number = $request->phone_number,
                $student->gender = $request->gender,
                $student->location = $request->location,
                $student->kcse_grade = $request->kcse_grade,
                $student->kcse_points = $request->kcse_points,
                $student->highschool = $request->highschool,
                $student->year_completed = $request->year_completed,
                $student->personality = $request->personality,
                $student->hobbies = $request->hobbies,
                $student->skills = $request->skills,
                $student->interests = $request->interests,
                $student->user_id = $request->user_id,
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
        return view('student.showSearch');
    }

    public function search(Request $request){
        $this->validate($request,[
            'search_query' => 'required',
        ]);
        
        $courses = Course::where('course_name', 'like', '%'.$request->search_query.'%')->get();

        return view('student.searchResults', ['courses'=>$courses]);
    }

    public function viewCourse($id){

        $course = Course::findOrFail($id);
        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;
        $course_rated = Rating::where([
            ['course_id','=',$course->id],
            ['student_id', '=', $student_id]
        ])->exists();

        //check if the student has already viewed this course again
        $student_view = View::where([
                ['course_id','=',$course->id],
                ['student_id', '=', $student_id]
            ])->first();

        if($student_view !== null){
            $student_view->increment('frequency');
        } else {
            $new_view =  new View;
            $new_view->course_id = $course->id;
            $new_view->student_id = $student_id;
            $new_view->frequency = 1;
            $new_view->save();
        }

        $ratings =$course->ratings()->simplePaginate(10); 
        
        

        $ratingsSummary =[];

        
        $allRatings =Rating::where('course_id', $course->id)->count();
        
        $ratingsSummary['allRatings'] = $allRatings;

        $star1 = Rating::where([['course_id', '=', $course->id], ['rating', '=', 1]])->count();
        $ratingsSummary['star1'] = $star1;

        $star2 = Rating::where([['course_id', '=', $course->id], ['rating', '=', 2]])->count();
        $ratingsSummary['star2'] = $star2;

        $star3 = Rating::where([['course_id', '=', $course->id], ['rating', '=', 3]])->count();
        $ratingsSummary['star3'] = $star3;

        $star4 = Rating::where([['course_id', '=', $course->id], ['rating', '=', 4]])->count();
        $ratingsSummary['star4'] = $star4;

        $star5 = Rating::where([['course_id', '=', $course->id], ['rating', '=', 5]])->count();
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
        


        
        if($course_rated){
            $myRating = Rating::where([
                ['course_id','=',$course->id],
                ['student_id', '=', $student_id]
            ])->first();

            return view('course.studentView',['course' => $course,'student_id' => $student_id, 'course_rated' => $course_rated, 'ratings' => $ratings, 'myRating' => $myRating, 'ratingsSummary' => $ratingsSummary]);
        } else {
            return view('course.studentView',['course' => $course,'student_id' => $student_id, 'course_rated' => $course_rated, 'ratings' => $ratings, 'ratingsSummary' => $ratingsSummary]);  
        }  
    }

    public function rateCourse(Request $request){
        
        $this->validate($request,[
            'rating' => 'required',
            'course_id' => 'required',
            'student_id' => 'required',
            'review' => 'nullable'
        ]);

        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->course_id = $request->course_id;
        $rating->student_id = $request->student_id;
        $rating->review = $request->review;
        $rating->save();
        return back()->with(['status'=>'review successfully submited']);
    }

    public function editRating(Request $request){
        $this->validate($request,[
            'rating' => 'required',
            'course_id' => 'required',
            'student_id' => 'required',
            'review' => 'nullable',
            'rating_id' => 'required'
        ]);

        $rating = Rating::findOrFail($request->rating_id);
        $rating->rating = $request->rating;
        $rating->course_id = $request->course_id;
        $rating->student_id = $request->student_id;
        $rating->review = $request->review;
        $rating->save();
        return back()->with(['status'=>'review successfully edited']);
    }


}
