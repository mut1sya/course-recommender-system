<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Course::class, function (Faker $faker) {

	$type_of_courses = array('certificate', 'diploma', 'degree');
	$type = $faker->randomElement($array = $type_of_courses);


	//take a random category depending on the type... certificate and diploma have the same category while degree has different categories
	$dip_and_cert_categories = array('Business', 'Cloth and textile', 'computing', 'education (arts)', 'education (science)', 'engineering', 'health sciences', 'humanities', 'sciences', 'technical', 'tourism and hotel management');
	
	$degree_category_of_courses = array('Engineering and Technology', 'Science and Mathematics', 'Business Management', ' Computer Science and IT','Medical and Pharmacy', 'Education and Teaching', 'social Sciences', 'Tourism and Hospitality', 'Architecture','Law', 'Accounting and Finance', 'Media and Advertising', 'Agriculture', 'Beauty and Fashion');
	if($type == 'certificate' || $type == 'diploma'){
		$category = $faker->randomElement($array = $dip_and_cert_categories);
	} else{
		$category = $faker->randomElement($array = $degree_category_of_courses);
	}

	switch ($type) {
		case 'certificate':
			$duration = 1;
			$grade = 'D';
			$course_name = 'CERTIFICATE IN '.$faker->unique()->realText($maxNbChars = 15, $indexSize = 1);
			break;
		
		case 'diploma':
			$duration = 3;
			$grade = 'C-';
			$course_name = 'DIPLOMA IN '.$faker->unique()->realText($maxNbChars = 15, $indexSize = 1);
			break;
		case 'degree':
			$duration = 4;
			$grade = 'C+';
			$course_name = 'BACHELOR IN '.$faker->unique()->realText($maxNbChars = 15, $indexSize = 1);
			break;
	}
	
	$description = '<p>'.$faker->realText($maxNbChars = 600, $indexSize = 2).'</p>';


    return [
        //
        'type' => $type,
        'category' => $category,
        'course_name' => $course_name,
        'duration' => $duration,
        'grade' => $grade,
        'description' => $description,
        'researcher_id' => $faker->numberBetween($min = 1, $max = 75),
        // function(){
        // 	return factory(App\Models\Researcher::class)->create()->id;
        // },
        'verified' => '1',
        'Verifier_id' => $faker->numberBetween($min = 1, $max = 30)

        // function(){
        // 	return factory(App\Models\Verifier::class)->create()->id;
        //}
    ];
});
