<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseHistory extends Model
{
    //
    protected $fillable = [
    	'course_id', 'researcher_id', 'verifier_id', 'message',
    ];

    //one course history is for one course alone
    public function course(){
    	return $this->belongsTo('App\Models\Course');
    }

    //one course history has one researcher writing it
    public function researcher(){
    	return $this->belongsTo('App\Models\Researcher');
    }
    //one course histroy is verified by one researcher
    public function verifier(){
    	return $this->belongsTo('App\Models\Verifier');
    }
}
