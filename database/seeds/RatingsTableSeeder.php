<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $students = [2,3,8,92];

    public function getCoursesId($txtfile){
        $courses = Storage::get('testData/degree/'.$txtfile.'.txt');
        $coursesArray = preg_split("/(\r\n|\n|\r)/",$courses);
        $uniqueCourseArray = array_unique($coursesArray);
        $coursesId =[];
        foreach ($uniqueCourseArray as $course) {
            $id = Course::where('course_name', $course)->first()->id;
            array_push($coursesId, $id);
        }
        return $coursesId;

    }

    public function run()
    {
        //
        $courses = $this->getCoursesId('computer science and it');
        foreach ($courses as $courseId) {
            foreach ($this->students as $studentId) {
            factory(App\Models\Rating::class)->create([
                'course_id' => $courseId,
                'student_id' => $studentId,
                'rating' => '5'
            ]);
            }
        }
        
    }
}
