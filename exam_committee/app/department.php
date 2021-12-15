<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
    use HasFactory;

    protected $guarded = ['*'];

    protected $table='departments';
    protected $fillable = ['id','name'];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
