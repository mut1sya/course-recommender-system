<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userName', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    //one user has one student
    public function student(){
        return $this->hasOne('App\Models\Student');
    }

    //one user has one researcher
    public function researcher(){
        return $this->hasOne('App\Models\Researcher');
    }

    //one user has one verifier
    public function verifier(){
        return $this->hasOne('App\Models\Verifier');
    }

    //one user can have more than one comments
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

}
