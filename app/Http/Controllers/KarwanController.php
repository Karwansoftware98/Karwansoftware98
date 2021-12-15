<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karwan;

class KarwanController extends Controller
{
    public function fetchData(){
        $students = Karwan::whereBetween('id',[3,10])->orderBy('id','DESC')->get();
        return $students;
    }
}
