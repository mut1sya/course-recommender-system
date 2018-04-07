<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Researcher;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){
        $this->middleware('researcher');
    }
    public function index()
    {
        //here i return the courses that are pending and also the ones approved. the pending can be edited and deleted but the approved only viewing 
        $researcher_id = Researcher::where('user_id', Auth::user()->id)->first()->id;
        $verified_courses = Course::where([
            ['researcher_id', $researcher_id],
            ['verified', true]]
        )->get();
        


        $pending_courses = Course::where([
            ['researcher_id', $researcher_id],
            ['verified', false]]
        )->get();
        

        return view('course.mycourses'
            ,
            ['verified_courses' => $verified_courses,
            'pending_courses' => $pending_courses]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('course.create');
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
        $this->validate($request, [
           'type' => 'required',
           'category' => 'required',
           'course_name' => 'required',
           'duration' => 'required',
           'grade' => 'required',
           'description' => 'required',
        ]);

        $researcher_id = Researcher::where('user_id', Auth::user()->id)->first()->id;

        $course = new Course;
        $course->type = $request->type;
        $course->category = $request->category;
        $course->course_name = $request->course_name;
        $course->duration = $request->duration;
        $course->grade = $request->grade;
        $course->description = $request->description;
        $course->researcher_id = $researcher_id;
        $course->save();

        return redirect()->route('course.index');
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
        $course = Course::findOrFail($id);
        return view('course.view',['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::findOrFail($id);
        return view('course.edit',['course' =>$course]);
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
        $this->validate($request, [
           'type' => 'required',
           'category' => 'required',
           'course_name' => 'required',
           'duration' => 'required',
           'grade' => 'required',
           'description' => 'required',
        ]);

        $researcher_id = Researcher::where('user_id', Auth::user()->id)->first()->id;
        $course = Course::findOrFail($id);

        $course->type = $request->type;
        $course->category = $request->category;
        $course->course_name = $request->course_name;
        $course->duration = $request->duration;
        $course->grade = $request->grade;
        $course->description = $request->description;
        $course->researcher_id = $researcher_id;
        $course->save();

        return redirect()->route('course.index');


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
        Course::findOrFail($id)->delete();
        return redirect()->route('course.index');
    }
}
