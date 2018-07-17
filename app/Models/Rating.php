<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable =[
    	'course_id', 'student_id', 'rating', 'review','added_to_recommender',
    ];

    //one rating belongs to one course
    public function course(){
    	return $tthis->belongsTo('App\Models\Course');
    }

    //one rating is made by one student
    //one rating belongs to one student
    public function  student(){
    	return $this->belongsTo('App\Models\Student');
    }
}
