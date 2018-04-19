<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Researcher::class, function (Faker $faker) {
    return [
        //
        'phone_number' => $faker->phoneNumber,
        'social_media_handle' =>'https://www.facebook.com/'.$faker->userName.'/'.$faker->randomDigit,
        'location' => $faker->city,
        'user_id' => function () {
        	return factory(App\User::class)->create([
        		'role' => 'researcher',
        	])->id;
        }
    ];
});
