<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingCourse extends Model
{
    //
    protected $fillable = [
    	'type', 'category', 'course_name', 'duration', 'grade', 'descripion', 'researcher_id', 'verifier_id', 'reason', 'verifying',
    ];

    public function researcher(){
    	return $this->belongsTo('App\Models\Researcher');
    }

    public function verifier(){
    	return $this->belongsTo('App\Models\Verifier');
    }
}
