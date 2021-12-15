<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable =['name','email','phone','salary','department'];
    public static function getStudents()
    {
        $records = DB::table('students')->select('id','name','email','phone','salary','department')->get()->toArray();

        return $records;
    }
}
