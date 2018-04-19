<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {

	$hobbies = array('partying', 'going to movies', 'walking', 'exercise', 'listening to music', 'socializing', 'church activities',
		 'watching sports', 'playing cards', 'swimming', 'volunteer work', 'hiking and camping', 'home cooking', 'shopping', 'going on safaris', 'hanging with friends and families', 'Painting', 'Dancing', 'Reading,', 'writing', 'Gardening', 'Animal Care');

	$personalities = array('architect', 'logician', 'commander', 'dabater','advocate', 'mediator', 'protagonist', 'Campaigner', 'logistician', 'defender', 'executive', 'consul', 'virtuoso', 'adventurer', 'entrepeneur', 'entertainer');

	$skills = array('concentration', 'good note taking', 'time management', 'good study style', 'ability to set attainable goals', 'completion of assignments', 'review of daily notes', 'organizational skills', 'self motivation', 'commitment', 'communication' , 'prioritizing', 'meeting deadlines', 'listening', 'participation', 'respect', 'sharing', 'critical thinking');

	$interests = array('telecommunications industry', 'mass media industry', 'manufacturing industry', 'information industry', 'healthcare industry', 'food industry', 'financial service industry', 'entertainment industry', 'energy industry', 'education industry', 'defense industry', 'public utilites industry', 'real estate industry', 'construction industry', 'computer industry', 'chemical industry', 'agriculture industry', 'aerospace industry');

    $grade = array('A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-', 'E');


    $kcse_grade = $faker->randomElement($array = $grade);


    switch ($kcse_grade) {
        case 'A':
            $kcse_points = $faker->numberBetween( $min = 81, $max = 84);
            break;
        case 'A-':
            $kcse_points = $faker->numberBetween( $min = 74, $max = 80);
            break;
        case 'B+':
            $kcse_points = $faker->numberBetween( $min = 67, $max = 73);
            break;
        case 'B':
            $kcse_points = $faker->numberBetween( $min = 60, $max = 66);
            break;
        case 'B-':
            $kcse_points = $faker->numberBetween( $min = 53, $max = 59);
            break;
        case 'C+':
            $kcse_points = $faker->numberBetween( $min = 46, $max = 52);
            break;
        case 'C':
            $kcse_points = $faker->numberBetween( $min = 39, $max = 45);
            break;
        case 'C-':
            $kcse_points = $faker->numberBetween( $min = 32, $max = 38);
            break;
        case 'D+':
            $kcse_points = $faker->numberBetween( $min = 25, $max = 31);
            break;
        case 'D':
            $kcse_points = $faker->numberBetween( $min = 18, $max = 24);
            break;
        case 'D-':
            $kcse_points = $faker->numberBetween( $min = 11, $max = 17);
            break;
        case 'E':
            $kcse_points = $faker->numberBetween( $min = 7, $max = 10);
            break;
    }

    $gender = $faker->randomElement($array=array('male', 'female'));

    //check if gender== male or female.if male return malename if female return a female
    if ($gender == 'male'){
        $first_name = $faker->firstNameMale;
    } else {
        $first_name = $faker->firstNameFemale;
    }

    return [
        //
        'first_name' => $first_name,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'dob' => $faker->dateTimeThisCentury,
        'gender' => $gender,
        'location' => $faker->city,
        'kcse_grade' => $kcse_grade,
        'kcse_points' => $kcse_points,
        'highschool' => $faker->city.' high shcool',
        'year_completed' => $faker->year($max = 'now'),
        'personality' => $faker->randomElement($array = $personalities),
        'hobbies' => $faker->randomElement($array = $hobbies),
        'skills' => $faker->randomElement($array = $skills),
        'interests' => $faker->randomElement($array = $interests),
        'user_id' => function(){
        	return factory(App\User::class)->create([
                    'role' => 'student',
            ])->id;
        }
    ];
});
