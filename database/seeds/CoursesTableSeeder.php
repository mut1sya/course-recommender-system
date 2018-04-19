<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $type_of_courses = [
        'certificate', 'diploma', 'degree'
    ];

    protected $dip_and_cert_courses =[
        'Business', 'Cloth and textile', 'computing', 'education (arts)', 'education (science)', 'engineering', 'health sciences', 'humanities', 'sciences', 'technical', 'tourism and hotel management'
    ];

    protected $degree_courses =[
        'Engineering and Technology', 'Science and Mathematics', 'Business Management', 'Computer Science and IT','Medical and Pharmacy', 'Education and Teaching', 'social Sciences', 'Tourism and Hospitality', 'Architecture','Law', 'Accounting and Finance', 'Media and Advertising', 'Agriculture', 'Beauty and Fashion'
    ];

    public function getCourseNames($type, $category){
        $courses = Storage::get('testData/'.$type.'/'.$this->getFileName($category));
        $courses_array = preg_split("/(\r\n|\n|\r)/",$courses);
        $unique_courses_array = array_unique($courses_array);
        // dd($unique_courses_array);
        return $unique_courses_array;

    }

    public function getFileName($category){
        switch ($category) {
            case 'Business':
                return 'sampleBusiness.txt';
                break;
            case 'Cloth and textile':
                return 'sampleCloth.txt';
                break;
            case 'computing':
                return 'sampleComputing.txt';
                break;
            case 'education (arts)':
                return 'sampleEducationArts.txt';
                break;
            case 'education (science)':
                return 'sampleEducationSciences.txt';
                break;
            case 'engineering':
                return 'sampleEngineering.txt';
                break;
            case 'health sciences':
                return 'sampleHealthSciences.txt';
                break;
            case 'humanities':
                return 'sampleHumanities.txt';
                break;
            case 'sciences':
                return 'sampleSciences.txt';
                break;
            case 'technical':
                return 'sampleTechnical.txt';
                break;
            case 'tourism and hotel management':
                return 'sampleTourism.txt';
                break;
            case 'Engineering and Technology':
                return 'engineering.txt';
                break;
            case 'Science and Mathematics':
                return 'sciences and mathematics.txt';
                break;
            case 'Business Management':
                return 'business management.txt';
                break;
            case 'Computer Science and IT':
                return 'computer science and it.txt';
                break;
            case 'Medical and Pharmacy':
                return 'medical and pharmacy.txt';
                break;
            case 'Education and Teaching':
                return 'education and teaching.txt';
                break;
            case 'social Sciences':
                return 'social sciences.txt';
                break;
            case 'Tourism and Hospitality':
                return 'tourism and hospitality.txt';
                break;
            case 'Architecture':
                return 'architecture.txt';
                break;
            case 'Law':
                return 'law.txt';
                break;
            case 'Accounting and Finance':
                return 'accounting and finance.txt';
                break;
            case 'Media and Advertising':
                return 'media and advertising.txt';
                break;
            case 'Agriculture':
                return 'agriculture.txt';
                break;
            case 'Beauty and Fashion':
                return 'beauty and fashion.txt';
                break;                
        }
    }

    public function run()
    {
        $this->getCourseNames('degree', 'Business Management');
        foreach ($this->type_of_courses as $type) {
            if($type == 'degree'){
                $categories = $this->degree_courses;
            } else {
                $categories = $this->dip_and_cert_courses;
            }
            foreach ($categories as $category) {
                $course_names = $this->getCourseNames($type, $category);

                foreach ($course_names as $course_name) {
                    switch ($type) {
                        case 'degree':
                            $duration = 4;
                            $grade = 'C+';
                            break;
                        case 'diploma':
                            $duration = 3;
                            $grade = 'C-';
                            break;
                        case 'certificate':
                            $duration = 1;
                            $grade = 'D';
                            break;

                    }
                    factory(App\Models\Course::class)->create([
                        'type' => $type,
                        'category' =>$category,
                        'duration' =>$duration,
                        'grade' => $grade,
                        'course_name' => $course_name
                    ]);
                }
            }
        }

        
    }
}
