<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    //
    protected $fillable = [
    	'phone_number', 'social_media_handle', 'location', 'user_id',
    ];

    //one researcher belongs to one user
    public function user(){
    	return $this->belongsTo('App\User');
    }

    //one researcher can appload many courses
    public function courses(){
    	return $this->hasMany('App\Models\Course');
    }
}
