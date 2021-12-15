<?php

namespace App\Http\Controllers;


use App\User;
use App\academic_year;
use App\department;
use App\Imports\TeacherImport;
use Illuminate\Http\Request;
use App\Imports\TeachersImport;
use App\Teacher;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class SuperAdminController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('dashboard.index');
    }

    public function StoreAcademicYear(Request $request)
    {
        academic_year::create([
          'academic_year'=>$request->academic_year,
          'semester'=>$request->semester,
          'trail'=>$request->trail,
          'start_date'=>$request->start,
          'end_date'=>$request->end,
        ]);
        return view('dashboard.index');
    }

    public function AddTeacher()
    {

        return view('dashboard.add_teacher');
    }

    public function Teachers()
    {
        $academic_year = DB::table('academic_years')->select('id','academic_year','trail')->get();


      $staff=DB::table('staff as s')
      ->select(['s.id as staff_id','s.name as staff_name','s.email','s.phone','dp.name as dp_name','dp.id as dp_id'])
      ->where('is_super',0)
      ->leftJoin('departments as dp','s.department_id','=','dp.id')
      ->get();

      $department=DB::table('departments')->select(['id','name'])->get();


        return view('dashboard.teachers',['staff'=>$staff,'academic_year'=>$academic_year,'department'=>$department ]);
    }

    public function StoreTeachers(Request $request)
    {

      $this->validate($request, [
            'department'=>'required',
            'name' => 'required',
            'email' => 'required|unique:staff|email',
            'phone' => 'required',

        ]);


            DB::table('staff')->insert([
                'department_id'=>$request->department,

                  'name'=>$request->name,
                  'email'=>$request->email,

                  'phone'=>$request->phone,
                  'password'=>bcrypt('143431asd'),


              ]);
                session()->flash('success','seccessfully Inserted!');
              return response()->json();


    }

    public function TeacherDistributing()
    {

        return view('dashboard.teacher_distributing');
    }

    public function AddCommitteeStaff()
    {
        $staff=User::get();
        $academic_year=academic_year::latest()->first();

        return view('dashboard.add_committee_staff',['staff'=>$staff,'academic_year'=>$academic_year]);
    }

    public function AssignCommitteeStaff(Request $request)
    {
      $members=$request->members;
      $uncheck=$request->unchecks;
       $leader=$request->leader;
       $academic_year=$request->academic_year;



//  uncheck

if ($uncheck) {
  $unchecks = User::whereIn('id',$uncheck)->get();
foreach ($unchecks as $value) {

  if ( DB::table('committee_staff')
      ->where('academic_year_id',$academic_year)
      ->where('staff_id',$value->id)
      -> where('role','member')
      ->exists()  )
       {

        DB::table('committee_staff')
        ->where('academic_year_id',$academic_year)
        ->where('staff_id',$value->id)
        -> where('role','member')
        ->delete();

  }
  else {
    continue;
  }


}
}





//  assign Member
if ($members) {
  $member = User::whereIn('id',$members)->get();
foreach ($member as $value) {
  if ( DB::table('committee_staff')
      ->where('academic_year_id',$academic_year)
      ->where('staff_id',$value->id)
      -> where('role','member')
      ->exists()  )
       {
        continue;
  }
  else {
     DB::table('committee_staff')
  ->insert([
    'academic_year_id'=>$academic_year,
    'staff_id'=>$value->id,
    'role'=>'member'
  ]);
  }

}
}


//  assign leader
if ($leader) {

  // check if have another leader
  if ( DB::table('committee_staff')
->where('academic_year_id',$academic_year)
-> where('role','leader')
->exists() )
    {

      DB::table('committee_staff')
->where('academic_year_id',$academic_year)
-> where('role','leader')
->delete();
    }

      // check if have another role
  $user = User::where('id',$leader)->first();
if ( DB::table('committee_staff')
->where('academic_year_id',$academic_year)
->where('staff_id',$user->id)
-> where('role','member')
->exists() )
    {

      DB::table('committee_staff')
->where('academic_year_id',$academic_year)
->where('staff_id',$user->id)
-> where('role','member')

->delete();
    }

    // asign leader
    DB::table('committee_staff')
    ->insert([
    'academic_year_id'=>$academic_year,
    'staff_id'=>$user->id,
    'role'=>'leader'
    ]);


  }



        return redirect()->back();

    }
    public function CommitteeStaff()
    {
      $academic_year=DB::table('academic_years')->latest()->first();

      $staff=DB::table('committee_staff as committee')
      ->select(['s.name as staff_name','s.email as staff_email','s.phone as staff_phone','committee.role','dp.name as dp_name'])
      ->where('committee.academic_year_id',$academic_year->id)
      ->Join('staff as s','committee.staff_id','=','s.id')
      ->Join('departments as dp','s.department_id','=','dp.id')
      ->get();


        return view('dashboard.committee_staff',['staff'=>$staff,'academic_year'=>$academic_year]);
    }

  // Importing excel Teacher file to database

  public function importingTeachers(Request $request){

    $this->validate($request,['teacherfile'=>'required|mimes:xls,xlsx']);
    $file = $request->file('teacherfile')->store('import');

    $import = new TeacherImport;
    $import->import($file);


        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }
        else{

            Excel::import(new TeacherImport,$file);
        return redirect('teachers')->with('import_t_success','Imported Successfully!');
        }

}
//end

public function updateTeacher(Request $request){



    $teacher =Teacher::find($request->id);
        if($request->email==$teacher->email){

        }
        else{
            $this->validate($request, [
                'department_id'=>'required',
                'name' => 'required',
                'email' => 'required|unique:staff|email',
                'phone' => 'required',

            ]);
        }
    $department =department::find($teacher->department_id);
    $teacher->name= $request->name;
    $teacher->email= $request->email;
    $teacher->phone= $request->phone;
    $teacher->department_id=$department->id;
    $teacher->save();


    return response()->json();
}
    // Deleting Teacher
public function deleteTeacher($id){


  Teacher::where('id',$id)->delete();
  return back()->with('teacherdeleted','succefully deleted');

}

}
