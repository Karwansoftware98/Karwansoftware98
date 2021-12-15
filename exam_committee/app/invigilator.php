<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invigilator extends Model
{
    //
    protected $guarded = ['*'];

    public function staff()
    {
        return $this->belongsTo('App\User');
    }
}
