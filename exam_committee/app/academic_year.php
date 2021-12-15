<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academic_year extends Model
{
    //
    protected $guarded = [''];

 

        public function staff(){
            return $this->belongsToMany('App\User','committee_staff','staff_id','academic_year_id')->withPivot('role');
            }
}
