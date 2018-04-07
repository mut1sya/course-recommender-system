<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
    	'type', 'category', 'course_name', 'duration', 'grade', 'description','researcher_id', 'verified',
    ];

    //one course is uploaded by 1 researcher
    public function researcher(){
    	return $this->belongsTo('App\Models\Researcher');
    }
}
