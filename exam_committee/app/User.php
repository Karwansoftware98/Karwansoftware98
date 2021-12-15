<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded = ['*'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'staff';
     
    protected $fillable =['department_id','name','email'];



    public function invigilator()
    {
        return $this->hasOne('App\invigilator');
    }

    public function department()
    {
        return $this->belongsTo(department::class);
    }


 
        
        public function academic_year(){
            return $this->belongsToMany('App\academic_year','committee_staff','staff_id','academic_year_id')->withPivot('role');
            }
}


