<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
    	'type', 'category', 'course_name', 'duration', 'grade', 'description','researcher_id', 'editing', 'verifier_id', 'added_to_recommender',
    ];

    //one course is uploaded by 1 researcher
    public function researcher(){
    	return $this->belongsTo('App\Models\Researcher');
    }

    //one course has many views
    public function views(){
    	return $this->hasMany('App\Models\View');
    }
    //one course can have many ratings
    public function ratings(){
    	return $this->hasMany('App\Models\Rating');
    }

    //one course is verified by one verifier
    public function verifier(){
        return $this->belongsTo('App\Models\verifier');
    }

    //one course can have many course histories
    public function courseHistories(){
        return $this->hasMany('App\Models\CourseHistory');
    }
}
