<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function addStudent(){
        $students = [
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
            ["name"=>"karwan","email"=>"karwan@gmail.com","phone"=>"123456","salary"=>"1234567","department"=>"software"],
        ];
        Student::insert($students);

        return 'student added successfully';
    }



    public function exportInExcel(){
        return Excel::download(new StudentExport,'Students.xlsx');
    }
    public function importForm(){
        return view('import-form');
    }
    public function import(Request $request){

        $this->validate($request,['file'  =>  'required|mimes::xls,xlsx']);
        $file = $request->file('file')->store('import');

        $import = new StudentImport();
        $import->import($file);

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }
        else{
       $d= Excel::import(new StudentImport,$file);

        return back()->with('successimport','file records has been imported successfully');
    }}
}
