<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Verifier::class, function (Faker $faker) {

	$level_of_education = array('degree', 'masters', 'phd');
    return [
        //
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'location' => $faker->city,
        'social_media_handle' => 'https://www.facebook.com/'.$faker->userName.'/'.$faker->randomDigit,
        'professional_title' => $faker->jobTitle,
        'level_of_education' =>$faker->randomElement($array = $level_of_education),
        'active' => '1',
        'user_id' => function() {
        	return factory(App\User::class)->create([
        		'role' => 'verifier',
        	])->id;
        }

    ];
});
