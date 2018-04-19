<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //
    protected $fillable = [
    	'course_id', 'student_id', 'frequency',
    ];

	//one view belongs to one course
    public function course(){
    	return $tthis->belongsTo('App\Models\Course');
    }

    //one view belongs to one student
    public function  student(){
    	return $this->belongsTo('App\Models\Student');
    }
}

