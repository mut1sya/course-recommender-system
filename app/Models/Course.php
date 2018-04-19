<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
    	'type', 'category', 'course_name', 'duration', 'grade', 'description','researcher_id', 'verified', 'verifier_id',
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

    //one course can have many comments
    public function comments(){
    	return $this->hasMany('App\Models\Comment');
    }
}
