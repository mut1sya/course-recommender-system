<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
    	'first_name', 'last_name', 'phone_number', 'dob', 'gender', 'location', 'kcse_grade', 'kcse_points', 'highschool', 'year_completed', 'personality', 'hobbies', 'skills', 'interests', 'user_id',
    ];

    //one student belongs to one user
    public function user(){
        return $this->belongsTo('App\User');
    }

    //one student can have many views
    public function views(){
    	return $this->hasMany('App\Models\View');
    }

    //one student can rate many courses
    //one student can have many ratings
    public function ratings(){
        return $this->hasMany('App\Models\Rating');
    }

    //one student can have more than one comments
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
