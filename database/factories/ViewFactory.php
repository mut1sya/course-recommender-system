<?php

use Faker\Generator as Faker;

$factory->define(App\Models\View::class, function (Faker $faker) {
    return [
        //
        'course_id' => function(){
        	return factory(App\Models\Course::class)->create()->id;
        },

        'student_id' => function(){
        	return factory(App\Models\Student::class)->create()->id;
        },


        'frequency' =>$faker->randomDigitNotNull
    ];
});
