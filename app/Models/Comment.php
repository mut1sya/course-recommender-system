<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable =[
    	'course_id', 'student_id', 'comment',
    ];

    //one comment is for one course alone
    public function course(){
    	return $this->belongsTo('App\Models\Course');
    }
    //one comment is made by one student
    public function student(){
    	return $this->belongsTo('App\Modles\Student');
    }
}
