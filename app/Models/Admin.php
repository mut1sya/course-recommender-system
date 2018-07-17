<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = ['first_name', 'last_name', 'location', 'phone_number', 'user_id',];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
