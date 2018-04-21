<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifier extends Model
{
    //
    protected $fillable = [
    	'first_name', 'last_name', 'phone_number',
    	'location', 'social_media_handle', 'professional_title', 'level_of_educaton', 'active', 'user_id',
    ];

    //one verifier  belongs to one user
    public function user(){
    	return $this->belongsTo('App\User');
    }

    //one verifier can verify many courses
    public function courses(){
    	return $this->hasMany('App\Models\Course');
    }

    //one verifier can be verifying many courses
    public function pendingCourses(){
    	return $this->hasMany('App\Models\PendingCourse');
    }

    //one verifier can be in many course histories
    public function courseHistories(){
        return $this->hasMany('App\Models\CourseHistory');
    }

}
