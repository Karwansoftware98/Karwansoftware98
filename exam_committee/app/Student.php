<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    //
    protected $guard = 'student';
    
    protected $table = 'students';
    protected $fillable = ['department_id','name','email','password'];

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded = [''];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
