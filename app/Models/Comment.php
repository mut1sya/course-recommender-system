<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable =[
    	'course_name', 'user_id', 'comment',
    ];

    //one comment is for one course alone
    public function user(){
    	return $this->belongsTo('App\User');
    }
   
}
