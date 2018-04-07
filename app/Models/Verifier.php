<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifier extends Model
{
    //
    protected $fillable = [
    	'first_name', 'last_name', 'phone_number',
    	'location', 'social_media_handle', 'professional_title', 'Level_of_educaton', 'active', 'user_id',
    ];

    //one verifier  belongs to one user
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
