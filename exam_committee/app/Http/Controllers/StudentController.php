<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
     /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    /**
     * .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //   $c=Auth::guard('student')->user()->name;
    //   dd($c);
        return view('student.student');
    }
}
