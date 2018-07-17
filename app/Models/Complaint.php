<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //
    protected $fillable = [
    	'user_id', 'message', 'response',
    ];

    public function user(){
    	return $this->belongsTo('App\user');
    }
}
