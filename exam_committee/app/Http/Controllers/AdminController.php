<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //
    public function AddStudent()
    {
        
        return view('dashboard.add_student');
    }

   

    public function StoreStudent(Request $request)
    {
        
        Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'department_id'=>1,
            'password'=>Hash::make($request->password),
        ]);
        
        return redirect()->back();
    }
    public function importingStudent(Request $request)
    {

        $this->validate($request,['studentfile'=>'required|mimes:xls,xlsx']);
        $file = $request->file('studentfile')->store('import');
        $import = new StudentImport;
        $import->import($file);


            if($import->failures()->isNotEmpty())
            {
                return back()->withFailures($import->failures());
            }
            else
            {

                Excel::import(new StudentImport,$file);
                return redirect('student')->with('Import_T_succes','Students Imported Successfully!');

            }

    }
    public function StudentDetail()
    {
        $students =Student::get();
        return view('dashboard.student',['students'=> $students]);
    }
    public function deleteStudent($id)
    {

            Student::where('id',$id)->delete();
            return back()->with('deleted.student','succefully deleted');

    }

}
