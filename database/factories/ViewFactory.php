<?php

use Faker\Generator as Faker;

$factory->define(App\Models\View::class, function (Faker $faker) {
    return [
        //
        'course_id' => $faker->numberBetween($min = 1, $max = 380),
        // function(){
        // 	return factory(App\Models\Course::class)->create()->id;
        // },

        'student_id' => $faker->numberBetween($min = 1, $max = 150),
        // function(){
        // 	return factory(App\Models\Student::class)->create()->id;
        // },


        'frequency' =>$faker->randomDigitNotNull
    ];
});
