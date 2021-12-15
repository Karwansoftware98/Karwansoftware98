<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Empty_;
use App\Imports\EmployeeImport;
use App\Http\Controllers\Excel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index(){

        return view('employee');
    }
    public function store(Request $request){

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->post = $request->input('post');

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileArray =array('image'=>$file);
            $rules = array('image' =>'image|required|max:2000');
            $validator = Validator::make($fileArray,$rules);

                $filename = time().'.'.$extension;
                $file->move('uploads/',$filename);
                $employee->image = $filename;

                $employee->save();
                return redirect('/employeeprofile')->with('employee','New Student  has been inserted');

            

        }
        else{
            return back()->with('emptyimage',' image required');

        }

    }
    public function show(Request $request){

        $employee = Employee::all();
        return view('employeeprofile')->with('employee',$employee);
    }

public function edit($id){
    $employee =Employee::find($id);
    return view('editemployee')->with('employee',$employee);
}

public function update(Request $request,$id){


        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->email = $request->input('email');
        $employee->post = $request->input('post');
        if($request->hasFile('image')){

            $image=$employee->image;
            $path='uploads/'.$image;

            if (File::exists(public_path($path))) {

                File::delete(public_path($path));
                $employee->delete();
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
            $employee->image = $filename;
        }
        $employee->save();
        return redirect('/employeeprofile')->with('employee','updated successfully');

}
public function delete($id){
    $data =Employee::find($id);
    $path='uploads/'.$data->image;

    if (File::exists(public_path($path))) {

        File::delete(public_path($path));
        $data->delete();
    }

    return redirect()->back()->with('success','employee deleted');
}

public function importForm(){
    return view('import-form');
}



}
